@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Quản lí Phim') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                            <a href="{{route('movie.index')}}">Liệt kê danh sách phim</a>
                        @if(!isset($movie))
                            <form action="{{route('movie.store')}}" enctype="multipart/form-data" method="post">
                                @csrf
                                <div class="form-group">
                                    <label >Title</label>
                                    <input type="text" name="title" id="slug"  class="form-control" onkeyup="ChangeToSlug()" placeholder="...">
                                </div>
                                <div class="form-group">
                                    <label >Slug</label>
                                    <input type="text" name="slug"  id="convert_slug" class="form-control" >
                                </div>
                                <div class="form-group">
                                    <label>Image</label>
                                    <input type="file" name="image"  class="form-control-file"  >
                                </div>
                                <div class="form-group">
                                    <label id="description">Description</label>
                                    <textarea type="text" name="description" style="resize: none" id="description" class="form-control" ></textarea>
                                </div>
                                <div class="form-group">
                                    <label >Category</label>
                                    <select name="category" class="form-control">
                                        @foreach($category as $key => $cate)
                                            <option value="{{$cate->id}}">{{$cate->title}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label >Country</label>
                                    <select name="country" class="form-control">
                                        @foreach($country as $key => $coun)
                                            <option value="{{$coun->id}}">{{$coun->title}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label >Genre</label>
                                    <select name="genre" class="form-control">
                                        @foreach($genre as $key => $gen)
                                            <option value="{{$gen->id}}">{{$gen->title}}</option>
                                        @endforeach
                                    </select>

                                </div>
                                <div class="form-group">
                                    <label id="status">Status</label>
                                    <select class="form-select" name="status" aria-label="Default select example">
                                        <option value="1">Hiển thị</option>
                                        <option value="0">Không hiển thị</option>
                                    </select>
                                </div>
                                <input type="submit" class="btn btn-success" value="Thêm dữ liệu">
                            </form>
                        @else
                            <form action="{{url('movie',['id'=> $movie->id])}}" enctype="multipart/form-data" method="post" >
                                @method('PUT')
                                @csrf
                                <div class="form-group">
                                    <label id="title">Title</label>
                                    <input type="text" name="title" id="slug" value="{{$movie->title}}"  class="form-control" onkeyup="ChangeToSlug()" placeholder="...">
                                </div>
                                <div class="form-group">
                                    <label id="slug">Slug</label>
                                    <input type="text" name="slug"  id="convert_slug" value="{{$movie->slug}}" class="form-control"  >
                                </div>
                                <div class="form-group">
                                    <label>Image</label>

                                    @if($movie)
                                        <input type="file" name="image"  class="form-control-file" accept="{{asset('uploads/movie/'.$movie->image)}}" >
                                        <img width="60" src="{{asset('uploads/movie/'.$movie->image)}}">
                                    @else
                                        <input type="file" name="image"  class="form-control-file"  >
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label id="description">Description</label>
                                    <textarea type="text" name="description"  style="resize: none"  id="description" class="form-control" >{{$movie->description}}</textarea>
                                </div>
                                <div class="form-group">
                                    <label >Category</label>
                                    <select name="category" class="form-control">
                                        @foreach($category as $key => $cate)
                                            @if($cate->id == $movie->category->id)
                                                <option value="{{$cate->id}}" selected>{{$cate->title}}</option>
                                            @else
                                                <option value="{{$cate->id}}">{{$cate->title}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label >Country</label>
                                    <select name="country" class="form-control">
                                        @foreach($country as $key => $coun)
                                            @if($coun->id == $movie->country->id)
                                                <option value="{{$coun->id}}" selected>{{$coun->title}}</option>
                                            @else
                                                <option value="{{$coun->id}}">{{$coun->title}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label >Genre</label>
                                    <select name="genre" class="form-control">
                                        @foreach($genre as $key => $gen)
                                            @if($gen->id == $movie->genre->id)
                                                <option value="{{$gen->id}}" selected>{{$gen->title}}</option>
                                            @else
                                                <option value="{{$gen->id}}">{{$gen->title}}</option>
                                            @endif
                                        @endforeach
                                    </select>

                                </div>
                                <div class="form-group">
                                    <label id="status">Status</label>
                                    @if($movie->status==1)
                                        <select class="form-select" name="status" >
                                            <option value="1" selected>Hiển thị </option>
                                            <option value="0">Không hiển thị</option>
                                        </select>
                                    @else
                                        <select class="form-select" name="status" >
                                            <option value="1">Hiển thị</option>
                                            <option value="0" selected>Không hiển thị</option>
                                        </select>
                                    @endif

                                </div>
                                <input type="submit" class="btn btn-success" value="Cập nhật">
                            </form>
                        @endif
{{--                        <table class="table" id="tablephim">--}}
{{--                            <thead>--}}
{{--                            <tr>--}}
{{--                                <th scope="col">#</th>--}}
{{--                                <th scope="col">Title</th>--}}
{{--                                <th scope="col">Slug</th>--}}
{{--                                <th scope="col">Image</th>--}}
{{--                                <th scope="col">Description</th>--}}
{{--                                <th scope="col">Category</th>--}}
{{--                                <th scope="col">Genre</th>--}}
{{--                                <th scope="col">Country</th>--}}
{{--                                <th scope="col">Show?</th>--}}
{{--                                <th scope="col">Manage</th>--}}
{{--                            </tr>--}}
{{--                            </thead>--}}
{{--                            <tbody class="order_position">--}}

{{--                            @foreach($list as $key =>$movi)--}}
{{--                                <tr id="{{$movi->id}}">--}}
{{--                                    <th scope="row">{{$key}}</th>--}}
{{--                                    <td>{{$movi->title}}</td>--}}
{{--                                    <td>{{$movi->slug}}</td>--}}
{{--                                    <td><img width="60"  src="{{asset('/uploads/movie/'.$movi->image)}}"/></td>--}}
{{--                                    <td>{{$movi->description}}</td>--}}
{{--                                    <td>{{$movi->category->title}}</td>--}}
{{--                                    <td>{{$movi->genre->title}}</td>--}}
{{--                                    <td>{{$movi->country->title}}</td>--}}
{{--                                    @if($movi->status==1)--}}
{{--                                        <td>Hiển thị</td>--}}
{{--                                    @else--}}
{{--                                        <td>Không hiển thị</td>--}}
{{--                                    @endif--}}
{{--                                    <td>--}}
{{--                                        <form action="{{url('movie',['id'=> $movi->id])}}" method="post">--}}
{{--                                            @method('delete')--}}
{{--                                            @csrf--}}
{{--                                            <input type="submit" value="Delete" class="btn btn-danger" onclick="return confirmdelete();"/>--}}
{{--                                        </form>--}}
{{--                                        <a href="{{route('movie.edit',$movi->id)}}" class="btn bg-warning">Edit</a>--}}
{{--                                    </td>--}}
{{--                                </tr>--}}
{{--                            @endforeach--}}
{{--                            </tbody>--}}
{{--                        </table>--}}

                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
<script>
    function confirmdelete() {
        if(!confirm("Are You Sure to delete this"))
            event.preventDefault();
    }
</script>
