<footer id="footer">
    <div class="footer-top">
        <div class="container">

        </div>
    </div>

    @foreach ($footerSection as $item)
        
    <div class="container">
        <div class="copyright">
            &copy; Copyright <strong>{{$item->site_name}}</strong>. All Rights Reserved
        </div>
        <div class="credits">
            <!--
    All the links in the footer should remain intact.
    You can delete the links only if you purchased the pro version.
    Licensing information: https://bootstrapmade.com/license/
    Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=Regna
  -->
            Designed by <a href="{{url($item->design_link)}}">{{$item->design_name}}</a>
        </div>
    </div>

    @endforeach
</footer><!-- End Footer -->

<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
        class="bi bi-arrow-up-short"></i></a>

<!-- Vendor JS Files -->
<script src="{{ asset('assets/vendor/purecounter/purecounter_vanilla.js') }}"></script>
<script src="{{ asset('assets/vendor/aos/aos.js') }}"></script>
<script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
<script src="{{ asset('assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
<script src="{{ asset('assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
{{-- <script src="{{ asset('assets/vendor/php-email-form/validate.js') }}"></script> --}}

<!-- Template Main JS File -->
<script src="{{ asset('assets/js/main.js') }}"></script>
