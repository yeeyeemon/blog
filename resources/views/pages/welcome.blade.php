@extends('main')
@section('content')
    <!-- <div class="row">
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
    </div> -->

    <main id="wrapper">
        <aside id="sidebar-wrapper">
          <ul class="sidebar-nav">
            <li class="active">
              <a class="nav-link" href="#"><i class="fas fa-home"></i> Home<span class="sr-only">(current)</span></a>
            </li>
            <li>
              <a class="nav-link" href="#">Trending<span class="sr-only"></span></a>
            </li>
            <li>
              <a class="nav-link" href="#">Subscriptions<span class="sr-only"></span></a>
            </li>
            <li>
              <a class="nav-link" href="#">Library<span class="sr-only"></span></a>
            </li>
            <li>
              <a class="nav-link" href="#">History<span class="sr-only"></span></a>
            </li>
            <li>
              <a class="nav-link" href="#">Watch Later<span class="sr-only"></span></a>
            </li>
            <li>
              <a class="nav-link" href="#">Liked Videos<span class="sr-only"></span></a>
            </li>
            <li>
              <a class="nav-link" href="#">Popular on Youtube<span class="sr-only"></span></a>
            </li>
            <li>
              <a class="nav-link" href="#">Music<span class="sr-only"></span></a>
            </li>
            <li>
              <a class="nav-link" href="#">Sports<span class="sr-only"></span></a>
            </li>
            <li>
              <a class="nav-link" href="#">Gaming<span class="sr-only"></span></a>
            </li>
            <li>
              <a class="dropdown-btn nav-link">Categories 
                <i class="fa fa-caret-down"></i>
              </a>
              <div class="dropdown-container" id="root">
              </div>
              <span class="sr-only"></span>
            </li>
            <li>
              <a class="nav-link" href="#">Gaming<span class="sr-only"></span></a>
            </li>
            <li>
              <a class="nav-link" href="#">Live<span class="sr-only"></span></a>
            </li>
            <li>
              <a class="nav-link" href="#">Setting<span class="sr-only"></span></a>
            </li>
            <li>
              <a class="nav-link" href="#">Report History<span class="sr-only"></span></a>
            </li>
            <li>
              <a class="nav-link" href="#">Help<span class="sr-only"></span></a>
            </li>
            <li class="mb-5">
              <a class="nav-link" href="#">Send Feedback<span class="sr-only"></span></a>
            </li>
          </ul>
        </aside>

        <section id="content-wrapper">
            <div class="container-fluid">
                <div class="row">
                  <h3 class="col-12">Category by</h3>
                  <div class="col-sm-6 col-md-3" id="root">
                  </div>
                </div>
            </div>

            <div class="container-fluid" id="all-posts">
                <div class="row">
                    <h3 class="col-12">Latest</h3>
                    @foreach ($posts as $post)
                    <div class="col-sm-6 col-md-3 post" id="results">
                        <a href="{{route('blog.single',$post->slug)}}" role="button">
                            <img src="{{url('images/'.$post->images)}}">
                            <h3>{{$post->title}}</h3>
                            <!-- <p>{{substr($post->body,0,100)}}{{strlen($post->body)>100 ? '....' : ''}}</p> -->
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>

            <div class="container-fluid" id="all-popular-posts">
                <h4 class="col-12">Most Popular</h4>
                <div class="carousel-wrap">
                    <div class="owl-carousel">
                        @foreach ($popular_posts as $popular_post)
                        <div class="item post">
                            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ_kzJ0rydH34OAftFVHOlKNkEywRfLw3qWgb_xRBk3GkDxq4CU">
                            <h3>{{$popular_post->title}}</h3>
                            <!-- <p>{{substr($popular_post->body,0,100)}}{{strlen($post->body)>100 ? '....' : ''}}</p> -->
                            <a href="{{route('blog.single',$post->slug)}}" class="btn-primary btn-md" role="button">Read More</a>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="container-fluid">
                <h4 class="col-12">Recommended</h4>
                <div class="carousel-wrap">
                  <div class="owl-carousel">
                    <div class="item">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ_kzJ0rydH34OAftFVHOlKNkEywRfLw3qWgb_xRBk3GkDxq4CU">
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                  </div>
                  <div class="item">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ7_MzRb221V_vhjSxUKf2G8nochs16uNT2J4wtaeYajyR1hyQN">
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                  </div>
                  <div class="item">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS-fjqTHWrNpg6S8k34ZUQgH2GKUrpPMkwEWI41ykc1d0VagO8S">
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                  </div>
                  <div class="item">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTBPGa8zOXqs7qHaEH-fmn3UPJDeDj0zjF4nt_slr0z8VODoPI9">
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                  </div>
                  <div class="item">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQYFH_TP9dmajqszuQNH6eTvol1cN_rSpgEJDB50cWe2kQU0nzC">
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                  </div>
                  <div class="item">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT5tAnYrb1i3tOjITwHZYJYS_KI7Bm73y09tqsGbNzj1-QD4SpZ">
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                  </div>
                  </div>
                </div>
            </div>

            <div class="container-fluid">
                <h4 class="col-12">Funny Videos</h4>
                <div class="carousel-wrap">
                  <div class="owl-carousel">
                    <div class="item">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ_kzJ0rydH34OAftFVHOlKNkEywRfLw3qWgb_xRBk3GkDxq4CU">
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                  </div>
                  <div class="item">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ7_MzRb221V_vhjSxUKf2G8nochs16uNT2J4wtaeYajyR1hyQN">
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                  </div>
                  <div class="item">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS-fjqTHWrNpg6S8k34ZUQgH2GKUrpPMkwEWI41ykc1d0VagO8S">
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                  </div>
                  <div class="item">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTBPGa8zOXqs7qHaEH-fmn3UPJDeDj0zjF4nt_slr0z8VODoPI9">
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                  </div>
                  <div class="item">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQYFH_TP9dmajqszuQNH6eTvol1cN_rSpgEJDB50cWe2kQU0nzC">
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                  </div>
                  <div class="item">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT5tAnYrb1i3tOjITwHZYJYS_KI7Bm73y09tqsGbNzj1-QD4SpZ">
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                  </div>
                  </div>
                </div>
            </div>

            <div class="container-fluid">
                <h4 class="col-12">Action Videos</h4>
                <div class="carousel-wrap">
                  <div class="owl-carousel">
                    <div class="item">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ_kzJ0rydH34OAftFVHOlKNkEywRfLw3qWgb_xRBk3GkDxq4CU">
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                  </div>
                  <div class="item">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ7_MzRb221V_vhjSxUKf2G8nochs16uNT2J4wtaeYajyR1hyQN">
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                  </div>
                  <div class="item">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS-fjqTHWrNpg6S8k34ZUQgH2GKUrpPMkwEWI41ykc1d0VagO8S">
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                  </div>
                  <div class="item">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTBPGa8zOXqs7qHaEH-fmn3UPJDeDj0zjF4nt_slr0z8VODoPI9">
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                  </div>
                  <div class="item">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQYFH_TP9dmajqszuQNH6eTvol1cN_rSpgEJDB50cWe2kQU0nzC">
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                  </div>
                  <div class="item">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT5tAnYrb1i3tOjITwHZYJYS_KI7Bm73y09tqsGbNzj1-QD4SpZ">
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                  </div>
                  </div>
                </div>
            </div>

            <div class="container-fluid">
                <h4 class="col-12">Drama Videos</h4>
                <div class="carousel-wrap">
                  <div class="owl-carousel">
                    <div class="item">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ_kzJ0rydH34OAftFVHOlKNkEywRfLw3qWgb_xRBk3GkDxq4CU">
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                  </div>
                  <div class="item">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ7_MzRb221V_vhjSxUKf2G8nochs16uNT2J4wtaeYajyR1hyQN">
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                  </div>
                  <div class="item">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS-fjqTHWrNpg6S8k34ZUQgH2GKUrpPMkwEWI41ykc1d0VagO8S">
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                  </div>
                  <div class="item">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTBPGa8zOXqs7qHaEH-fmn3UPJDeDj0zjF4nt_slr0z8VODoPI9">
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                  </div>
                  <div class="item">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQYFH_TP9dmajqszuQNH6eTvol1cN_rSpgEJDB50cWe2kQU0nzC">
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                  </div>
                  <div class="item">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT5tAnYrb1i3tOjITwHZYJYS_KI7Bm73y09tqsGbNzj1-QD4SpZ">
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                  </div>
                  </div>
                </div>
            </div>

            <div class="container-fluid">
                <h4 class="col-12">Horror Videos</h4>
                <div class="carousel-wrap">
                  <div class="owl-carousel">
                    <div class="item">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ_kzJ0rydH34OAftFVHOlKNkEywRfLw3qWgb_xRBk3GkDxq4CU">
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                  </div>
                  <div class="item">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ7_MzRb221V_vhjSxUKf2G8nochs16uNT2J4wtaeYajyR1hyQN">
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                  </div>
                  <div class="item">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS-fjqTHWrNpg6S8k34ZUQgH2GKUrpPMkwEWI41ykc1d0VagO8S">
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                  </div>
                  <div class="item">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTBPGa8zOXqs7qHaEH-fmn3UPJDeDj0zjF4nt_slr0z8VODoPI9">
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                  </div>
                  <div class="item">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQYFH_TP9dmajqszuQNH6eTvol1cN_rSpgEJDB50cWe2kQU0nzC">
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                  </div>
                  <div class="item">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT5tAnYrb1i3tOjITwHZYJYS_KI7Bm73y09tqsGbNzj1-QD4SpZ">
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                  </div>
                  </div>
                </div>
            </div>
        </section>
    </main>
@endsection