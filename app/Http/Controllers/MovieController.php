<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Country;
use App\Models\Genre;
use Illuminate\Http\Request;
use App\Models\Movie;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $list = Movie::with('category','country','genre')->orderBy('id','DESC')->get();
        $category = Category::all();
        $genre = Genre::all();
        $country = Country::all();
        return view ('admincp.movie.form',compact('list','category','genre','country'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $data = $request->all();
        $movie = new Movie();
        $movie->title=$data['title'];
//         = $data['image'];
        $movie->slug=$data['slug'];
        $movie->description=$data['description'];
        $movie->status=$data['status'];
        $movie->category_id=$data['category'];
        $movie->genre_id=$data['genre'];
        $movie->country_id=$data['country'];

        $get_image = $request->file('image');
        $path = 'uploads/movie/';
        if($get_image){
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image = $name_image.rand(0,9999).'.'.$get_image->getClientOriginalExtension();
            $get_image->move($path,$new_image);
//            File::copy($path.$new_image,$path_gallery.$new_image);
            $movie->image = $new_image;
        }
        $movie->save();
        return redirect()->back();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $list = Movie::with('category','country','genre')->orderBy('id','DESC')->get();
        $movie = Movie::find($id);
        $category = Category::all();
        $genre = Genre::all();
        $country = Country::all();
        return view ('admincp.movie.form',compact('list','category','genre','country','movie'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        //
        $data = $request->all();
        $movie = Movie::find($id);
        $movie->title=$data['title'];
//         = $data['image'];
        $movie->slug=$data['slug'];
        $movie->description=$data['description'];
        $movie->status=$data['status'];
        $movie->category_id=$data['category'];
        $movie->genre_id=$data['genre'];
        $movie->country_id=$data['country'];

        $get_image = $request->file('image');
        $path = 'uploads/movie/';
        if($get_image){
            if(!empty($movie->image)){
                unlink('uploads/movie/'.$movie->image);
            }
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image = $name_image.rand(0,9999).'.'.$get_image->getClientOriginalExtension();
            $get_image->move($path,$new_image);
//            File::copy($path.$new_image,$path_gallery.$new_image);
            $movie->image = $new_image;
        }
        $movie->save();
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $movie =Movie::find($id);
        if(!empty($movie->image)){
            unlink('uploads/movie/'.$movie->image);
        }
        $movie->delete();
        return  redirect()->back();
    }
}
