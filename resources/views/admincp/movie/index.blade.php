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
                        <a href="{{ route('movie.create')}}">Thêm phim</a>

                        <table class="table" id="tablephim">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Title</th>
                                <th scope="col">Slug</th>
                                <th scope="col">Image</th>
                                {{--                                <th scope="col">Description</th>--}}
                                <th scope="col">Category</th>
                                <th scope="col">Genre</th>
                                <th scope="col">Country</th>
                                <th scope="col">Show?</th>
                                <th scope="col">Manage</th>
                            </tr>
                            </thead>
                            <tbody class="order_position">

                            @foreach($list as $key =>$movi)
                                <tr id="{{$movi->id}}">
                                    <th scope="row">{{$key}}</th>
                                    <td>{{$movi->title}}</td>
                                    <td>{{$movi->slug}}</td>
                                    <td><img width="60"  src="{{asset('/uploads/movie/'.$movi->image)}}"/></td>
                                    {{--                                    <td>{{$movi->description}}</td>--}}
                                    <td>{{$movi->category->title}}</td>
                                    <td>{{$movi->genre->title}}</td>
                                    <td>{{$movi->country->title}}</td>
                                    @if($movi->status==1)
                                        <td>Hiển thị</td>
                                    @else
                                        <td>Không hiển thị</td>
                                    @endif
                                    <td>
                                        <form action="{{url('movie',['id'=> $movi->id])}}" method="post">
                                            @method('delete')
                                            @csrf
                                            <input type="submit" value="Delete" class="btn btn-danger" onclick="return confirmdelete();"/>
                                        </form>
                                        <a href="{{route('movie.edit',$movi->id)}}" class="btn bg-warning">Edit</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

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