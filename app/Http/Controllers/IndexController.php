<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Genre;
use App\Models\Country;
use App\Models\Movie;
use App\Models\Episode;
use DB;




class IndexController extends Controller
{
    //
    public function home(){
        $phimhot = Movie::where('phimhot',1)->where('status',1)->orderBy('dateupdate','DESC')->get();
        $category = Category::all()->where('status',1);
        $country = Country::all();
        $genre = Genre::all();
        $category_home = Category::with('movie')->orderBy('id','DESC')->where('status',1)->get();
        return view('pages.home',compact('category','genre','country','category_home','phimhot'));
    }
    public function genre($slug){
        $category = Category::all()->where('status',1);
        $country = Country::all();
        $genre = Genre::all();
        $gen_slug = Genre::where('slug',$slug)->first();
        $movie = Movie::where('genre_id',$gen_slug->id)->orderBy('dateupdate','DESC')->paginate(20);
        return view('pages.genre',compact('category','genre','country','gen_slug','movie'));
    }
    public function country($slug){
        $category = Category::all()->where('status',1);
        $country = Country::all();
        $genre = Genre::all();
        $coun_slug = Country::where('slug',$slug)->first();
        $movie = Movie::where('country_id',$coun_slug->id)->orderBy('dateupdate','DESC')->paginate(20);;
        return view('pages.country',compact('category','genre','country','coun_slug','movie'));
    }
    public function category($slug){
        $category = Category::all()->where('status',1);
        $country = Country::all();
        $genre = Genre::all();
        $cate_slug = Category::where('slug',$slug)->first();
        $movie = Movie::where('category_id',$cate_slug->id)->orderBy('dateupdate','DESC')->paginate(20);
        return view('pages.category',compact('category','genre','country','cate_slug','movie'));
    }
    public function movie($slug){
        $category = Category::all();
        $country = Country::all();
        $genre = Genre::all();
        $movie = Movie::with('category','country','genre')->where('slug',$slug)->where('status',1)->first();
        $related = Movie::with('category','country','genre')->where('category_id',$movie->category_id)->orderby(DB::raw('RAND()'))->whereNotIn('slug',[$slug])->get();
        return view('pages.movie',compact('category','genre','country','movie','related'));
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

    public function year($year){
        $year=$year;
        $category = Category::all()->where('status',1);
        $country = Country::all();
        $genre = Genre::all();
        $movie = Movie::where('year',$year)->orderBy('dateupdate','DESC')->paginate(20);
        return view('pages.year',compact('category','genre','country','year','movie'));

    }
}
