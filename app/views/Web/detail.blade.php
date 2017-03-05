<div class="wrap-breadcrumb">
    <div class="clearfix container">
        <div class="row main-header">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 pd5  ">
                <ol class="breadcrumb breadcrumb-arrows">
                    <li><a href="{{URL::route('site.home')}}" target="_self">Trang chủ</a></li>
                    <li class="active"><span>{{$product['product_name']}}</span></li>
                </ol>
            </div>
        </div>
    </div>

</div>
<section id="content" class="clearfix container">
    <div class="row">
        <div id="product" class="content-pages" data-sticky_parent>
            <div class="col-md-3 col-sm-12 col-xs-12  leftsidebar-col" data-sticky_column>
                <div class="group_sidebar">
                    <div  class="list-group navbar-inner ">
                        <div class="mega-left-title btn-navbar title-hidden-sm">
                            <h3 class="sb-title">Sản phẩm khac </h3>
                        </div>
                        <ul class="nav navs sidebar menu" id='cssmenu'>
                            @if(isset($listProduct) && sizeof($listProduct) > 0)
                                @foreach($listProduct as $k => $list)
                                    @if($k != $id)
                                    <li class="item">
                                        <a href="{{URL::route('site.detail',array('id' => $k, 'name' => FunctionLib::safe_title($list)))}}">
                                            <span>{{$list}}</span>
                                        </a>
                                    </li>
                                    @endif
                                @endforeach
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12" data-sticky_column>
                <div  id="wrapper-detail" class="product-page">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                            <div id="surround">
                                <a class="slide-prev slide-nav" href="javascript:">
                                    <i class="fa fa-arrow-circle-o-left fa-2"></i>
                                </a>
                                <a class="slide-next slide-nav" href="javascript:">
                                    <i class="fa fa-arrow-circle-o-right fa-2"></i>
                                </a>
                                <img class="product-image-feature" src="{{Croppa::url(Constant::dir_product.$product['product_avatar_hover'], 400)}}" alt="{{$product['product_name']}}">
                                <div id="sliderproduct" class="">
                                    <ul class="slides" >
                                        <li class="product-thumb">
                                            <a href="javascript:void(0)" data-image="{{Croppa::url(Constant::dir_product.$product['product_avatar'],400)}}" data-zoom-image="//product.hstatic.net/1000111609/product/img_3804_master.jpg">
                                                <img alt="{{$product['product_name']}}" data-image="{{Croppa::url(Constant::dir_product.$product['product_avatar'],400)}}" src="{{Croppa::url(Constant::dir_product.$product['product_avatar'],60,60)}}" >
                                            </a>
                                        </li>
                                        <?php $aryImage = json_decode($product['product_image'],true);?>
                                        @if($aryImage)
                                            @foreach($aryImage as $image)
                                                <li class="product-thumb">
                                                    <a href="javascript:void(0)" data-image="{{Croppa::url(Constant::dir_product.$image,400)}}">
                                                        <img alt="{{$product['product_name']}}" data-image="{{Croppa::url(Constant::dir_product.$image,400)}}" src="{{Croppa::url(Constant::dir_product.$image,60,60)}}" >
                                                    </a>
                                                </li>
                                            @endforeach
                                        @endif
                                    </ul>
                                </div>
                            </div>

                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                            <div class="product-title">
                                <h1>{{$product['product_name']}}</h1>
                                <span id="pro_sku"></span>
                            </div>
                            <div class="product-price" id="price-preview">
                                <span>{{number_format($product['product_price'],0,',',',')}}₫</span>
                            </div>
                            <div class="select-wrapper ">
                                <label>Số lượng</label>
                                <input id="quantity" type="number" name="quantity" min="1" value="1" class="tc item-quantity" />
                            </div>
                            <div class="row">
                                <div class="col-lg-6 col-md-12 col-sm-6 col-xs-12">
                                    <button id="add-to-cart"   class=" btn-detail btn-color-add btn-min-width btn-mgt addtocart-modal sys_add_cart" name="add">
                                        Thêm vào giỏ
                                    </button>
                                </div>

                                <div class="col-lg-6 col-md-12 col-sm-6 col-xs-12">
                                    <button id="buy-now"  class=" btn-detail btn-color-buy btn-min-width btn-mgt">
                                        Mua ngay
                                    </button>
                                </div>

                            </div>


                            <div class="pt20">
                                <!-- Begin tags -->


                                <!-- End tags -->
                            </div>


                            <div class="pt20">
                                <!-- Begin social icons -->
                                <div class="addthis_toolbox addthis_default_style ">

                                    <div class="info-socials-article clearfix">
                                        <div class="box-like-socials-article">
                                            <div class="fb-send" data-href="{{URL::current()}}">
                                            </div>
                                        </div>
                                        <div class="box-like-socials-article">
                                            <div class="fb-like" data-href="{{URL::current()}}" data-layout="button_count" data-action="like">
                                            </div>
                                        </div>
                                        <div class="box-like-socials-article">
                                            <div class="fb-share-button" data-href="{{URL::current()}}" data-layout="button_count">
                                            </div>
                                        </div>
                                    </div>


                                </div>
                                <!-- End social icons -->
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top:20px;">
                            <div role="tabpanel" class="product-comment">
                                <!-- Nav tabs -->
                                <ul class="nav visible-lg visible-md" role="tablist">
                                    <li role="presentation" class="active"><a data-spy="scroll" data-target="#mota" href="#mota" aria-controls="mota" role="tab">Mô tả sản phẩm</a></li>
                                    <li role="presentation">
                                        <a data-spy="scroll" href="#binhluan" aria-controls="binhluan" role="tab">Bình luận</a>
                                    </li>

                                </ul>
                                <!-- Tab panes -->

                                <div id="mota">

                                    <div class="title-bl visible-xs visible-sm">
                                        <h2>Mô tả</h2>
                                    </div>

                                    <div class="product-description-wrapper">
                                        {{htmlspecialchars_decode($product['product_content'])}}
                                    </div>
                                </div>

                                <div id="binhluan">
                                    <div class="title-bl">
                                        <h2>Bình luận</h2>
                                    </div>
                                    <div class="product-comment-fb">
                                        <div class="fb-comments" data-href="{{URL::current()}}" data-numposts="5" data-width="100%"></div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
        <script>
            /*anh*/
            $(".product-thumb img").click(function(){
                $(".product-thumb").removeClass('active');
                $(this).parents('li').addClass('active');
                $(".product-image-feature").attr("src",$(this).attr("data-image"));
                $(".product-image-feature").attr("data-zoom-image",$(this).attr("data-zoom-image"));
            });
            $(".product-thumb").first().addClass('active');
            /*tab*/
            $(document).ready(function(){
                $('a[data-spy=scroll]').click(function(){
                    event.preventDefault() ;
                    $('body').animate({scrollTop: ($($(this).attr('href')).offset().top - 20) + 'px'}, 500);
                })
            });
        </script>
        <script>
            $(document).ready(function(){
                if($(".slides .product-thumb").length>4){
                    $('#sliderproduct').flexslider({
                        animation: "slide",
                        controlNav: false,
                        animationLoop: false,
                        slideshow: false,
                        itemWidth:95,
                        itemMargin: 10,
                    });
                }
                jQuery('.slide-next').click(function(){
                    if($(".product-thumb.active").prev().length>0){
                        $(".product-thumb.active").prev().find('img').click();
                    }
                    else{
                        $(".product-thumb:last img").click();
                    }
                });
                jQuery('.slide-prev').click(function(){
                    if($(".product-thumb.active").next().length>0){
                        $(".product-thumb.active").next().find('img').click();
                    }
                    else{
                        $(".product-thumb:first img").click();
                    }
                });
            });
        </script>
        <script type="text/javascript">
            $(document).ready(function () {
                $(".sys_add_cart").on('click',function () {
                    cart.addCart(1,1);
                })
            });
        </script>
    </div>
</section>