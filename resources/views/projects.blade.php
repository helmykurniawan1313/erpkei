@extends('layouts.mainlay')

@section('containers')
<main class="main">

    <!-- Page Title -->
    <div class="page-title dark-background" style="background-image: url(/storage/{{ $about[0]->background }});">
      <div class="container position-relative">
        <h1>Projects</h1>
     
      </div>
    </div><!-- End Page Title -->

   <!-- Projects Section -->
    <section id="projects" class="projects section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Projects</h2>
        {{-- <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p> --}}
      </div><!-- End Section Title -->

      <div class="container">

        <div class="isotope-layout" data-default-filter="*" data-layout="masonry" data-sort="original-order">

          <ul class="portfolio-filters isotope-filters" data-aos="fade-up" data-aos-delay="100">
            <li data-filter="*" class="filter-active">All</li>
            @foreach ($categories as $category)
            <li data-filter=".filter-{{ $category->name }}">{{ $category->name }}</li>
            @endforeach
         
          </ul><!-- End Portfolio Filters -->
          @foreach ($projects as $project)
          <div class="row gy-4 isotope-container" data-aos="fade-up" data-aos-delay="200">
          
            <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-{{ $project->cat->name }}">
              <div class="portfolio-content h-100">
                <img src="/storage/{{ $project->image1 }}" class="img-fluid" alt="">
                <div class="portfolio-info">
                  <h4>{{ $project->cat->name }}</h4>
                  <p>{{ $project->title }}</p>
                  <a href="/storage/{{ $project->image1 }}" title="{{ $project->cat->name }}" data-gallery="portfolio-gallery-app" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                  <a href="/projects/{{ $project->slug }}" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a>
                </div>
              </div>
            </div><!-- End Portfolio Item -->
            @endforeach
           


          </div><!-- End Portfolio Container -->

        </div>

      </div>

    </section><!-- /Projects Section -->

  </main>

@endsection

