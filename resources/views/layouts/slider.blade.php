
<link href="/css/slider.css" rel="stylesheet">





<script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>



 
   <section class="customer-logos slider">
    @foreach($clients as $client)
      <div class="slide"><img src="/storage/{{ $client->client_logo }}"></div>
    @endforeach
   </section>

<script src="/js/slider.js"></script>