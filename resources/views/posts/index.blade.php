@extends('main')
@section('content')
<div class="row">
    <div class="col-md-10"> 
        <h1>All Posts</h1>

    </div>
    <div class="col-md-2">
        <a href="{{route('posts.create')}}" class="btn btn-primary btn-block btn-lg">Create Post</a>
    </div>
    <div class="col-md-12">
        <hr>
    </div>
</div>

<div class="row">

        <div class="col-md-12">
            <table class="table">
                <thead>
                    <th>#</th>
                    <th>Title</th>
                    <th>Body</th>
                    <th>Post Owner</th>
                    <th>created-At</th>
                    <th>Option</th>
                </thead>
                <tbody>
                    @foreach($posts as $post)
                    <tr>
                        <td>{{$post->id}}</td>
                        <td>{{$post->title}}</td>
                        <td>{{substr($post->body,0,50)}}{{strlen($post->body)>50 ? "....." :""}}</td>
                        <td>{{$post->user['name']}}</td>
                        <td>{{date('M j Y', strtotime($post->created_at))}}</td>
                        <td><a href="{{route('posts.show',$post->id)}}" class="btn btn-success">View</a><a href="{{route('posts.edit',$post->id)}}" class="btn btn-success">Edit</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
           
        </div>
</div>
<div class="row my-4">
    <div class="col-sm-6 col-sm-offset-5">
        {{$posts->render()}}
    </div>
</div>


@endsection
