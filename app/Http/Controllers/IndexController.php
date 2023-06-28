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
        $category = Category::all();
        $country = Country::all();
        $genre = Genre::all();
        return view('pages.home',compact('category','genre','country'));
    }
    public function genre($slug){
        $category = Category::all();
        $country = Country::all();
        $genre = Genre::all();
        return view('pages.genre',compact('category','genre','country'));
    }
    public function country($slug){
        $category = Category::all();
        $country = Country::all();
        $genre = Genre::all();
        return view('pages.country',compact('category','genre','country'));
    }
    public function category($slug){
        $category = Category::all();
        $country = Country::all();
        $genre = Genre::all();
        return view('pages.category',compact('category','genre','country'));
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
