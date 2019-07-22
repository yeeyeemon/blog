@extends('main')

@section('content')
<div class="row">
 <h2>{{$tag->name}} Posts <small>{{$tag->posts()->count()}} Posts</small></h2>

 <div class="col-md-12">
            <table class="table">
                <thead>
                    <th>#</th>
                    <th>Title</th>
                    <th>Tags</th>
                </thead>
                <tbody>
                    @foreach($tag->posts as $post)
                    <tr>
                        <td>{{$post->id}}</td>
                        <td>{{$post->title}}</td>
                        <td>
                        @foreach($post->tags as $tag)
                        <span class="label label-default">{{$tag->name}}</span>
                        @endforeach
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
           
        </div>
   
</div>
@endsection