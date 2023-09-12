<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Category;
use Illuminate\Routing\Controller;

class IndexController extends Controller
{
    public function index()
    {

        $courses = Course::all();
        $categories = Category::all();


        return view('pages.index', compact('courses', 'categories'));

    }

    public function showCourses(){
        $courses = Course::all();
        return view('pages.course',compact('courses'));
    }

    public function login(){

        return view('pages.login');
    }

    public function register(){

        return view('pages.register');
    }

    public function change_lang($lang){
        if(in_array($lang,['ar','en'])) {
            session()->forget('lang');
            session()->put('lang', $lang);
        }


}

public function profile(){

        return view('pages.profile');
}

}
