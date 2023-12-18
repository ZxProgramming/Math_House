<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
class CategoryController extends Controller
{
    // View Category
    private $columns = ['user_id','cate_name','image' ,'cate_des'];
            public function index(){
                    $dataCategory = Category::all()->where('user_id',auth()->user()->id);
                    return view('Admin.courses.category' , compact('dataCategory'));
            }

            public function createCategory(request $request ){
                   $request->validate([
                        'cate_name'=>'required',
                        'image'=>'required',
                        'cate_des'=>'required',
                       ]);
                        if($request->hasFile('image')){
                            $file_Extension =  $request->image->getClientOriginalExtension();
                               $fileName = time() . '.' .$file_Extension;
                               $path = 'public/assets/media/categoryImages';
                             $image =  $request->image->move($path,$fileName);
                        };
                                dd( $fileName);

                      $data= Category::create($request->only($this->columns));

                       if($data){
                return redirect()->route('category')->with('success','Data Inserted Success');

                       }
                
                               
            }

}
