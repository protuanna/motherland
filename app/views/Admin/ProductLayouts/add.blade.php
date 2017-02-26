<div class="main-content-inner">
    <div class="breadcrumbs breadcrumbs-fixed" id="breadcrumbs">
        <ul class="breadcrumb">
            <li>
                <i class="ace-icon fa fa-home home-icon"></i>
                <a href="{{URL::route('admin.dashboard')}}">Home</a>
            </li>
            <li><a href="{{URL::route('admin.product_list')}}"> Danh sách sản phẩm</a></li>
            <li class="active">@if($id > 0)Cập nhật thông tin sản phẩm @else Tạo mới thông tin sản phẩm @endif</li>
        </ul><!-- /.breadcrumb -->
    </div>

    <div class="page-content">
        <div class="row">
            <div class="col-xs-12">
                <!-- PAGE CONTENT BEGINS -->
                {{Form::open(array('method' => 'POST', 'role'=>'form','files' => true))}}
                @if(isset($error))
                    <div class="alert alert-danger" role="alert">
                        @foreach($error as $itmError)
                            <p>{{ $itmError }}</p>
                        @endforeach
                    </div>
                @endif
                <div class="form-group col-sm-6">
                    <label for="product_name"><i>Tên sản phẩm</i><span style="color: red"> *</span></label>
                    <input type="text" placeholder="Tên sản phẩm" id="product_name" name="product_name"
                           class="form-control input-sm"
                           value="@if(isset($data['product_Name'])){{$data['product_Name']}}@endif">
                </div>
                <div class="form-group col-sm-3">
                    <label for="product_price"><i>Giá</i></label>
                    <input type="text" class="form-control input-sm" id="product_price" name="product_price" value="@if(isset($data['product_price'])){{number_format($data['product_price'],0,'.','.')}}@endif">
                </div>
                <div class="form-group col-sm-3">
                    <label for="product_status"><i>Hiển thị trên site</i></label>
                    <select name="product_status" id="product_status" class="form-product_status input-sm">
                        <option value="0" @if(isset($data['product_status']) && $data['product_status'] == 0) selected="selected" @endif>Ẩn</option>
                        <option value="1" @if(isset($data['product_status']) && $data['product_status'] == 1) selected="selected" @endif>Hiện</option>
                    </select>
                </div>
                <div class="form-group col-sm-6">
                    <div class="form-group">
                        <label>Ảnh đại diện (Size <= 1mb. Ảnh : png,jpg,jpeg. Tỉ lệ 1:1)</label>
                        <div class="clearfix"></div>
                        <label class="ace-file-input">
                            <input type="file" id="product_avatar" name="product_avatar" accept="image/*">
                            <span data-title="Chọn ảnh đại diện" class="ace-file-container"></span>
                        </label>
                        <div class="clearfix"></div>
                        <div style="width: 156px;height: 190px;padding: 2px;border: 1px solid gainsboro;display: none" class="product_avatar_preview">
                            <img src="" alt="" width="150" height="150">
                            <div class="clearfix"></div>
                            <div class="form-group">
                                <button class="btn btn-sm btn-danger col-sm-12 product_avatar_remove" type="button">
                                    <i class="ace-icon fa fa-remove bigger-110"></i> Hủy
                                </button>
                            </div>
                        </div>
                        @if(isset($data['product_Avatar']) && $data['product_Avatar'] != '')
                            <div style="width: 156px;height: 156px;padding: 2px;border: 1px solid gainsboro" class="product_avatar_old">
                                <img src="{{Croppa::url(Constant::dir_product.$data['product_Avatar'], 150, 150)}}" alt="" width="150" height="150">
                            </div>
                        @endif
                    </div>
                    <div class="clearfix"></div>
                    <div class="form-group">
                        <label>Ảnh sản phẩm (Size <= 1mb. Ảnh : png,jpg,jpeg. Tỉ lệ 1:1)</label>
                        <div class="clearfix"></div>
                        <label class="ace-file-input">
                            <input type="file" id="product_image" name="product_image[]"  accept="image/*" multiple>
                            <span data-title="Chọn ảnh sản phẩm" class="ace-file-container"></span>
                        </label>
                        <button class="btn btn-sm btn-danger product_image_remove pull-right" type="button" style="display: none">
                            <i class="ace-icon fa fa-remove bigger-110"></i> Hủy
                        </button>
                        <div class="clearfix"></div>
                        <div style="width: 100%;display: none;" class="product_image_preview">

                        </div>
                        @if(isset($data['product_Image']) && $data['product_Image'] != '')
                            <div style="width: 100%;" class="product_image_old">
                                <?php $aryImage = json_decode($data['product_Image'],true);?>
                                @foreach($aryImage as $image)
                                        <div style="width: 156px;height: 156px;padding: 2px;margin: 2px;border: 1px solid gainsboro;float: left"><img src="{{Croppa::url(Constant::dir_product.$image, 150, 150)}}" alt="" width="150" height="150"></div>
                                @endforeach
                            </div>
                            {{--<div style="width: 41px;height: 41px;padding: 2px;border: 1px solid gainsboro" class="product_avatar_old">
                                <img src="{{Croppa::url(Constant::dir_product.$param['product_Avatar'], 35, 35)}}" alt="" width="35" height="35">
                            </div>--}}
                        @endif
                    </div>
                </div>
                <div class="form-group col-sm-6">
                    <label for="customers_Description"><i>Mô tả</i></label>
                    <textarea rows="8" class="form-control input-sm" id="product_Description" name="product_Description">@if(isset($data['product_Description'])){{$data['product_Description']}}@endif</textarea>
                </div>
                <!-- PAGE CONTENT ENDS -->
                <div class="form-group col-sm-12 text-right">
                    <button  class="btn btn-primary"><i class="glyphicon glyphicon-floppy-saved"></i> Lưu lại</button>
                </div>
                {{ Form::close() }}
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div><!-- /.page-content -->
</div>
<script>
    $("#product_Price").on('keyup', function (event) {
            Import.fomatNumber('product_Price');
        });
    $("#product_bulk_price").on('keyup', function (event) {
        Import.fomatNumber('product_bulk_price');
    });
    $( "#product_landing_start" ).datepicker({
        showOtherMonths: true,
        selectOtherMonths: false,
        dateFormat: 'dd-mm-yy',
//        numberOfMonths: 2,
        onClose: function(selectedDate) {
            $("#product_landing_end").datepicker("option", "minDate", selectedDate);
            $(this).parents('.sys_time').next().children().find('#product_landing_end').focus();
        }
    });
    $( "#product_landing_end" ).datepicker({
        showOtherMonths: true,
        selectOtherMonths: false,
//        numberOfMonths: 2,
        dateFormat: 'dd-mm-yy'
    });
</script>
{{HTML::script('assets/admin/js/import.js');}}
{{HTML::script('assets/admin/js/product.js');}}