@extends('layouts.mainlay')

@section('containers')



<main class="main">

    <!-- Page Title -->
    <div class="page-title dark-background" style="background-image: url(/storage/{{ $about[0]->background }});">
      <div class="container position-relative">
        <h1>Contact</h1>
      </div>
    </div><!-- End Page Title -->

    <!-- Contact Section -->
    <section id="contact" class="contact section">

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row gy-4">

          <div class="col-lg-6">
            <div class="info-item d-flex flex-column justify-content-center align-items-center" data-aos="fade-up" data-aos-delay="200">
              <i class="bi bi-geo-alt"></i>
              <h3>Address</h3>
              <p>{!! $profile[0]->address !!}</p>
            </div>
          </div><!-- End Info Item -->

          <div class="col-lg-3 col-md-6">
            <div class="info-item d-flex flex-column justify-content-center align-items-center" data-aos="fade-up" data-aos-delay="300">
              <i class="bi bi-telephone"></i>
              <h3>Call Us</h3>
              <p>{{ $profile[0]->telp }}</p>
            </div>
          </div><!-- End Info Item -->

          <div class="col-lg-3 col-md-6">
            <div class="info-item d-flex flex-column justify-content-center align-items-center" data-aos="fade-up" data-aos-delay="400">
              <i class="bi bi-envelope"></i>
              <h3>Email Us</h3>
              <p>{{ $profile[0]->email_1 }}</p>
            </div>
          </div><!-- End Info Item -->

        </div>

        <div class="row gy-4 mt-1">
            <div class="col-lg-6" data-aos="fade-up" data-aos-delay="300">
                <div class="mapouter"><div class="gmap_canvas"><iframe width="600" height="560" id="gmap_canvas" src="https://maps.google.com/maps?q=pt+karya+energi+indonesia&t=&z=16&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><a href="https://timenowin.net/">online clock</a><br><a href="https://www.alarm-clock.net/"></a><br><style>.mapouter{position: relative;text-align: right;height: 560px;width: 600px;}</style><a href="https://www.mapembed.net">google satellite maps zoom</a><style>.gmap_canvas{overflow: hidden;background: none !important;height: 560px;width: 600px;}</style></div></div>
            </div><!-- End Google Maps -->
            <div class="col-lg-6" data-aos="zoom-out" data-aos-delay="300">
                <form action="forms/quote.php" method="post" class="php-email-form">
                  <h3>Get a quote</h3>
                  <p>If you need any information, Don't be shy to contact Us. We'll be happy to help</p>
                  <div class="row gy-3">
    
                  
    
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

    </section><!-- /Contact Section -->


  </main>

  @endsection