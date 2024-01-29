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
        $course_price = Course::where('id', $id)
        ->first();

        return view('Visitor.Courses.Chapters', compact('chapters', 'course_price'));
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
        $chapters = Cache::get('marketing');
        $chapters = empty($chapters) ? [] : $chapters;
        $chapters_price = Cache::get('chapters_price');
        
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
        
        extract($_FILES['image']);
        $img_name = null;
        for ($i=0, $end = count($name); $i < $end; $i++) { 
            if ( !empty($name[$i]) ) {
                        
                if ( !empty($name) ) {
                    $extention_arr = ['jpg', 'jpeg', 'png', 'svg'];
                    $extention = explode('.', $name[$i]);
                    $extention = end($extention);
                    $extention = strtolower($extention);
                    if ( in_array($extention, $extention_arr)) {
                        $img_name = now() . rand(1, 10000) . $name[$i];
                        $img_name = str_replace([' ', ':', '-'], 'X', $img_name);
                        $arr['image'] = $img_name;
                    }
                }

                move_uploaded_file($tmp_name[$i], 'images/payment_reset/' . $img_name);
            }
        }
        $p_request = PaymentRequest::create($arr);
        $chapters = json_decode(Cache::get('marketing'));
        $price = json_decode(Cache::get('chapters_price'));
        $p_method = $p_request->method->payment;
        return view('Visitor.Order.Order', compact('chapters', 'price', 'p_method'));
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
