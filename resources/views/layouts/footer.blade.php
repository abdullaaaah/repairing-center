</div> <!-- /container -->

<footer class="footer-3">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <ul class="nav-footer mt-2 mt-md-0 ">
          <li class="nav-item">
            <a class="nav-link" href="{{route('welcome')}}">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('about')}}">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('faq')}}">Terms</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('contact')}}">Contact</a>
          </li>
        </ul>
      </div>
    </div>
  </div>
  <div class="container-fluid">
    <div class="divider"></div>
  </div>
  <div class="container">
    <div class="row">
      <div class="col-md-4 text-center text-md-left mt-2 mb-3 pt-1">
        <p>Copyright &copy; Repair Center. All rights reserved.</p>
        <ul class="social">
          <li><a href="#" title="Facebook" class="fa fa-facebook"></a></li>
          <li><a href="#" title="Twitter" class="fa fa-twitter"></a></li>
          <li><a href="#" title="Instagram" class="fa fa-instagram"></a></li>
          <div class="clear"></div>
        </ul>
      </div>
      <div class="col-md-3 text-center text-md-right mb-4">

      </div>

      <div class="col-md-5 text-center text-md-right mb-4">
        <ul class="social" style="margin-top:20px">
          <img src="/img/paypal-color.png" class="img-responsive" width="150px" style="margin-right:0 auto;"/>
        </ul>
      </div>

    </div>
  </div>
</footer>



<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="/js/jquery-3.2.1.min.js"></script>
<script src="/js/tether.min.js"></script>
<script src="/js/popper.min.js"></script>
<script src="/js/bootstrap.min.js"></script>
<script src="/js/ie10-viewport-bug-workaround.js"></script>
<script src="/js/script.js"></script>

@yield('js')

</body>
</html>
