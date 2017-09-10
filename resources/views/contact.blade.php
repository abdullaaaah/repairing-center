@extends('layouts.master')

@section('chat')
<!--Start of Zendesk Chat Script-->
<script type="text/javascript">
window.$zopim||(function(d,s){var z=$zopim=function(c){z._.push(c)},$=z.s=
d.createElement(s),e=d.getElementsByTagName(s)[0];z.set=function(o){z.set.
_.push(o)};z._=[];z.set._=[];$.async=!0;$.setAttribute("charset","utf-8");
$.src="https://v2.zopim.com/?56HqI1aSBCJ9Es9u90peWOyUY5WtIWQ7";z.t=+new Date;$.
type="text/javascript";e.parentNode.insertBefore($,e)})(document,"script");
</script>
<!--End of Zendesk Chat Script-->>
@endsection

@section('content')

<section class="header-section text-center" style="background-image:url('/img/contact.jpg')">
  <div class="container">
    <h2>Contact</h2>
  </div>

</section>


<section class="contact-2" style="padding-bottom:0px;">
  <div class="container">
    <div class="row contact-details">
      <div class="col-sm-12 text-center">
        <p class="lead constrain-width mt-4">Our services are available all over the UK and UAE, below you can find our contact information for both countries.</p>
        <div class="divider"></div>
      </div>

    </div>
  </div>
</section>

<section class="contact-1" style="margin-top:-80px;">
  <div class="container">
    <div class="row contact-details">
      <div class="col-sm-8 text-center text-md-left mb-4">
        <h3>Ask us a question</h3>



        <form class="contact-form mt-4" method="post" action="{{route('send-contact-mail')}}">

          {{csrf_field()}}

          <div class="row">

            <div class="col-md-10">
              <div class="alert alert-warning" style="{{$errors->all() ? '' : 'display:none'}}; margin-top:0px">

                @foreach($errors->all() as $error)
                <p>{{$error}}</p>
                @endforeach

              </div>
            </div>

          </div>

          <div class="row">

            <div class="col-md-10">
              <div class="alert alert-success" style="{{$success ? '' : 'display:none'}}; margin-top:0px">

                Your email has been sent.

              </div>
            </div>

          </div>

          <div class="row">
            <div class="col-md-5">
              <input type="text" class="form-control-custom mb-4" placeholder="Name" value="" name="name" required>
            </div>
            <div class="col-md-5">
              <input type="text" class="form-control-custom mb-4" placeholder="Email Or Phone #" value="" name="email" required>
            </div>
            <br />
          </div>
          <div class="row">
            <div class="col-md-10">
              <textarea class="form-control-custom mb-4" rows="3" name="inquiry" placeholder="Your message" required></textarea><br />
              <button type="submit" class="btn btn-primary btn-lg mb-4">Send Message</button>
            </div>
          </div>
        </form>
      </div>
      <div class="col-sm-4 text-center text-md-left">
        <h3>Contact</h3>
        <h4 class="pt-4">Email</h4>
        <p>info@repairing.center</p>
        <h4 class="pt-2">United Kingdom</h4>

        <p>Cell Exchange Ltd</p>
        <p>
          Kemp House, 160 City Road, London, EC1V 2NX
          <br  />
        </p>

        <h4 style="font-size:12px; margin-top:20px;"><i class="fa fa-phone" aria-hidden="true"></i> Phone</h4>
          <p>
          +44 7427629701<br/>
          +44 7999999876
          </p>

        <h4 class="pt-2">United Arab Emirates</h4>
        <p>MobileRepair.ae <br /><br />
          M6 Building, Al Musallah Road, Diera,<br /> Dubai
        </p>

          <h4 style="font-size:12px; margin-top:20px;"><i class="fa fa-phone" aria-hidden="true"></i> Phone</h4>


          <p>
            +971 565656058
          </p>

        <ul class="social">
          <li><a href="#" title="Facebook" class="fa fa-facebook"></a></li>
          <li><a href="#" title="Twitter" class="fa fa-twitter"></a></li>
          <li><a href="#" title="Google+" class="fa fa-google"></a></li>
          <li><a href="#" title="Dribbble" class="fa fa-dribbble"></a></li>
          <li><a href="#" title="Instagram" class="fa fa-instagram"></a></li>
          <div class="clear"></div>
        </ul>
      </div>
    </div>
  </div>
</section>


@endsection
