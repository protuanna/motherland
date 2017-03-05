<div class="wrap-breadcrumb">
    <div class="clearfix container">
        <div class="row main-header">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 pd5  ">
                <ol class="breadcrumb breadcrumb-arrows">
                    <li><a href="{{URL::route('site.home')}}" target="_self">Trang chủ</a></li>
                    <li class="active"><span>Liên hệ</span></li>
                </ol>
            </div>
        </div>
    </div>

</div>
<section id="content" class="clearfix container">
    <div class="row">
        <div id="page">
            <div class="col-md-12 col-xs-12" id="layout-page">

		<span class="header-contact header-page clearfix">
			<h1>Liên hệ</h1>
		</span>

                <div class="content-contact content-page">

                    <p class="text-center">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3725.218346064011!2d105.81557631487561!3d20.983882894684786!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135acf260f77735%3A0x33a9af50f7713a94!2zTmfDtSAzNTggLSBCw7lpIFjGsMahbmcgVHLhuqFjaCwgS2jGsMahbmcgxJDDrG5oLCBUaGFuaCBYdcOibiwgSMOgIE7hu5lpLCBWaeG7h3QgTmFt!5e0!3m2!1svi!2s!4v1488704911873" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
                    </p>


                    <div class="col-md-7 col-sm-12 col-xs-12 contactFormWrapper" id="col-left ">
                        <h3>Viết nhận xét</h3>
                        <hr class="line-left">
                        <p>
                            Nếu bạn có thắc mắc gì, có thể gửi yêu cầu cho chúng tôi, và chúng tôi sẽ liên lạc lại với bạn sớm nhất có thể .
                        </p>
                        <form accept-charset="UTF-8" action="/lien-he" class="contact-form" method="post">
                            <input name="form_type" value="contact" type="hidden">
                            <input name="utf8" value="✓" type="hidden">




                            <div class="form-group">
                                <label for="contactFormName" class="sr-only">Tên</label>
                                <input required="" id="contactFormName" class="form-control input-lg" name="contact[name]" placeholder="Tên của bạn" autocapitalize="words" value="" type="text">
                            </div>
                            <div class="form-group">
                                <label for="contactFormEmail" class="sr-only">Email</label>
                                <input required="" name="contact[email]" placeholder="Email của bạn" id="contactFormEmail" class="form-control input-lg" autocorrect="off" autocapitalize="off" value="" type="email">
                            </div>
                            <div class="form-group">
                                <label for="contactFormMessage" class="sr-only">Nội dung</label>
                                <textarea required="" rows="6" name="contact[body]" class="form-control" placeholder="Viết bình luận" id="contactFormMessage"></textarea>
                            </div>

                            <input class="btn btn-primary btn-lg btn-rb" value="Gửi liên hệ" type="submit">

                        </form>

                    </div>

                    <div class="col-md-5 sm-12 col-xs-12 " id="col-right">
                        <h3>Chúng tôi ở đây</h3>
                        <hr class="line-right">
                        <h3 class="name-company">MotherLand</h3>
                        <p>	Thuốc quý nước nam</p>
                        <ul class="info-address">
                            <li style="margin-bottom: 8px">
                                <i class="fa fa-home"></i>
                                <span>Số 58, nghách 358/25 Bùi Xương Trạch, Quận Thanh Xuân, Hà Nội</span>
                            </li>
                            <li style="margin-bottom: 8px">
                                <i class="fa fa-envelope-o"></i>
                                <span> vickypham2410@gmail.com</span>
                            </li>
                            <li style="margin-bottom: 8px">
                                <i class="fa fa-phone"></i>
                                <span> 0962.663.252</span>
                            </li>

                        </ul>

                    </div>
                </div>
            </div>

        </div>
    </div></section>