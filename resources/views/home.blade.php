@extends('layouts.mainlay')

@section('containers')






  
  <main class="main">

    <!-- Hero Section -->
    <section id="hero" class="hero section dark-background">

      <div class="info d-flex align-items-center">
        <div class="container">
          <div class="row justify-content-center" data-aos="fade-up" data-aos-delay="100">
            <div class="col-lg-12 text-center">
              <h2>{{ $about[0]->main_header }}</h2>
              <p>{{ $about[0]->main_body }}</p>
              <a href="#get-started" class="btn-get-started">Get Started</a>
            </div>
          </div>
        </div>
      </div>

      <div id="hero-carousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="2000">

       
        

        <div class="carousel-item active">
          <img src="/data_file/{{ $mainimage[0]->file }}" alt="">
        </div>
        @foreach($mainimage->skip(1) as $gam)
        <div class="carousel-item">
          <img src="/data_file/{{ $gam->file }}" alt="">
        </div>
        @endforeach

        <a class="carousel-control-prev" href="#hero-carousel" role="button" data-bs-slide="prev">
          <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
        </a>

        <a class="carousel-control-next" href="#hero-carousel" role="button" data-bs-slide="next">
          <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
        </a>

      </div>

    </section><!-- /Hero Section -->
   
    <!-- Get Started Section -->
    <section id="get-started" class="get-started section">

      <div class="container">

        <div class="row justify-content-between gy-4">

          <div class="col-lg-6 d-flex align-items-center" data-aos="zoom-out" data-aos-delay="100">
            <div class="content">
              <h3>Our Vision</h3>
              <p>{!! $about[0]->about !!}


              </p>
             
            </div>
          </div>

          <div class="col-lg-5" data-aos="zoom-out" data-aos-delay="200">
            <form action="forms/quote.php" method="post" class="php-email-form">
              <h3>Get a quote</h3>
              <p>If you need any information, Don't be shy to contact Us. We'll be happy to help</p>
              <div class="row gy-3">

               {{-- <div class="col-12">
                  <input type="text" name="name" class="form-control" placeholder="Name" required="">
                </div>  --}}

                {{-- <div class="col-12 ">
                  <input type="email" class="form-control" name="email" placeholder="Email" required="">
                </div>

                <div class="col-12">
                  <input type="text" class="form-control" name="phone" placeholder="Phone" required="">
                </div>

                <div class="col-12">
                  <textarea class="form-control" name="message" rows="6" placeholder="Message" required=""></textarea>
                </div>

                <div class="col-12 text-center">
                  <div class="loading">Loading</div>
                  <div class="error-message"></div>
                  <div class="sent-message">Your quote request has been sent successfully. Thank you!</div> --}}

                  {{-- <button type="submit">Get a quote</button> --}}

                  {{-- <div class="d-flex justify-content-center ">
                    <small>Send Email to {{ $profile[0]->email_1 }}</small>
                  </div> --}}

                    <a href="mailto:{{ $profile[0]->email_1 }}" class="btn btn-outline-primary" type="button"><i class="bi bi-envelope"> </i>Email {{ $profile[0]->email_1 }}</a>
                    @if($profile[0]->email_2)
                    {{-- <p>Send Email to {{ $profile[0]->email_2 }}</p> --}}
                    <a href="mailto:{{ $profile[0]->email_2 }}" class="btn btn-outline-primary" type="button"><i class="bi bi-envelope"> </i>Email {{ $profile[0]->email_2 }}</a>
                    @endif
                    @if($profile[0]->whatsapp)
                    <a href="https://wa.me/62{{ $profile[0]->whatsapp }}" class="btn btn-outline-primary" type="button"><i class="bi bi-whatsapp"> </i>WhatsApp +62 {{ $profile[0]->whatsapp }}</a>
                    @endif
                    @if($profile[0]->telp)
                    <a href="" class="btn btn-outline-primary disabled" type="button"><i class="bi bi-telephone"> </i>Phone {{ $profile[0]->telp }}</a>
                    @endif
                
                
              </div>
            </form>
          </div><!-- End Quote Form -->

        </div>

      </div>

    </section>
    <!-- /Get Started Section -->

    {{-- <!-- Constructions Section -->
    <section id="constructions" class="constructions section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Constructions</h2>
        <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p>
      </div><!-- End Section Title -->

      <div class="container">

        <div class="row gy-4">

          <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
            <div class="card-item">
              <div class="row">
                <div class="col-xl-5">
                  <div class="card-bg"><img src="/img/constructions-1.jpg" alt=""></div>
                </div>
                <div class="col-xl-7 d-flex align-items-center">
                  <div class="card-body">
                    <h4 class="card-title">Eligendi omnis sunt veritatis.</h4>
                    <p>Fuga in dolorum et iste et culpa. Commodi possimus nesciunt modi voluptatem placeat deleniti adipisci. Cum delectus doloribus non veritatis. Officia temporibus illo magnam. Dolor eos et.</p>
                  </div>
                </div>
              </div>
            </div>
          </div><!-- End Card Item -->

          <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
            <div class="card-item">
              <div class="row">
                <div class="col-xl-5">
                  <div class="card-bg"><img src="/img/constructions-2.jpg" alt=""></div>
                </div>
                <div class="col-xl-7 d-flex align-items-center">
                  <div class="card-body">
                    <h4 class="card-title">Possimus ut sed velit assumenda</h4>
                    <p>Sunt deserunt maiores voluptatem autem est rerum perferendis rerum blanditiis. Est laboriosam qui iste numquam laboriosam voluptatem architecto. Est laudantium sunt at quas aut hic. Eum dignissimos.</p>
                  </div>
                </div>
              </div>
            </div>
          </div><!-- End Card Item -->

          <div class="col-lg-6" data-aos="fade-up" data-aos-delay="300">
            <div class="card-item">
              <div class="row">
                <div class="col-xl-5">
                  <div class="card-bg"><img src="/img/constructions-3.jpg" alt=""></div>
                </div>
                <div class="col-xl-7 d-flex align-items-center">
                  <div class="card-body">
                    <h4 class="card-title">Error beatae dolor inventore aut</h4>
                    <p>Dicta porro nobis. Velit cum in. Nesciunt dignissimos enim molestiae facilis numquam quae quaerat ipsam omnis. Neque debitis ipsum at architecto officia laboriosam odit. Ut sunt temporibus nulla culpa.</p>
                  </div>
                </div>
              </div>
            </div>
          </div><!-- End Card Item -->

          <div class="col-lg-6" data-aos="fade-up" data-aos-delay="400">
            <div class="card-item">
              <div class="row">
                <div class="col-xl-5">
                  <div class="card-bg"><img src="/img/constructions-4.jpg" alt=""></div>
                </div>
                <div class="col-xl-7 d-flex align-items-center">
                  <div class="card-body">
                    <h4 class="card-title">Expedita voluptas ut ut nesciunt</h4>
                    <p>Aut est quidem doloremque voluptatem magnam quis excepturi vero quia. Eum eos doloremque architecto illo at beatae dolore. Fugiat suscipit et sint ratione dolores. Aut aliquid ea dolores libero nobis.</p>
                  </div>
                </div>
              </div>
            </div>
          </div><!-- End Card Item -->

        </div>

      </div>

    </section>
    <!-- /Constructions Section --> --}}

    <!-- Services Section -->
    <section id="services" class=" section white-background">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Our Products</h2>
        {{-- <p>We can support you with this product </p> --}}
      </div><!-- End Section Title -->

      <div class="container">

        <div class="row gy-5">

          @foreach($products as $product)

          <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="200">
            <div class="service-item position-relative">
              <div class="d-flex justify-content-center">
                <img src="/storage/{{ $product->image }}" class="img-fluid center" >
              </div>
              <br>
              <h3 class="text-center">{{ $product->name }}</h3>
             
              <a href="https://{{ $product->link }}" class="readmore stretched-link"> </a>
            </div>
          </div><!-- End Service Item -->
