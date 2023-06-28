<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Genre;
use App\Models\Country;
use App\Models\Movie;
use App\Models\Episode;




class IndexController extends Controller
{
    //
    public function home(){
        $category = Category::all()->where('status',1);
        $country = Country::all();
        $genre = Genre::all();
        $category_home = Category::with('movie')->orderBy('id','DESC')->where('status',1)->get();
        return view('pages.home',compact('category','genre','country','category_home'));
    }
    public function genre($slug){
        $category = Category::all()->where('status',1);
        $country = Country::all();
        $genre = Genre::all();
        $gen_slug = Genre::where('slug',$slug)->first();
        return view('pages.genre',compact('category','genre','country','gen_slug'));
    }
    public function country($slug){
        $category = Category::all()->where('status',1);;
        $country = Country::all();
        $genre = Genre::all();
        $coun_slug = Country::where('slug',$slug)->first();
        return view('pages.country',compact('category','genre','country','coun_slug'));
    }
    public function category($slug){
        $category = Category::all()->where('status',1);;
        $country = Country::all();
        $genre = Genre::all();
        $cate_slug = Category::where('slug',$slug)->first();
        ;
        return view('pages.category',compact('category','genre','country','cate_slug'));
    }
    public function movie(){
        $category = Category::all();
        $country = Country::all();
        $genre = Genre::all();
        return view('pages.movie');
    }
    public function watch(){
        $category = Category::all();
        $country = Country::all();
        $genre = Genre::all();
        return view('pages.watch');
    }
    public function episode(){
        $category = Category::all();
        $country = Country::all();
        $genre = Genre::all();
        return view('pages.episode');
    }
}
