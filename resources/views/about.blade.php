@extends('layouts.master')

@section('css')
<!--<link href="/css/sticky-footer.css" rel="stylesheet">-->
@endsection

@section('content')

<section class="header-section text-center" style="background-image:url('/img/about.jpg');">
  <div class="container">
    <h2>About</h2>
  </div>

</section>

<section class="content-4" id="about-section-1">
  <div class="container">
    <div class="row justify-center mt-5">
      <div class="col-md-6 pl-5 pr-5 text-center" >
        <img class="mb-4 img-fluid" src="img/placeholder-phone.png" >
      </div>
      <div class="col-md-6 text-left" >
        <h2>The Company</h2>
        <p class="lead mt-4 mb-5">Repairing Center is a chain of stores specialising in immediate repairs of mobile phones, smartphones and tablets.We can thus repair all major brands of mobile phones and tablets: Samsung, Nokia, Sony, Apple, BlackBerry, and deliver to customers a swift, quality and standardised service, regardless of which store you use. </p>

        <div class="row">
          <div class="col-md-6 col-feature mb-4">
            <h4 class="mb-3">Concept</h4>
            <p>Over 82% of our repairs are completed on site in under 40 minutes. All walk in repairs carried out by us on site use only the highest quality parts and are backed by our 12 month warranty.
          </div>
          <div class="col-md-6 col-feature mb-4">
            <h4 class="mb-3">Our know-how</h4>
            <p>In order to deliver a quality service, the tools used by our technicians are state-of-the-art equipment and we only source part from reputable suppliers.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>


@endsection
