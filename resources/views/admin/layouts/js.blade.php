

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
<script src="{{asset('admin/assets/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('admin/assets/libs/simplebar/simplebar.min.js')}}"></script>
<script src="{{asset('admin/assets/libs/node-waves/waves.min.js')}}"></script>
<script src="{{asset('admin/assets/libs/feather-icons/feather.min.js')}}"></script>
<script src="{{asset('admin/assets/js/pages/plugins/lord-icon-2.1.0.js')}}"></script>
<script src="{{asset('admin/assets/js/plugins.js')}}"></script>

<!-- apexcharts -->
<script src="{{asset('admin/assets/libs/apexcharts/apexcharts.min.js')}}"></script>

<!-- Vector map-->
<script src="{{asset('admin/assets/libs/jsvectormap/js/jsvectormap.min.js')}}"></script>
<script src="{{asset('admin/assets/libs/jsvectormap/maps/world-merc.js')}}"></script>

<!--Swiper slider js-->
<script src="{{asset('admin/assets/libs/swiper/swiper-bundle.min.js')}}"></script>

<!-- Dashboard init -->
<script src="{{asset('admin/assets/js/pages/dashboard-ecommerce.init.js')}}"></script>

<!-- App js -->
<script src="{{asset('admin/assets/js/app.js')}}"></script>

