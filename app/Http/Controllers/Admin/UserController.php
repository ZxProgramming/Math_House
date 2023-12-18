<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Admin_role;
use App\Models\Marketing;
use App\Models\Category;
use App\Models\Course;

class UserController extends Controller
{
    public function role_admins(){
        $admins = User::where('position', 'admin')
        ->get();

        return view('Admin.Users.RoleAdmin',
        compact('admins'));
    }

    public function role_del_admin($id){
        Admin_role::where('user_id', $id)
        ->delete();

        return redirect()->back();
    }

    public function role_admin_edit( Request $req ){
        Admin_role::where('user_id', $req->user_id)
        ->delete();
        foreach ( $req->roles as $item ) {
            Admin_role::create([
                'user_id' => $req->user_id,
                'admin_role' => $item,
            ]);
        }
        return redirect()->back();
    }

    public function admins(){
        $sup_admins = User::where('position', 'super_admin')
        ->get();
        $admins = User::where('position', 'admin')
        ->get();

        return view('Admin.Users.Admins', compact('sup_admins', 'admins'));
    }

    public function del_admin( $id ){
        User::where('id', $id)
        ->where('position', '!=', 'super_admin')
        ->delete();

        return redirect()->back();
    }

    public function admin_edit( Request $req ){
        User::where('id', $req->user_id)
        ->where('position', '!=', 'super_admin')
        ->update($req->only('name', 'email', 'phone'));

        return redirect()->back();
    }

    public function admin_add(){
        return view('Admin.Users.AddAdmin');
    }

    public function add_admin( Request $req ){
        $arr = $req->only('name', 'email', 'phone');
        $arr['password'] = bcrypt($req->password);
        $arr['position'] = 'admin';
        $user = User::create($arr);
        foreach ( $req->roles as $item ) {
            Admin_role::create([
                'user_id' => $user->id,
                'admin_role' => $item,
            ]);
        }
        return redirect()->back();
    }
    
    public function admin_filter( Request $req ){
        $users_id = Admin_role::
        where('admin_role', $req->admin_role)
        ->pluck('user_id');

        $sup_admins = [];
        $admins = User::whereIn('id', $users_id)
        ->get();

        return view('Admin.Users.Admins', compact('sup_admins', 'admins'));
    }

    public function student(){
        $students = User::where('position', 'student')
        ->get();
        $courses = Course::all();

        return view('Admin.Users.Students', compact('students', 'courses'));
    }

    public function student_filter(){
        $students = Marketing::
        get();
        $courses = Course::all();

        return $students;
    }

    public function stu_info(){
        $students = User::where('position', 'student')
        ->get();

        return view('Admin.Users.StudentsInfo', compact('students'));
    }

    public function add_student(){
        return view('Admin.Users.AddStudent');
    }

    public function student_add( Request $req ){
        $arr = $req->only('name', 'email', 'phone', 'parent_email', 'parent_phone');
        $arr['password'] = bcrypt($req->password);
        $arr['position'] = 'student';
        User::create($arr);

        return redirect()->back();
    }

    public function stu_edit( Request $req ){
        $arr = $req->only('name', 'email', 'phone', 'parent_email', 'parent_phone');
        $arr['password'] = bcrypt($req->password);
        User::
        where('id', $req->user_id)
        ->update($arr);

        return redirect()->back();
    }

    public function del_stu( $id ){
        User::where('id', $id)
        ->delete();

        return redirect()->back();
    }

    public function teacher(){
        $teachers = User::
        select('*', 'users.id as u_id')
        ->leftJoin('courses', 'courses.id', '=', 'users.course_id')
        ->leftJoin('categories', 'categories.id', '=', 'users.category_id')
        ->where('position', 'teacher')
        ->get();
        $categories = Category::all();
        $courses = Course::all();

        return view('Admin.Users.Teachers',
        compact('teachers', 'categories', 'courses'));
    }

    public function teacher_filter(Request $req){
        $teachers = User::
        select('*', 'users.id as u_id')
        ->leftJoin('courses', 'courses.id', '=', 'users.course_id')
        ->leftJoin('categories', 'categories.id', '=', 'users.category_id')
        ->where('course_id', $req->t_course)
        ->get();
        $categories = Category::all();
        $courses = Course::all();

        return view('Admin.Users.Teachers_Filter',
        compact('teachers', 'categories', 'courses'));
    }

    public function teacher_edit( Request $req ){
        $arr = $req->only('name', 'email', 'phone', 'category_id', 'course_id');
        User::where('id', $req->user_id)
        ->update($arr);

        return redirect()->back();
    }

    public function del_teacher($id){
        User::where('id', $id)
        ->where('position', '!=', 'super_admin')
        ->delete();

        return redirect()->back();
    }

    public function teacher_add(){
        $categories = Category::all();
        $courses    = Course::all();
        return view('Admin.Users.AddTeacher', compact('categories', 'courses'));
    }

    public function add_teacher( Request $req ){
        $arr = $req->only('name', 'email', 'phone', 'category_id', 'course_id');
        $arr['password'] = bcrypt($req->password);
        $arr['position'] = 'teacher';
        extract($_FILES['image']);
        $img_name = null;
        if ( !empty($name) ) {
            $extention_arr = ['jpg', 'jpeg', 'png', 'svg'];
            $extention = explode('.', $name);
            $extention = end($extention);
            $extention = strtolower($extention);
            if ( in_array($extention, $extention_arr)) {
                $img_name = now() . rand(1, 10000) . $name;
                $img_name = str_replace([' ', ':', '-'], 'X', $img_name);
                $arr['image'] = $img_name;
            }
        }

        move_uploaded_file($tmp_name, 'images/users/' . $img_name);
        User::create($arr);
        return redirect()->back();
    }

}
