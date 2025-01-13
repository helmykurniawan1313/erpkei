@extends('layouts.mainlay')

@section('containers')




  <main class="main">

    <!-- Page Title -->
    <div class="page-title dark-background" style="background-image: url(/img/page-title-bg.jpg);">
      <div class="container position-relative">
        <h1>Blog</h1>
       
      </div>
    </div><!-- End Page Title -->

    <!-- Blog Posts Section -->
    <section id="blog-posts" class="blog-posts section">

      <div class="container">
        <div class="row gy-4">
            <div class="row justify-content-center mb-3">
                <div class="col-md-6">
                    <form action="/posts" method="GET">
                        @if(request('category'))
                        <input type="hidden" name="category" value="{{ request('category') }}">
                        @endif
                        @if(request('author'))
                        <input type="hidden" name="author" value="{{ request('author') }}">
                        @endif
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="Search.." name="search" value="{{ request('search') }}">
                            <button class="btn btn-warning" type="submit">Search</button>
                        </div>
                    </form>
                </div>
            </div>
@foreach($posts as $post)

          <div class="col-lg-3">
            <article class="position-relative h-100">

              <div class="post-img position-relative overflow-hidden">
                <img src="{{ asset('storage/' . $post->image) }}" class="img-fluid" alt="" width="350" height="350">
                <span class="post-date">{{ $post->created_at->diffForHumans() }}</span>
              </div>

              <div class="post-content d-flex flex-column">

                <h3 class="post-title">{{ $post->title }}</h3>

                <div class="meta d-flex align-items-center">
                  <div class="d-flex align-items-center">
                    <i class="bi bi-person"></i> <span class="ps-2">{{ $post->author->name }}</span>
                  </div>
                  <span class="px-3 text-black-50">/</span>
                  <div class="d-flex align-items-center">
                    <i class="bi bi-folder2"></i> <span class="ps-2">{{ $post->category->name }}</span>
                  </div>
                </div>

                <p>
                 {{ $post->excerpt }}
                </p>

                <hr>

                <a href="/posts/{{ $post->slug }}" class="readmore stretched-link"><span>Read More</span><i class="bi bi-arrow-right"></i></a>

              </div>

            </article>
          </div><!-- End post list item -->
          @endforeach
          

    </section><!-- /Blog Posts Section -->

    <!-- Blog Pagination Section -->
    <section id="blog-pagination" class="blog-pagination section">

      <div class="container">
        <div class="d-flex justify-content-center">
            {{ $posts->links() }}
        </div>
      </div>

    </section><!-- /Blog Pagination Section -->

  </main>

  @endsection