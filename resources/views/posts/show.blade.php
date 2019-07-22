@extends('main')
@section('content')
<div class="row">
    <div class="col-md-8">
            <h1 style="margin-top: 20px;">{{$post->title}}</h1>
            <p class="lead">
                {{$post->body}}
            </p>

            <div class="tags">
                @foreach ($post->tags as $tag)
                    <span class="label label-default">{{$tag->name}}</span>
                @endforeach
            </div>
    </div>
    <div class="col-md-4">
        <div class="well">
            <div class="dl-horizontal">
                <dt>Created At:</dt>
                <dd>{{date('M j,Y h:ia',strtotime($post->created_at)) }}</dd>
            </div>
            <div class="dl-horizontal">
                    <dt>Last Updated:</dt>
                    <dd>{{date('M j,Y h:ia',strtotime($post->updated_at))}}</dd>
                </div>
                <br>
                <div class="row">
                    <div class="col-sm-6">
                        <a href="/posts/{{$post->id}}/edit" class="btn btn-primary btn-block">Edit</a>
                    </div>
                    <div class="col-sm-6">
                        <form method="POST" action="/posts/{{$post->id}}">
                            {{method_field('DELETE')}}
            
                            @csrf
            
                            <button type="submit" class="btn btn-danger btn-block">Delete </button>
                        </form>
                    </div>
                </div>
        </div>
    </div>
</div>
<hr>

@endsection