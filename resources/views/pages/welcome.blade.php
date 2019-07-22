@extends('main')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="jumbotron">
                <h1>Welcome To My Blog</h1>
                <p class="lead">Thank you so much for visiting.</p>
                <button class="btn-success btn-lg" id="popular-post-btn">Popular Posts</button>

            </div>
        </div>
    </div>
   <div class="row" id="all-posts">
       <div class="col-md-8">
            @foreach ($posts as $post)
                <div class="post">
            
                    <h3>{{$post->title}}</h3>
                    <p>{{substr($post->body,0,100)}}{{strlen($post->body)>100 ? '....' : ''}}</p>
                    <a href="{{route('blog.single',$post->slug)}}" class="btn-primary btn-lg" role="button">Read More</a>
            
                </div>
                <hr>
            @endforeach
           
            
        </div>
    </div>
    <div class="row" id="all-popular-posts">
       <div class="col-md-8">
            @foreach ($popular_posts as $popular_post)
                <div class="post">
            
                    <h3>{{$popular_post->title}}</h3>
                    <p>{{substr($popular_post->body,0,100)}}{{strlen($post->body)>100 ? '....' : ''}}</p>
                    <a href="{{route('blog.single',$post->slug)}}" class="btn-primary btn-lg" role="button">Read More</a>
            
                </div>
                <hr>
            @endforeach
           
            
        </div>
    </div>
@endsection