<section id="content" class="clearfix container">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <!-- Content-->
            <div class="main-content">
                <!-- Sản phẩm trang chủ -->


                <div class="product-list clearfix">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <aside class="styled_header  use_icon ">
                                <h2>What hot</h2>

                                <h3>Sản phẩm nổi bật</h3>
                                <span class="icon"><img
                                            src="{{asset('asset/site/image/icon_featured.png')}}"
                                            alt=""></span>

                            </aside>
                        </div>
                    </div>
                    <!--Product loop-->
                    @if($products)
                    <div class="row content-product-list products-resize">
                        @foreach($products as $product)
                        <div class="col-md-3 col-sm-6 col-xs-6 pro-loop">


                            <div class="product-block product-resize fixheight" style="height: 344px;">
                                <div class="product-img image-resize view view-third" style="height: 260px;">
                                    <a href="{{URL::route('site.detail',array('id' => $product['product_id'],'name' => FunctionLib::safe_title($product['product_name'])))}}"
                                       title="{{$product['product_name']}}">
                                        <img class="first-image  has-img" alt="{{$product['product_name']}}"
                                             src="{{Croppa::url(Constant::dir_product.$product['product_avatar'], 260, 260)}}">

                                        <img class="second-image"
                                             src="{{Croppa::url(Constant::dir_product.$product['product_avatar_hover'], 260, 260)}}"
                                             alt="{{$product['product_name']}}">

                                    </a>
                                    <div class="actionss">
                                        <div class="btn-quickview-products">
                                            <a href="javascript:void(0);" class="quickview"><i class="fa fa-eye"></i></a>
                                        </div>
                                    </div>

                                </div>

                                <div class="product-detail clearfix">


                                    <!-- sử dụng pull-left -->
                                    <h3 class="pro-name"><a href="{{URL::route('site.detail',array('id' => $product['product_id'],'name' => FunctionLib::safe_title($product['product_name'])))}}"
                                                            title="{{$product['product_name']}}">{{$product['product_name']}}</a></h3>
                                    <div class="pro-prices">
                                        <p class="pro-price">{{number_format($product['product_price'],0,',',',')}}₫</p>
                                        <p class="pro-price-del text-left"></p>
                                    </div>
                                </div>
                            </div>

                        </div>
                        @endforeach
                    </div>
                </div>
                @endif
                <!--Product loop-->
            </div>
            <!-- end Content-->
        </div>
    </div>
</section>