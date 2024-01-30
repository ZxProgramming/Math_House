<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\User;
use Laravel\Tinker\TinkerCaster;

class CategoryController extends Controller
{
    // View Category
    private $columns = ['teacher_id','cate_name' ,'cate_des','cate_url','cate_price'];
    private $category_id = ['category_id'];
    public function index(){
        $dataCategory = Category::all();
        return view('Admin.courses.category' , compact('dataCategory'));
    }

    public function createCategory(request $request ){
        $request->validate([
            'cate_name'=>'required',
            'cate_des'=>'required',
            ]);
            $img_name = null;
            extract($_FILES['image']);
            if( !empty($name) ){
                $extension_arr = ['png', 'jpg', 'jpeg', 'svg', 'webp'];
                $extension = explode('.', $name);
                $extension = end($extension);
                $extension = strtolower($extension);
                if ( in_array($extension, $extension_arr) ) {
                    $img_name = rand(0, 1000) . now() . $name;
                    $img_name = str_replace([' ', ':', '-'], 'X', $img_name);
                }
                
            }
            
        move_uploaded_file($tmp_name, 'images/category/' . $img_name);
        $arr1 = $request->only($this->columns);
        $arr1['cate_url'] = $img_name ??'default.png';
        $data= Category::create($arr1);

        if($data){
            return redirect()->route('category')->with('success','Data Inserted Success');
        }
            
    }


    public function editCategory( Request $request){
        $cate_id = $request->only($this->category_id);
        $data = $request->validate([
            'cate_name'=>'required',
            'cate_des'=>'required'
        ]);
        $img_name = null;
        extract($_FILES['cate_img']);
        if( !empty($name) ){
            $extension_arr = ['png', 'jpg', 'jpeg', 'svg', 'webp'];
            $extension = explode('.', $name);
            $extension = end($extension);
            $extension = strtolower($extension);
            if ( in_array($extension, $extension_arr) ) {
                $img_name = rand(0, 1000) . now() . $name;
                $img_name = str_replace([' ', ':', '-'], 'X', $img_name);
                $data['cate_url'] = $img_name;
            }

            
            
        }
            
                
                    $updateCategory =    Category::where('id',$cate_id)->update($data);

                    if($updateCategory){
                        move_uploaded_file($tmp_name, 'images/category/' . $img_name);
                        session()->flash('success','Data Updated Successfully');
                        return redirect()->back();
                    }
    
    } 

    public function categoryDelete($id){
        Category::where('id',$id)->delete();
        session()->flash('success','Data Deleted Success');
        return redirect()->route('category');

            
    }

}
