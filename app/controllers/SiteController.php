<?php

class SiteController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

    protected $layout = 'Web.init';

    public function __construct()
    {
        $subMenu = Page::getSubMenu();
        $listProduct = Product::getListAll();
        View::share('subMenu',$subMenu);
        View::share('listProduct',$listProduct);
    }

    public function showWelcome()
    {
        return View::make('hello');
    }

    public function home()
    {
        $this->banner();
        $products = Product::getProductHome();
        $this->layout->content = View::make('Web.home')->with('products',$products);
    }

    public function banner(){
        $banner = Banner::getBannerRun();
        $this->layout->banner = View::make('Web.banner')->with('banner',$banner);
    }

    public function detail($id, $name)
    {
        $product = Product::find($id);
        $this->layout->content = View::make('Web.detail')->with('product', $product)->with('id', $id);
    }

    public function paymentMethod(){
        $this->layout->content = View::make('Web.payment_method');
    }

    public function contact(){
        $this->layout->content = View::make('Web.contact');
    }

    public function cart(){
        $cart = Session::has('cart') ? Session::get('cart') : array();
        $this->layout->content = View::make('Web.cart');
    }
}
