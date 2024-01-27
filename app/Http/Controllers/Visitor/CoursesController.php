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
        Cache::store('file')->put('marketing', $data, 10000);
        Cache::store('file')->put('chapters_price', $chapters_price, 10000);
         
        if ( empty(auth()->user()) ) {
            return view('Visitor.Login.login');
        }
        else{
            $chapters = json_decode(Cache::get('marketing'));
            $chapters = empty($chapters) ? [] : $chapters;
            return view('Visitor.Cart', compact('chapters', 'chapters_price'));
        }
    }

    public function course_payment( Request $req ){
        $chapters = json_decode(Cache::get('marketing'));
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
                $price = json_decode(Cache::get('chapters_price'));
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
        $price = json_decode(Cache::get('chapters_price'));
        return view('Visitor.Checkout.Checkout', compact('price'));
    }

    public function new_payment(){
         
        if ( empty(auth()->user()) ) {
            return view('Visitor.Login.login');
        }
        else{
            $chapters = json_decode(Cache::get('marketing'));
            $chapters_price = json_decode(Cache::get('chapters_price'));
            $chapters = empty($chapters) ? [] : $chapters;
            return view('Visitor.Cart', compact('chapters', 'chapters_price'));
        }
    }

}
