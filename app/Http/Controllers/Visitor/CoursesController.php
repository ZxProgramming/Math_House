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
use App\Models\PaymentOrder;
use App\Models\PaymentRequest;
use App\Models\Wallet;
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
        $price = @$course_price->prices[0]->price;
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
        if ( empty(auth()->user()) && $min_price == $req->chapters_price ) {
            return view('Visitor.Login.login');
        }
        elseif ( $min_price == $req->chapters_price ) {
            Cache::store('file')->put('min_price_data', $min_price_data, 10000);
            return view('Visitor.Cart.Course_Cart', compact('course', 'min_price', 'min_price_data'));
        }
        
        $data = $req->chapters_data;
        $chapters_price = $req->chapters_price;
        $chapter_discount = 0;
        $price_data = json_decode($data);
        $price_arr = [];
        foreach ( $price_data as $item ) {
            $min = $item->price[0];
            foreach ($item->price as $element) {
                if ( $element->price < $min->price ) {
                    $min = $element;
                }
            }
            $chapter_discount += $min->price - ($min->price * $min->discount / 100);
            $price_arr[] = $min;
        }
        
        if ( empty($req->chapters_data) ) {
            $data = Cache::get('marketing');
            $chapters_price = Cache::get('chapters_price');
        }
        Cache::store('file')->put('marketing', $data, 10000);
        Cache::store('file')->put('chapters_price', $chapters_price, 10000);
        Cache::store('file')->put('price_arr', $price_arr, 10000);
         $price_arr = json_encode($price_arr);
        if ( empty(auth()->user()) ) {
            return view('Visitor.Login.login');
        }
        else{
            $chapters = json_decode(Cache::get('marketing'));
            return view('Visitor.Cart', compact('chapters', 'chapters_price', 'price_arr', 'chapter_discount'));
        }
    }

    public function course_payment( Request $req ){
        
        $course_data = Cache::get('marketing');
        $chapters_price = Cache::get('chapters_price');
        if ( isset($course_data->id) ) { 
            
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
            if ( empty(auth()->user()) && $min_price == $chapters_price ) {
                return view('Visitor.Login.login');
            }
            elseif ( $min_price == $chapters_price ) {
                Cache::store('file')->put('min_price_data', $min_price_data, 10000);
                return view('Visitor.Cart.Course_Cart', compact('course', 'min_price', 'min_price_data'));
            }
        }


        $data = Cache::get('marketing');
        $chapters_price = Cache::get('chapters_price');
        $chapter_discount = 0;
        $price_data = json_decode($data);
        $price_arr = [];
        foreach ( $price_data as $item ) {
            $min = $item->price[0];
            foreach ($item->price as $element) {
                if ( $element->price < $min->price ) {
                    $min = $element;
                }
            }
            $chapter_discount += $min->price - ($min->price * $min->discount / 100);
            $price_arr[] = $min;
        }
        
        if ( empty($req->chapters_data) ) {
            $data = Cache::get('marketing');
            $chapters_price = Cache::get('chapters_price');
        }
        Cache::store('file')->put('marketing', $data, 10000);
        Cache::store('file')->put('chapters_price', $chapters_price, 10000);
        Cache::store('file')->put('price_arr', $price_arr, 10000);
        $price_arr = json_encode($price_arr);
        $chapters = json_decode(Cache::get('marketing'));
        return view('Visitor.Cart', compact('chapters', 'chapters_price', 'price_arr', 'chapter_discount'));
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
                return redirect()->route('promo_check_out_chapter'); 
                
            }
        } 
        session()->flash('faild', 'Promo Code Is Uses');
        return redirect()->route('new_payment'); 
    }

    public function promo_check_out_chapter( Request $req ){ 
        $chapters = json_decode(Cache::get('marketing'));
        $price = json_decode(Cache::get('chapters_price'));
        $payment_methods = PaymentMethod::
        where('statue', 1)
        ->get();

        return view('Visitor.Checkout.Checkout', compact('price', 'chapters', 'payment_methods'));
    }

    public function course_use_promocode( Request $req ){
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
                return redirect()->route('promo_check_out_course'); 
                
            }
        } 
        
        session()->flash('faild', 'Promo Code Is Uses');
        return redirect()->route('c_new_payment'); 
    }

    public function promo_check_out_course( Request $req ){
        $course = Cache::get('marketing');
        $price = Cache::get('chapters_price');
        $payment_methods = PaymentMethod::
        where('statue', 1)
        ->get();

        return view('Visitor.C_Checkout.Checkout', compact('price', 'course', 'payment_methods'));
    }

    public function check_out( Request $req ){ 
        $chapters = json_decode(Cache::get('marketing'));
        Cache::store('file')->put('chapters_price', $req->chapters_pricing, 10000);
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
        $course_data = Cache::get('marketing');
        $chapters_price = Cache::get('chapters_price');
        if ( isset($course_data->id) ) { 
            
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
            if ( empty(auth()->user()) && $min_price == $chapters_price ) {
                return view('Visitor.Login.login');
            }
            elseif ( $min_price == $chapters_price ) {
                Cache::store('file')->put('min_price_data', $min_price_data, 10000);
                return view('Visitor.Cart.Course_Cart', compact('course', 'min_price', 'min_price_data'));
            }
        }


        $data = Cache::get('marketing');
        $chapters_price = Cache::get('chapters_price');
        $chapter_discount = 0;
        $price_data = json_decode($data);
        $price_arr = [];
        foreach ( $price_data as $item ) {
            $min = $item->price[0];
            foreach ($item->price as $element) {
                if ( $element->price < $min->price ) {
                    $min = $element;
                }
            }
            $chapter_discount += $min->price - ($min->price * $min->discount / 100);
            $price_arr[] = $min;
        }
        
        if ( empty($req->chapters_data) ) {
            $data = Cache::get('marketing');
            $chapters_price = Cache::get('chapters_price');
        }
        Cache::store('file')->put('marketing', $data, 10000);
        Cache::store('file')->put('chapters_price', $chapters_price, 10000);
        Cache::store('file')->put('price_arr', $price_arr, 10000);
        $price_arr = json_encode($price_arr);
        $chapters = json_decode(Cache::get('marketing'));
        return view('Visitor.Cart', compact('chapters', 'chapters_price', 'price_arr', 'chapter_discount'));
    }

    public function c_new_payment(){
        $course_data = Cache::get('marketing');
        $chapters_price = Cache::get('chapters_price');
            
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
        if ( empty(auth()->user()) && $min_price == $chapters_price ) {
            return view('Visitor.Login.login');
        }
        elseif ( $min_price == $chapters_price ) {
            Cache::store('file')->put('min_price_data', $min_price_data, 10000);
            return view('Visitor.Cart.Course_Cart', compact('course', 'min_price', 'min_price_data'));
        }
    }

    public function payment_money( Request $req ){
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
        $chapters = json_decode(Cache::get('marketing'));
        $price = json_decode(Cache::get('chapters_price'));
        if ( $req->payment_method_id == 'Wallet' ) {
            $wallet = Wallet::
            where('student_id', auth()->user()->id)
            ->where('state', 'Approve')
            ->sum('wallet');
            
            if ( $wallet < $price ) {
                session()->flash('faild', 'You Wallet Is not Enough');
                return redirect()->back();
            }
            $arr['state'] = 'Approve'; 
        }
        elseif ( $img_state ) { 
            session()->flash('faild', 'You Must Enter Receipt');
            return redirect()->back();
        
        }
        else{ 
            $arr['payment_method_id'] = $req->payment_method_id;
        }
        $p_request = PaymentRequest::create($arr);
        if ( $req->payment_method_id == 'Wallet' ) {
            Wallet::create([
                'student_id' => auth()->user()->id,
                'wallet' => -$price,
                'state' => 'Approve',
                'date' => now(),
                'payment_request_id' => $p_request->id,
            ]);
        }
        $p_method = isset($p_request->method->payment) ? $p_request->method->payment : 'Wallet';
        $duration = 0;
        for ($i=0, $end = count($chapters); $i < $end; $i++) { 
            foreach ( $chapters[$i]->price as $item ) {
                if ( $item->price == $chapters[$i]->ch_price ) {
                    $duration = $item->duration;
                }
            }
            PaymentOrder::create( 
                ['payment_request_id' => $p_request->id,
                'chapter_id' => $chapters[$i]->id,
                'duration' => $duration,]);
        }
        
        return view('Visitor.Order.Order', compact('chapters', 'price', 'p_method'));
    }

    public function course_payment_money( Request $req ){
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
        $course = (Cache::get('marketing'));
        $price = (Cache::get('chapters_price'));
        
        if ( $req->payment_method_id == 'Wallet' ) {
            $wallet = Wallet::
            where('student_id', auth()->user()->id)
            ->where('state', 'Approve')
            ->sum('wallet'); 

            if ( $wallet < $price ) {
                session()->flash('faild', 'You Wallet Is not Enough'); 
                $payment_methods = PaymentMethod::
                where('statue', 1)
                ->get();
        
                return view('Visitor.C_Checkout.Checkout', compact('price', 'course', 'payment_methods'));
            }
            $arr['state'] = 'Approve'; 
        }
        elseif ( $img_state ) { 
            session()->flash('faild', 'You Must Enter Receipt');
            $payment_methods = PaymentMethod::
            where('statue', 1)
            ->get();
    
            return view('Visitor.C_Checkout.Checkout', compact('price', 'course', 'payment_methods'));
        }
        else{ 
            $arr['payment_method_id'] = $req->payment_method_id;
        }
        $p_request = PaymentRequest::create($arr);
        $duration = 0;
        
        if ( $req->payment_method_id == 'Wallet' ) {
            Wallet::create([
                'student_id' => auth()->user()->id,
                'wallet' => -$price,
                'state' => 'Approve',
                'date' => now(),
                'payment_request_id' => $p_request->id,
            ]);
        }
        foreach ($course->prices as $item) {
            if ( $item->price == $price ) {
                $duration = $item->duration;
            }
        }
        $chapters = Chapter::where('course_id', $course->id)
        ->get();

        foreach ( $chapters as $item ) {
            PaymentOrder::create([
                'payment_request_id' => $p_request->id,
                'chapter_id' => $item->id,
                'duration' => $duration,
            ]);
        }
        
        $p_method = isset($p_request->method->payment) ? $p_request->method->payment : 'Wallet';
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
        $chapters_price = $price;
        $chapters = json_decode(Cache::get('marketing'));
        return view('Visitor.Cart', compact('chapters', 'chapters_price'));
    }

    public function sel_duration_course( Request $req ){
        $price = 0;
        $arr = [];
        foreach ( $req->data as $item ) {
            $price += floatval($item['price']);
            $ch_arr = json_decode($item['chapter']);
            $ch_arr->ch_price = floatval($item['price']);
            $arr[] = $ch_arr;
        }
        $arr = json_encode($arr);
        Cache::store('file')->put('marketing', $arr, 10000);
        Cache::store('file')->put('chapters_price', $price, 10000);
        return response()->json([
            'req' => $arr
        ]);
    }
}