@endforeach
         

        </div>

      </div>

    </section><!-- /Services Section -->
{{-- 
    <!-- Alt Services Section -->
    <section id="alt-services" class="alt-services section">

      <div class="container">

        <div class="row justify-content-around gy-4">
          <div class="features-image col-lg-6" data-aos="fade-up" data-aos-delay="100"><img src="/img/alt-services.jpg" alt=""></div>

          <div class="col-lg-5 d-flex flex-column justify-content-center" data-aos="fade-up" data-aos-delay="200">
            <h3>Enim quis est voluptatibus aliquid consequatur fugiat</h3>
            <p>Esse voluptas cumque vel exercitationem. Reiciendis est hic accusamus. Non ipsam et sed minima temporibus laudantium. Soluta voluptate sed facere corporis dolores excepturi</p>

            <div class="icon-box d-flex position-relative" data-aos="fade-up" data-aos-delay="300">
              <i class="bi bi-easel flex-shrink-0"></i>
              <div>
                <h4><a href="" class="stretched-link">Lorem Ipsum</a></h4>
                <p>Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident</p>
              </div>
            </div><!-- End Icon Box -->

            <div class="icon-box d-flex position-relative" data-aos="fade-up" data-aos-delay="400">
              <i class="bi bi-patch-check flex-shrink-0"></i>
              <div>
                <h4><a href="" class="stretched-link">Nemo Enim</a></h4>
                <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque</p>
              </div>
            </div><!-- End Icon Box -->

            <div class="icon-box d-flex position-relative" data-aos="fade-up" data-aos-delay="500">
              <i class="bi bi-brightness-high flex-shrink-0"></i>
              <div>
                <h4><a href="" class="stretched-link">Dine Pad</a></h4>
                <p>Explicabo est voluptatum asperiores consequatur magnam. Et veritatis odit. Sunt aut deserunt minus aut eligendi omnis</p>
              </div>
            </div><!-- End Icon Box -->

            <div class="icon-box d-flex position-relative" data-aos="fade-up" data-aos-delay="600">
              <i class="bi bi-brightness-high flex-shrink-0"></i>
              <div>
                <h4><a href="" class="stretched-link">Tride clov</a></h4>
                <p>Est voluptatem labore deleniti quis a delectus et. Saepe dolorem libero sit non aspernatur odit amet. Et eligendi</p>
              </div>
            </div><!-- End Icon Box -->

          </div>
        </div>

      </div>

    </section><!-- /Alt Services Section --> --}}

    <!-- Features Section -->
    <section id="features" class="features section">
      <div class="container section-title" data-aos="fade-up">
        <h2>Our Services</h2>
        {{-- <p>We can support you with this product </p> --}}
      </div><!-- End Section Title -->
      <div class="container">
        <div class="justify-content-center">
        <ul class="nav nav-tabs row  g-2 d-flex justify-content-center" data-aos="fade-up" data-aos-delay="100" role="tablist">
          
          <li class="nav-item col-2" role="presentation">
            <a class="nav-link active show" data-bs-toggle="tab" data-bs-target="#features-tab-{{ $services[0]->id }}" aria-selected="true" role="tab">
              <h4>{{ $services[0]->name }}</h4>
            </a>
          </li><!-- End tab nav item -->
     
          @foreach($services->skip(1) as $service)
          <li class="nav-item col-2" role="presentation">
            <a class="nav-link" data-bs-toggle="tab" data-bs-target="#features-tab-{{ $service->id }}" aria-selected="false" tabindex="-1" role="tab">
              <h4>{{ $service->name }}</h4>
            </a><!-- End tab nav item -->

          </li>
          @endforeach
        

        </ul>
        </div>
      
        <div class="tab-content" data-aos="fade-up" data-aos-delay="200">

          <div class="tab-pane fade active show" id="features-tab-{{ $services[0]->id }}" role="tabpanel">
            <div class="row">
              <div class="col-lg-6 order-2 order-lg-1 mt-3 mt-lg-0 d-flex flex-column justify-content-top">
                <h3>{{ $services[0]->name }}</h3>
                <p class="fst-italic">
                 
                  {!! $services[0]->body !!}
                </p>
                {{-- <ul>
                  <li><i class="bi bi-check2-all"></i> <span>Ullamco laboris nisi ut aliquip ex ea commodo consequat.</span></li>
                  <li><i class="bi bi-check2-all"></i> <span>Duis aute irure dolor in reprehenderit in voluptate velit.</span></li>
                  <li><i class="bi bi-check2-all"></i> <span>Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate trideta storacalaperda mastiro dolore eu fugiat nulla pariatur.</span></li>
                </ul> --}}
              </div>
              <div class="col-lg-6 order-1 order-lg-2 text-center">
                <img src="/storage/{{ $services[0]->image1 }}" alt="" class="img-fluid">
              </div>
            </div>
          </div><!-- End tab content item -->
          @foreach($services->skip(1) as $service)
          <div class="tab-pane fade" id="features-tab-{{ $service->id }}" role="tabpanel">
            <div class="row">
              <div class="col-lg-6 order-2 order-lg-1 mt-3 mt-lg-0 d-flex flex-column justify-content-top">
                <h3>{{ $service->name }}</h3>
                <p class="fst-italic">
                  {!! $service->body !!}
                </p>
                {{-- <ul>
                  <li><i class="bi bi-check2-all"></i> <span>Ullamco laboris nisi ut aliquip ex ea commodo consequat.</span></li>
                  <li><i class="bi bi-check2-all"></i> <span>Duis aute irure dolor in reprehenderit in voluptate velit.</span></li>
                  <li><i class="bi bi-check2-all"></i> <span>Provident mollitia neque rerum asperiores dolores quos qui a. Ipsum neque dolor voluptate nisi sed.</span></li>
                  <li><i class="bi bi-check2-all"></i> <span>Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate trideta storacalaperda mastiro dolore eu fugiat nulla pariatur.</span></li>
                </ul> --}}
              </div>
              <div class="col-lg-6 order-1 order-lg-2 text-center">
                <img src="/storage/{{ $service->image1 }}" alt="" class="img-fluid">
              </div>
            </div>
          </div><!-- End tab content item -->
          @endforeach
         

        </div>

      </div>

    </section><!-- /Features Section -->
    
    {{-- <!-- Projects Section -->
    <section id="projects" class="projects section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Projects</h2>
        <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p>
      </div><!-- End Section Title -->

      <div class="container">

        <div class="isotope-layout" data-default-filter="*" data-layout="masonry" data-sort="original-order">

          <ul class="portfolio-filters isotope-filters" data-aos="fade-up" data-aos-delay="100">
            <li data-filter="*" class="filter-active">All</li>
            @foreach ($categories as $category)
            <li data-filter=".filter-{{ $category->name }}">{{ $category->name }}</li>
            @endforeach
            <li data-filter=".filter-construction">Construction</li>
            <li data-filter=".filter-repairs">Repairs</li>
            <li data-filter=".filter-design">Design</li>
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
                  <a href="project-details.html" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a>
                </div>
              </div>
            </div><!-- End Portfolio Item -->
            @endforeach
           

            <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-repairs">
              <div class="portfolio-content h-100">
                <img src="/img/projects/repairs-3.jpg" class="img-fluid" alt="">
                <div class="portfolio-info">
                  <h4>Branding 3</h4>
                  <p>Lorem ipsum, dolor sit amet consectetur</p>
                  <a href="/img/projects/repairs-3.jpg" title="Branding 2" data-gallery="portfolio-gallery-branding" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                  <a href="project-details.html" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a>
                </div>
              </div>
            </div><!-- End Portfolio Item -->

            <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-design">
              <div class="portfolio-content h-100">
                <img src="/img/projects/design-3.jpg" class="img-fluid" alt="">
                <div class="portfolio-info">
                  <h4>Books 3</h4>
                  <p>Lorem ipsum, dolor sit amet consectetur</p>
                  <a href="/img/projects/design-3.jpg" title="Branding 3" data-gallery="portfolio-gallery-book" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                  <a href="project-details.html" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a>
                </div>
              </div>
            </div><!-- End Portfolio Item -->

          </div><!-- End Portfolio Container -->

        </div>

      </div>

    </section><!-- /Projects Section --> --}}

    <!-- Testimonials Section -->
    <section id="testimonials" class="testimonials section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>OUR CLIENT</h2>
        <p>Here are some clients who have worked with us. We are committed to providing the best service to all our clients.</p>
      </div><!-- End Section Title -->

      <div class="container" data-aos="fade-up" data-aos-delay="100">
        @include('layouts.slider')
      
      </div>

    </section><!-- /Testimonials Section -->



    <!-- Recent Blog Posts Section -->
    <section id="recent-blog-posts" class="recent-blog-posts section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Recent Blog Posts</h2>
        <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p>
      </div><!-- End Section Title -->

      <div class="container">

        <div class="row gy-5">
        @foreach($post as $post_fe)
          <div class="col-xl-4 col-md-6">
            <div class="post-item position-relative h-100" data-aos="fade-up" data-aos-delay="100">

              <div class="post-img position-relative overflow-hidden">
                <img src="/storage/{{ $post_fe->image }}" class="img-fluid" alt="">
                <span class="post-date">December 12</span>
              </div>

              <div class="post-content d-flex flex-column">


                <h3 class="post-title">{{ $post_fe->title }}</h3>

                <div class="meta d-flex align-items-center">
                  <div class="d-flex align-items-center">
                    <i class="bi bi-person"></i> <span class="ps-2">{{$post_fe->author->username}}</span>
                  </div>
                  <span class="px-3 text-black-50">/</span>
                  <div class="d-flex align-items-center">
                    <i class="bi bi-folder2"></i> <span class="ps-2">{{$post_fe->category->name}}</span>
                  </div>
                </div>

                <hr>

                <a href="/posts/{{ $post_fe->slug }}" class="readmore stretched-link"><span>Read More</span><i class="bi bi-arrow-right"></i></a>

              </div>

            </div>
          </div><!-- End post item -->
          @endforeach

          {{-- <div class="col-xl-4 col-md-6">
            <div class="post-item position-relative h-100" data-aos="fade-up" data-aos-delay="200">

              <div class="post-img position-relative overflow-hidden">
                <img src="/img/blog/blog-2.jpg" class="img-fluid" alt="">
                <span class="post-date">July 17</span>
              </div>

              <div class="post-content d-flex flex-column">

                <h3 class="post-title">Et repellendus molestiae qui est sed omnis</h3>

                <div class="meta d-flex align-items-center">
                  <div class="d-flex align-items-center">
                    <i class="bi bi-person"></i> <span class="ps-2">Mario Douglas</span>
                  </div>
                  <span class="px-3 text-black-50">/</span>
                  <div class="d-flex align-items-center">
                    <i class="bi bi-folder2"></i> <span class="ps-2">Sports</span>
                  </div>
                </div>

                <hr>

                <a href="blog-details.html" class="readmore stretched-link"><span>Read More</span><i class="bi bi-arrow-right"></i></a>

              </div>

            </div>
          </div><!-- End post item -->

          <div class="col-xl-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
            <div class="post-item position-relative h-100">

              <div class="post-img position-relative overflow-hidden">
                <img src="/img/blog/blog-3.jpg" class="img-fluid" alt="">
                <span class="post-date">September 05</span>
              </div>

              <div class="post-content d-flex flex-column">

                <h3 class="post-title">Quia assumenda est et veritati tirana ploder</h3>

                <div class="meta d-flex align-items-center">
                  <div class="d-flex align-items-center">
                    <i class="bi bi-person"></i> <span class="ps-2">Lisa Hunter</span>
                  </div>
                  <span class="px-3 text-black-50">/</span>
                  <div class="d-flex align-items-center">
                    <i class="bi bi-folder2"></i> <span class="ps-2">Economics</span>
                  </div>
                </div>

                <hr>

                <a href="blog-details.html" class="readmore stretched-link"><span>Read More</span><i class="bi bi-arrow-right"></i></a>

              </div>

            </div>
          </div><!-- End post item --> --}}

        </div>

      </div>

    </section><!-- /Recent Blog Posts Section -->

  </main>

  @endsection