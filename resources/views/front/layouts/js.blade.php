<script src="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/js/iziToast.min.js"></script>
    @if (Session::has('success'))
        <script>
            iziToast.success({
                //title: 'Success',
                message: "{{ Session::get('success') }}",
                position: 'topRight',
                timeout: 4000,
                displayMode: 0,
                color: 'green',
                theme: 'light',
                messageColor: 'black',
            });
        </script>
    @endif
    @if ($errors->any())
      @foreach ($errors->all() as $error)
        <script>
            iziToast.warning({
                message: "{{ $error }}",
                position: 'topRight',
                timeout: 4000,
                displayMode: 0,
                color: 'orange',
                theme: 'light',
                messageColor: 'black',
            });
        </script>
      @endforeach
    @endif
    @if(Session::has('error'))
			<script>
				iziToast.warning({
				//title: 'Success',
				message: "{{ Session::get('error') }}",
				position: 'topRight',
				timeout: 4000,
				displayMode: 0,
				color: 'orange',
				theme: 'light',
				messageColor: 'black',
				});
			</script>
		@endif
<script src="{{asset('assets/js/vendor/jquery-3.6.0.min.js')}}"></script>

    <!-- Slick Slider -->

    <script src="assets/js/slick.min.js"></script>

    <!-- Bootstrap -->

    <script src="assets/js/bootstrap.min.js"></script>

    <!-- Magnific Popup -->

    <script src="assets/js/jquery.magnific-popup.min.js"></script>

    <!-- jquery Ui -->

    <script src="{{asset('assets/js/jquery-ui.min.js')}}"></script>

    <!-- Circle Progress -->

    <script src="assets/js/circle-progress.min.js"></script>

    <!-- isotope -->

    <script src="assets/js/imagesLoaded.js"></script>

    <script src="{{asset('assets/js/isotope.js')}}"></script>

    <!-- Wow.js -->

    <script src="{{asset('assets/js/wow.min.js')}}"></script>

    <!-- Main Js File -->

    <script src="{{asset('assets/js/main.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.5.1/js/swiper.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <script>
      // HERO SLIDER
      var menu = [];
      jQuery(".swiper-slide").each(function (index) {
        menu.push(jQuery(this).find(".slide-inner").attr("data-text"));
      });
      var interleaveOffset = 0.5;
      var swiperOptions = {
        loop: true,
        speed: 1000,
        parallax: true,
        autoplay: false,
        watchSlidesProgress: true,
        pagination: {
          el: ".swiper-pagination",
          clickable: true,
        },

        navigation: {
          nextEl: ".swiper-button-next",
          prevEl: ".swiper-button-prev",
        },

        on: {
          progress: function () {
            var swiper = this;
            for (var i = 0; i < swiper.slides.length; i++) {
              var slideProgress = swiper.slides[i].progress;
              var innerOffset = swiper.width * interleaveOffset;
              var innerTranslate = slideProgress * innerOffset;
              swiper.slides[i].querySelector(".slide-inner").style.transform =
                "translate3d(" + innerTranslate + "px, 0, 0)";
            }
          },

          touchStart: function () {
            var swiper = this;
            for (var i = 0; i < swiper.slides.length; i++) {
              swiper.slides[i].style.transition = "";
            }
          },

          setTransition: function (speed) {
            var swiper = this;
            for (var i = 0; i < swiper.slides.length; i++) {
              swiper.slides[i].style.transition = speed + "ms";
              swiper.slides[i].querySelector(".slide-inner").style.transition =
                speed + "ms";
            }
          },
        },
      };

      var swiper = new Swiper(".swiper-container", swiperOptions);

      // DATA BACKGROUND IMAGE
      var sliderBgSetting = $(".slide-bg-image");
      sliderBgSetting.each(function (indx) {
        if ($(this).attr("data-background")) {
          $(this).css(
            "background-image",
            "url(" + $(this).data("background") + ")"
          );
        }
      });
    </script>

    {{-- <script>
      $(document).ready(function () {
        $(".js-example-basic-single").select2();
      });
    </script> --}}
    