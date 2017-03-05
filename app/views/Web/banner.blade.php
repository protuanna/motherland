@if(sizeof($banner) > 0)
<!-- Begin slider -->
<div class="slider-default bannerslider">
    <div class="hrv-banner-container">
        <div class="hrvslider">
            <ul class="slides owl-carousel owl-theme">
                @foreach($banner as $ba)
                <li>
                    <a href="javascript:void(0)" class="hrv-url">
                        <img class="img-responsive"
                             src="{{$ba['banner_image']}}"
                             alt="{{$ba['banner_name']}}">
                    </a>
                </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
<!-- End slider -->
<script>
    jQuery(document).ready(function () {
        if ($('.slides li').size() > 0) {
            $(".hrv-banner-container .slides").owlCarousel({
                singleItem: true,
                autoPlay: 5000,
                items: 1,
                itemsDesktop: [1199, 1],
                itemsDesktopSmall: [980, 1],
                itemsTablet: [768, 1],
                itemsMobile: [479, 1],
                slideSpeed: 500,
                paginationSpeed: 500,
                rewindSpeed: 500,
                addClassActive: true,
                navigation: true,
                stopOnHover: true,
                pagination: false,
                scrollPerPage: true,
                afterMove: nextslide,
                afterInit: nextslide,
            });
            function nextslide() {
                $(".hrv-banner-container .owl-item .hrv-banner-caption").css('display', 'none');
                $(".hrv-banner-container .owl-item .hrv-banner-caption").removeClass('hrv-caption')
                $(".hrv-banner-container .owl-item.active .hrv-banner-caption").css('display', 'block');

                var heading = $('.hrv-banner-container .owl-item.active .hrv-banner-caption').clone().removeClass();
                $('.hrv-banner-container .owl-item.active .hrv-banner-caption').remove();
                $('.hrv-banner-container .owl-item.active>li').append(heading);
                $('.hrv-banner-container .owl-item.active>li>div').addClass('hrv-banner-caption hrv-caption');
            }

        }
    })

</script>
@endif