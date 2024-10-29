<footer id="footer">
    <div class="copyright">
        <div class="container">
            <div class="row">
                <!-- Copyrights -->
                <div class="col-xs-10 col-sm-6 col-md-6"> &copy; 2024 <a
                        href="https://gewissguard.com">gewissguard.com</a>. Gewiss GUARD.
                    <br />
                    <!-- Terms Link -->
                    <a href="#">Minden jog fenntartva</a>
                </div>
                <div class="col-xs-2  col-sm-6 col-md-6 text-right page-scroll gray-bg icons-circle i-3x">
                    <!-- Goto Top -->
                    <a href="#page">
                        <i class="glyphicon glyphicon-arrow-up"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- footer -->
</div>
<!-- page -->
<!-- Scripts -->
<script type="text/javascript" src="{{ asset('js/jquery.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/bootstrap.min.js') }}"></script>
<!-- Menu jQuery plugin -->

<script type="text/javascript" src="{{ asset('js/hover-dropdown-menu.js') }}"></script>
<!-- Menu jQuery Bootstrap Addon -->
<script type="text/javascript" src="{{ asset('js/jquery.hover-dropdown-menu-addon.js') }}"></script>
<!-- Scroll Top Menu -->

<script type="text/javascript" src="{{ asset('js/jquery.easing.1.3.js') }}"></script>
<!-- Sticky Menu -->
<script type="text/javascript" src="{{ asset('js/jquery.sticky.js') }}"></script>
<!-- Bootstrap Validation -->

<script type="text/javascript" src="{{ asset('js/bootstrapValidator.min.js') }}"></script>
<!-- Revolution Slider -->

<script type="text/javascript" src="{{ asset('rs-plugin/js/jquery.themepunch.tools.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('rs-plugin/js/jquery.themepunch.revolution.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/revolution-custom.js') }}"></script>
<!-- Portfolio Filter -->

<script type="text/javascript" src="{{ asset('js/jquery.mixitup.min.js') }}"></script>
<!-- Animations -->

<script type="text/javascript" src="{{ asset('js/jquery.appear.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/effect.js') }}"></script>
<!-- Owl Carousel Slider -->

<script type="text/javascript" src="{{ asset('js/owl.carousel.min.js') }}"></script>
<!-- Pretty Photo Popup -->

<script type="text/javascript" src="{{ asset('js/jquery.prettyPhoto.js') }}"></script>
<!-- Parallax BG -->

<script type="text/javascript" src="{{ asset('js/jquery.parallax-1.1.3.js') }}"></script>
<!-- Fun Factor / Counter -->

<script type="text/javascript" src="{{ asset('js/jquery.countTo.js') }}"></script>
<!-- Twitter Feed -->

<script type="text/javascript" src="{{ asset('js/tweet/carousel.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/tweet/scripts.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/tweet/tweetie.min.js') }}"></script>
<!-- Background Video -->

<script type="text/javascript" src="{{ asset('js/jquery.mb.YTPlayer.js') }}"></script>
<!-- Custom Js Code -->

<script type="text/javascript" src="{{ asset('js/custom.js') }}"></script>

<script type="text/javascript">
    $(document).ready(function () {
        function toggleHeroVisibility() {
            if (window.innerWidth < 1024) {
                $('#hero-desktop').hide();
            } else {
                $('#hero-desktop').show();
            }
        }
        toggleHeroVisibility();
        $(window).resize(toggleHeroVisibility);
    });

    $(document).ready(function () {
        function toggleMenuItemVisibility() {
            if (window.innerWidth < 768) {
                $('#desktop-menu-item').hide();
                $('#mobile-menu-item').show();
                console.log("Mobile view: showing mobile menu, hiding desktop menu.");
            } else {
                $('#mobile-menu-item').hide();
                $('#desktop-menu-item').show();
                console.log("Desktop view: showing desktop menu, hiding mobile menu.");
            }
        }

        // Run on page load
        toggleMenuItemVisibility();

        // Run on window resize
        $(window).resize(toggleMenuItemVisibility);
    });
</script>

<script>
    function openModal() {
        document.getElementById("videoModal").style.display = "flex";
    }

    function closeModal() {
        document.getElementById("videoModal").style.display = "none";
        document.getElementById("videoPlayer").pause();
    }
</script>


</body>

</html>