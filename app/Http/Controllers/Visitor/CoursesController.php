<?php

namespace App\Http\Controllers\Visitor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Cache;

use App\Models\Category;
use App\Models\Course;
use App\Models\Chapter;
use App\Models\UsagePromo;
use App\Models\PromoCode;
use App\Models\PaymentMethod;
use App\Models\PaymentRequest;
use Cart;

class CoursesController extends Controller
{
    public function categories(){
        $categories = Category::all();
        return view('Visitor.Courses.Categories', compact('categories'));
    }

    public function courses($id){
        $courses = Course::where('category_id', $id)
        ->get();

        return view('Visitor.Courses.Courses', compact('courses'));
    }

    public function course($id){ 
        $chapters = Chapter::where('course_id', $id)
        ->get();
        $course = Course::where('id', $id)
        ->first(); 
        foreach ($chapters as $key => $item) {
            $min =  $item->price[0]->price;
            foreach (  $item->price as $element ) {
                if ( $min > $element->price ) {
                    $min = $element->price;
                }
            }
            $chapters[$key]['ch_price'] = $min;
        } 
        $course_price = Course::
        with('prices')
        ->where('id', $id)
        ->first();
        $price = $course_price->prices[0]->price;
        for ($i=0, $end = count($course_price->prices); $i < $end; $i++) { 
            if( $price > $course_price->prices[$i]->price){
                $price = $course_price->prices[$i]->price;
            }
        }
        return view('Visitor.Courses.Chapters', compact('chapters', 'course_price', 'price', 'course'));
    }
    
    public function buy_chapters( Request $req ){
        Cart::session(auth()->user()->id)->add(array(
            'id' => $req-id,
            'name' => $req->chapter_name,
            'price' => $req->ch_price,
            'quantity' => 1,
        ));

        return $req->all();
    }
    
    public function buy_course( Request $req ){
        $course_data = json_decode($req->course_data);
        $course = Course::where('id', $course_data->id)
        ->first();
        $min_price = $course->prices[0]->price;
        $min_price_data = $course->prices[0];
        foreach ( $course->prices as $price) {
            if ( $min_price > $price->price ) {
                $min_price = $price->price;
                $min_price_data = $price;
            }
        }
        Cache::forget('min_price_data');
        Cache::store('file')->put('marketing', $course, 10000);
        Cache::store('file')->put('chapters_price', $min_price, 10000);
        Cache::store('file')->put('min_price_data', $min_price_data, 10000);
        if ( empty(auth()->user()) && $min_price == $req->chapters_price ) {
            return view('Visitor.Login.login');
        }
        elseif ( $min_price == $req->chapters_price ) {
            return view('Visitor.Cart.Course_Cart', compact('course', 'min_price', 'min_price_data'));
        }
        
        $data = $req->chapters_data;
        $chapters_price = $req->chapters_price;
        if ( empty($req->chapters_data) ) {
            $data = Cache::get('marketing');
            $chapters_price = Cache::get('chapters_price');
        }
        Cache::store('file')->put('marketing', $data, 10000);
        Cache::store('file')->put('chapters_price', $chapters_price, 10000);
         
        if ( empty(auth()->user()) ) {
            return view('Visitor.Login.login');
        }
        else{
            $chapters = json_decode(Cache::get('marketing'));
            return view('Visitor.Cart', compact('chapters', 'chapters_price'));
        }
    }

    public function course_payment( Request $req ){
        $chapters = json_decode(Cache::get('marketing'));
        $chapters = empty($chapters) ? [] : $chapters;
        $chapters_price = Cache::get('chapters_price');
        
        if ( @is_numeric(Cache::get('min_price_data')->id) ) {
            $min_price_data = Cache::get('min_price_data');
            $min_price = $chapters_price;
            $course = Course::where('id', $chapters->id)
            ->first();
            return view('Visitor.Cart.Course_Cart', compact('course', 'min_price', 'min_price_data'));
        }
        return view('Visitor.Cart', compact('chapters', 'chapters_price'));
    }

    public function Use_Promocode( Request $req ){
        $uses = UsagePromo::where('user_id', auth()->user()->id)
        ->where('promo', $req->promo_code)
        ->first(); 
        
        if ( empty($uses) ) {
            $promo = PromoCode::where('starts', '<=', now())
            ->where('ends', '>=', now())
            ->where('num_usage', '>', 0)
            ->where('name', $req->promo_code)
            ->first();
            if ( !empty($promo) ) {
                $price = Cache::get('chapters_price');
                $price = $price - $price * $promo->discount	/ 100;
                Cache::store('file')->put('chapters_price', $price, 10000);
                PromoCode::where('id', $promo->id)
                ->update([
                    'num_usage' => $promo->num_usage - 1
                ]);
                UsagePromo::create([
                    'user_id' => auth()->user()->id,
                    'promo_id' => $promo->id,
                    'promo' => $req->promo_code
                ]);
                return redirect()->route('check_out'); 
            }
        } 
        return redirect()->route('new_payment'); 
    }

