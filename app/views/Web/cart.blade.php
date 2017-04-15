<div class="wrap-breadcrumb">
    <div class="clearfix container">
        <div class="row main-header">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 pd5  ">
                <ol class="breadcrumb breadcrumb-arrows">
                    <li><a href="{{URL::route('site.home')}}" target="_self">Trang chủ</a></li>
                    <li class="active"><span>Giỏ hàng</span></li>
                </ol>
            </div>
        </div>
    </div>
</div>
<section id="content" class="clearfix container">
    <div class="row">
        <div id="cart" class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <!-- Begin empty cart -->

            <div class="row">
                <div id="layout-page" class="col-md-12 col-sm-12 col-xs-12">
                    <span class="header-page clearfix">
                        <h1>Giỏ hàng</h1>
                    </span>
                    <table>
                        <thead>
                        <tr>
                            <th class="image">&nbsp;</th>
                            <th class="item">Tên sản phẩm</th>
                            <th class="qty">Số lượng</th>
                            <th class="price">Giá tiền</th>
                            <th class="remove">&nbsp;</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($cart as $c)
                        <tr>
                            <td class="image">
                                <div class="product_image">
                                    <a href="{{URL::route('site.detail', array('id' => ))}}">
                                        <img src=" //product.hstatic.net/1000111609/product/img_3804_small.jpg  " alt="Combo tắm + rửa mặt tân niên">

                                    </a>
                                </div>
                            </td>
                            <td class="item">
                                <a href="/products/combo-xong-tam-va-rua-mat-tan-nien">
                                    <strong>Combo tắm + rửa mặt tân niên</strong>

                                    <span class="variant_title">Combo tắm + rửa mặt 4 người</span>

                                </a>
                            </td>
                            <td class="qty">
                                <input size="4" name="updates[]" min="1" id="updates_1009874516" value="2" onfocus="this.select();" class="tc item-quantity" type="number">
                            </td>
                            <td class="price">240,000₫</td>
                            <td class="remove">
                                <a href="/cart/change?line=1&amp;quantity=0" class="cart">Xóa</a>
                            </td>
                        </tr>
                        @endforeach
                        <tr class="summary">
                            <td class="image">&nbsp;</td>
                            <td>&nbsp;</td>
                            <td class="text-center"><b>Tổng cộng:</b></td>
                            <td class="price">
                            <span class="total">
                                <strong>375,000₫</strong>
                            </span>
                            </td>
                            <td>&nbsp;</td>
                        </tr>
                        </tbody>
                    </table>
                    <div class="row">
                        <div class="col-md-6 col-sm-6 col-xs-12 inner-left inner-right">
                            <div class="checkout-buttons clearfix">
                                <label for="note">Ghi chú </label>
                                <textarea id="note" name="note" rows="8" cols="50"></textarea>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12 cart-buttons inner-right inner-left">
                            <div class="buttons clearfix">
                                <button type="submit" id="checkout" class="button-default" name="checkout" value="">Thanh toán</button>
                                <button type="submit" id="update-cart" class="button-default" name="update" value="">Cập nhật</button>
                            </div>
                        </div>
                        <div class="col-md-12 col-sm-12  col-xs-12 continue-shop">

                            <a href="/collections/all">
                                <i class="fa fa-reply"></i> Tiếp tục mua hàng</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>