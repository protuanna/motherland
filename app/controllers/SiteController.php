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

        //$this->layout = View::make('Web._index');
    }


}