    public function check_out(){
        $chapters = json_decode(Cache::get('marketing'));
        $price = json_decode(Cache::get('chapters_price'));
        $payment_methods = PaymentMethod::
        where('statue', 1)
        ->get();

        return view('Visitor.Checkout.Checkout', compact('price', 'chapters', 'payment_methods'));
    }

    public function check_out_course( Request $req ){
        $course = json_decode($req->course);
        $price = $req->price;
        Cache::store('file')->put('marketing', $course, 10000);
        Cache::store('file')->put('chapters_price', $price, 10000);
        $payment_methods = PaymentMethod::
        where('statue', 1)
        ->get();

        return view('Visitor.C_Checkout.Checkout', compact('price', 'course', 'payment_methods'));
    }

    public function new_payment(){
         
        if ( empty(auth()->user()) ) {
            return view('Visitor.Login.login');
        }
        else{
            $chapters = Cache::get('marketing');
            $chapters_price = Cache::get('chapters_price');
            $chapters = empty($chapters) ? [] : $chapters;
            return view('Visitor.Cart', compact('chapters', 'chapters_price'));
        }
    }

    public function payment_money( Request $req ){
        $arr = $req->only('payment_method_id');
        $arr['price'] = Cache::get('chapters_price');
        $arr['user_id'] = auth()->user()->id;
        $img_state = true;

        extract($_FILES['image']);
        $img_name = null;
        for ($i=0, $end = count($name); $i < $end; $i++) { 
            if ( !empty($name[$i]) ) {
                    $img_state = false;
                    $extention_arr = ['jpg', 'jpeg', 'png', 'svg'];
                    $extention = explode('.', $name[$i]);
                    $extention = end($extention);
                    $extention = strtolower($extention);
                    if ( in_array($extention, $extention_arr)) {
                        $img_name = now() . rand(1, 10000) . $name[$i];
                        $img_name = str_replace([' ', ':', '-'], 'X', $img_name);
                        $arr['image'] = $img_name;
                    }

                move_uploaded_file($tmp_name[$i], 'images/payment_reset/' . $img_name);
            }
        }
        if ( $img_state ) { 
            session()->flash('faild', 'You Must Enter Receipt');
            return redirect()->back();
        
        }
        $p_request = PaymentRequest::create($arr);
        $chapters = json_decode(Cache::get('marketing'));
        $price = json_decode(Cache::get('chapters_price'));
        $p_method = $p_request->method->payment;
        return view('Visitor.Order.Order', compact('chapters', 'price', 'p_method'));
    }

    public function course_payment_money( Request $req ){
        $arr = $req->only('payment_method_id');
        $arr['price'] = Cache::get('chapters_price');
        $arr['user_id'] = auth()->user()->id;
        $img_state = true;

        extract($_FILES['image']);
        $img_name = null;
        for ($i=0, $end = count($name); $i < $end; $i++) { 
            if ( !empty($name[$i]) ) {
                    $img_state = false;
                    $extention_arr = ['jpg', 'jpeg', 'png', 'svg'];
                    $extention = explode('.', $name[$i]);
                    $extention = end($extention);
                    $extention = strtolower($extention);
                    if ( in_array($extention, $extention_arr)) {
                        $img_name = now() . rand(1, 10000) . $name[$i];
                        $img_name = str_replace([' ', ':', '-'], 'X', $img_name);
                        $arr['image'] = $img_name;
                    }

                move_uploaded_file($tmp_name[$i], 'images/payment_reset/' . $img_name);
            }
        }
        if ( $img_state ) { 
            session()->flash('faild', 'You Must Enter Receipt');
            return redirect()->back();
        
        }
        $p_request = PaymentRequest::create($arr);
        $course = (Cache::get('marketing'));
        $price = (Cache::get('chapters_price'));
        $p_method = $p_request->method->payment;
        return view('Visitor.C_Order.Order', compact('course', 'price', 'p_method'));
    }

    public function remove_course_package( $id ){
        $chapters = json_decode(Cache::get('marketing'));
        $price = json_decode(Cache::get('chapters_price'));
        $arr = [];
        $price = 0;
        foreach ($chapters as $item) {
            if ( $item->id != $id ) {
                $arr[] = $item;
                $price += $item->ch_price;
            }
        }
        $arr = json_encode($arr);
        Cache::store('file')->put('marketing', $arr, 10000);
        Cache::store('file')->put('chapters_price', $price, 10000);
        return redirect()->back();
    }
}
