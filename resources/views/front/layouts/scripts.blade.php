<script src="{!! asset('front/assets/vendors/jquery/jquery-3.6.0.min.js') !!}"></script>
<script src="{!! asset('front/assets/vendors/bootstrap/js/bootstrap.bundle.min.js') !!}"></script>
<script src="{!! asset('front/assets/vendors/jquery-appear/jquery.appear.min.js') !!}"></script>
<script src="{!! asset('front/assets/vendors/jquery-circle-progress/jquery.circle-progress.min.js') !!}"></script>
<script src="{!! asset('front/assets/vendors/jquery-magnific-popup/jquery.magnific-popup.min.js') !!}"></script>
<script src="{!! asset('front/assets/vendors/jquery-validate/jquery.validate.min.js') !!}"></script>
<script src="{!! asset('front/assets/vendors/odometer/odometer.min.js') !!}"></script>
<script src="{!! asset('front/assets/vendors/swiper/swiper.min.js') !!}"></script>
<script src="{!! asset('front/assets/vendors/wow/wow.js') !!}"></script>
<script src="{!! asset('front/assets/vendors/isotope/isotope.js') !!}"></script>
<script src="{!! asset('front/assets/vendors/owl-carousel/owl.carousel.min.js') !!}"></script>
<script src="{!! asset('front/assets/vendors/bootstrap-select/js/bootstrap-select.min.js') !!}"></script>
<script src="{!! asset('front/assets/vendors/nice-select/jquery.nice-select.min.js') !!}"></script>
<script src="{!! asset('front/assets/js/sweetalert2.min.js') !!}"></script>

<!-- template js -->
<script src="{!! asset('front/assets/js/insur.js') !!}"></script>

<script>
    let element = '<div class="icon"><i class="fa fa-check"></i></div>'

    $('.about-one__right li').each(function() {
        $(this).append(element)
    })
    $('.about-four__right li').each(function() {
        $(this).append(element)
    })
</script>
<script>
    $('.js--singleImage').on('click', function() {
        var selectedImage = $(this).find('img').attr('src')
        var currentImage = $('.js--currentImage').find('img').attr('src')

        $('.js--currentImage').find('img').attr('src', selectedImage)
        $(this).find('img').attr('src', currentImage)
    })
</script>

<script>
    $(document).ready(function() {
        @if (session()->has('success'))
            notify("{{ session()->get('success') }}");
        @endif
        cartload();
    });

    function cartload() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            url: "{{ route('loadCart') }}",
            method: "GET",
            success: function(response) {
                var count = response.totalcart;
                $('.cart-count').html(count);
            }
        });
    }

    function notify(msg) {
        Swal.fire({
            position: "top-end",
            icon: "success",
            title: msg,
            showConfirmButton: false,
            timer: 2000,
        });
    }
</script>
