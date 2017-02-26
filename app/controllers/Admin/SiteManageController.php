<?php

/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 6/14/2016
 * Time: 2:44 PM
 */
class SiteManageController extends BaseAdminController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function viewBanner(){
        $data = Banner::all();
        $this->layout->content = View::make('admin.SiteManageLayouts.viewBanner')->with('data',$data);
    }

    public function getAddBanner($id = 0){
        $param = Banner::find($id);
        if($param){
            $param['banner_start_time'] = ($param['banner_start_time'] != '') ? date('d-m-Y',$param['banner_start_time']) : '';
            $param['banner_end_time'] = ($param['banner_end_time'] != '') ? date('d-m-Y',$param['banner_end_time']) : '';
        }
        $this->layout->content = View::make('admin.SiteManageLayouts.addBanner')->with('id',$id)->with('param',$param);
    }

    public function postAddBanner($id = 0){
        $param['banner_name'] = htmlspecialchars(trim(Request::get('banner_name','')));
        $param['banner_url'] = htmlspecialchars(trim(Request::get('banner_url','')));
        $param['banner_type'] = (int)Request::get('banner_type',1);
        $param['banner_start_time'] = htmlspecialchars(trim(Request::get('banner_start_time','')));
        $param['banner_end_time'] = htmlspecialchars(trim(Request::get('banner_end_time','')));
        $error = $file = array();
        if ( Input::hasFile('banner_image')) {
            $file = Input::file('banner_image');
            $extension = $file->getClientOriginalExtension();
            $size = $file->getSize();
            if(!in_array($extension,FunctionLib::$array_allow_image) || $size > (2*FunctionLib::$size_image_max)){
                $error[] = 'Ảnh  không hợp lệ';
            }
        }else{
            if($id == 0){
                $error[] = 'Chưa nhập file ảnh';
            }
        }
        if($error){
            $this->layout->content = View::make('admin.SiteManageLayouts.addBanner')->with('id',$id)->with('param',$param)->with('error',$error);
        }else{
            $dataSave['banner_name'] = $param['banner_name'];
            $dataSave['banner_url'] = $param['banner_url'];
            $dataSave['banner_type'] = $param['banner_type'];
            $dataSave['banner_start_time'] = ($param['banner_start_time'] != '') ? strtotime($param['banner_start_time']) : 0;
            $dataSave['banner_end_time'] = ($param['banner_end_time'] != '') ? strtotime($param['banner_end_time']) : 0;
            if ($file) {
                $name = time() . '-' . $file->getClientOriginalName();
                $file->move(Constant::dir_banner, $name);
                $dataSave['banner_image'] = $name;
            }
            if(Banner::add($id,$dataSave)){
                return Redirect::route('admin.mngSite_banner_view');
            }else{
                return Redirect::route('admin.mngSite_banner_add',array('id' => $id));
            }
        }
    }

    public function viewPage(){
        $data = Page::all();
        $this->layout->content = View::make('admin.SiteManageLayouts.viewPage')->with('data',$data);
    }

    public function getAddPage($id = 0)
    {
        $param = Page::find($id);
        $this->layout->content = View::make('admin.SiteManageLayouts.addPage')->with('id',$id)->with('param',$param);
    }

    public function postAddPage($id = 0){
        $param['page_content'] = htmlspecialchars(Request::get('page_content',''));
        $param['page_name'] = htmlspecialchars(trim(Request::get('page_name','')));
        $param['page_status'] = (int)Request::get('page_status',0);
        $param['page_type'] = (int)Request::get('page_type',0);
        $error = array();
        if($error){
            $this->layout->content = View::make('admin.SiteManageLayouts.addBanner')->with('id',$id)->with('param',$param)->with('error',$error);
        }else{
            if(Page::add($id,$param)){
                return Redirect::route('admin.mngSite_page_view');
            }else{
                return Redirect::route('admin.mngSite_page_add',array('id' => $id));
            }
        }
    }

}