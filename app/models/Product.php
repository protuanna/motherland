<?php

/**
 * Created by JetBrains PhpStorm.
 * User: Quynhtm
 * Date: 6/21/14
 * Time: 12:37 PM
 * To change this template use File | Settings | File Templates.
 */
class Product extends Eloquent
{
    protected $table = 'product';

    protected $primaryKey = 'product_id';

    public $timestamps = false;

    protected $fillable = array('product_name', 'product_status', 'product_avatar', 'product_avatar_hover', 'product_image', 'product_content','product_price');

    public function importproduct() {
        return $this->hasMany('ImportProduct');
    }

    public function importproductfake() {
        return $this->hasMany('ImportProductFake');
    }

    public static function getByID($id)
    {
        $product = Product::where('product_id', $id)->first();
        return $product;
    }

    public static function getListAll() {
        $product = Product::where('product_id', '>', 0)->where('product_status', 1)->orderBy('product_name')->lists('product_Name','product_id');
        return $product ? $product : array();
    }

    public static function getProductsAll($product_Name ='',$product_Category = 0){
        try{
            $query = Product::where('product_id','>',0);
            if($product_Name != ''){
                $query->where('product_Name', 'LIKE', '%' . $product_Name . '%');
            }
            if($product_Category != 0){
                $query->where('product_Category', '=', $product_Category);
            }
            $total = $query->count();
            $query->orderBy('product_id', 'desc');
            $product = $query->take($total)->get();

            $data = array();
            if($product){
                foreach ($product as $itm) {
                    $data[$itm['product_id']] = array('product_Name'=>$itm['product_Name'],'product_Price'=>$itm['product_Price'],'product_Category'=>$itm['product_Category']);
                }
            }
            return $data;
        } catch (PDOException $e) {
            throw new PDOException();
        }
    }


    public static function getProductsByProductCode($product_Code) {
        $product_Code = Product::where('product_Code','=', $product_Code)->get();
        $data = array();
        foreach($product_Code as $itm) {
            if(isset($itm['product_id'])){
                $data[$itm['product_id']] = $itm['product_Code'];
            }
        }
        return $data;
    }

    public static function searchByCondition($dataSearch = array(), $limit =0, $offset=0, &$total){
        try{
            $query = Product::where('product_id','>',0);
            if (isset($dataSearch['product_name']) && $dataSearch['product_name'] != '') {
                $query->where('product_name', 'LIKE', '%' . $dataSearch['product_name'] . '%');
            }
            if (isset($dataSearch['product_id']) && sizeof($dataSearch['product_id']) > 0) {
                $query->whereIn('product_id', $dataSearch['product_id']);
            }
            $total = $query->count();
            $query->orderBy('product_id', 'desc');
            return $query->take($limit)->skip($offset)->get();

        } catch (PDOException $e) {
            throw new PDOException();
        }
    }


    public static function add($dataInput)
    {
        try {
            DB::connection()->getPdo()->beginTransaction();
            $data = new Product();
            if (is_array($dataInput) && count($dataInput) > 0) {
                foreach ($dataInput as $k => $v) {
                    $data->$k = $v;
                }
            }
            if ($data->save()) {
                DB::connection()->getPdo()->commit();
                return $data->product_id;
            }
            DB::connection()->getPdo()->commit();
            return false;
        } catch (PDOException $e) {
            DB::connection()->getPdo()->rollBack();
            throw new PDOException();
        }
    }


    public static function updData($id, $dataInput)
    {
        try {
            DB::connection()->getPdo()->beginTransaction();
            $dataSave = Product::find($id);
            if (!empty($dataInput)) {
                $dataSave->update($dataInput);
            }
            DB::connection()->getPdo()->commit();
            return true;
        } catch (PDOException $e) {
            DB::connection()->getPdo()->rollBack();
            throw new PDOException();
        }
    }


    public static function delData($id)
    {
        try {
            DB::connection()->getPdo()->beginTransaction();
            $dataSave = Product::find($id);
            $dataSave->delete();
            DB::connection()->getPdo()->commit();
            return true;
        } catch (PDOException $e) {
            DB::connection()->getPdo()->rollBack();
            throw new PDOException();
        }
    }

    public static function getListByName($name)
    {

        $data = Product::where('product_Name', 'LIKE', '%' . $name . '%')->take(30)->get(array('product_id','product_Name','product_Quantity','product_Quantity_Fake','product_Avatar'));
        return $data ? $data : array();
    }

    public static function getByName($name)
    {
        $data = Product::where('product_Name',$name)->first();
        return $data;
    }

    public static function reportProductHot($param){
        $tbl_product = with(new Product())->getTable();
        $tbl_export_product = with(new ExportProduct())->getTable();
        $query = DB::table($tbl_product);
        $query->join($tbl_export_product, $tbl_product . '.product_id', '=', $tbl_export_product . '.product_id');
        $query->where($tbl_export_product . '.export_product_status', 1);
//        if ($param['customers_id'] > 0) {
//            $query->where($tbl_customers . '.customers_id', $param['customers_id']);
//        }
        if ($param['export_product_create_start'] > 0) {
            $query->where($tbl_export_product . '.export_product_create_time', '>=', $param['export_product_create_start']);
        }
        if ($param['export_product_create_end'] > 0) {
            $query->where($tbl_export_product . '.export_product_create_time', '<=', $param['export_product_create_end']);
        }
        $query->select(DB::raw($tbl_product.'.*,SUM('.$tbl_export_product.'.export_product_num) as sum_product'));
        $query->orderBy(DB::raw('SUM('.$tbl_export_product.'.export_product_num)'),'desc');
        $query->groupBy($tbl_export_product.'.product_id');
        $data = $query->get();
        //return DB::getQueryLog();
        return $data;
    }

    public static function getProductStore($param)
    {
        $query = Product::select('*');
        if (isset($param['product_id']) && $param['product_id'] > 0) {
            $query->where('product_id', $param['product_id']);
        }
        $product = $query->get();
        foreach ($product as $pr) {
            $pr->store = $pr->importproduct()->where('import_product_status',1)->orderBy('import_product_create_time', 'DESC')->take(10)->get();
        }
        return $product;
    }

    public static function getProductStoreFake($param)
    {
        $query = Product::select('*');
        if (isset($param['product_id']) && $param['product_id'] > 0) {
            $query->where('product_id', $param['product_id']);
        }
        $product = $query->get();
        foreach ($product as $pr) {
            $pr->store = $pr->importproductfake()->where('import_product_status',1)->orderBy('import_product_create_time', 'DESC')->take(10)->get();
        }
        return $product;
    }

    public static function getProductCate($cid = array(), $orderBy = '', $type = 'DESC', $offset = 0, $limit = 16, &$total)
    {
        try {
            $query = Product::where('product_Status', 1);
            $query->where('product_show_site', 1);
            if ($cid) {
                $query->whereIn('product_Category', $cid);
            }
            $total = $query->count();
            if ($orderBy != '') {
                $query->orderBy($orderBy, $type);
            }
            $data = $query->skip($offset)->take($limit)->get();
            return $data;
        } catch (PDOException $e) {
            throw new PDOException();
        }
    }

    public static function getProductSearch($keyword, $cate_id, $orderBy = '', $type = 'DESC', $offset = 0, $limit = 16, &$total){
        try {
            $query = Product::where('product_Status', 1);
            $query->where('product_show_site', 1);
            $query->where(function($qu) use ($keyword)
            {
                $qu->where('product_Name', 'LIKE', '%' . $keyword . '%')
                    ->orWhere('product_Code', $keyword)
                    ->orWhere('product_CategoryName', 'LIKE', '%' . $keyword . '%')
                    ->orWhere('product_Description', 'LIKE', '%' . $keyword . '%');
            });
            if(sizeof($cate_id) > 0){
                $query->whereIn('product_Category', $cate_id);
            }
            $total = $query->count();
            if ($orderBy != '') {
                $query->orderBy($orderBy, $type);
            }
            $data = $query->skip($offset)->take($limit)->get();
            return $data;
        } catch (PDOException $e) {
            var_dump($e->getMessage());
            throw new PDOException();
        }
    }

    public static function getProductRelate($c_ids,$p_ids){
        try {
            //$product = Product::find($id);
            $query = Product::whereIn('product_Category',$c_ids);
            $query->where('product_Status', 1);
            $query->where('product_show_site', 1);
            $query->whereNotIn('product_id', $p_ids);
            //$query->where('product_NameUnit','LIKE','%'.$product->product_NameUnit.'%');
            return $query->take(8)->get();
        } catch (PDOException $e) {
            throw new PDOException();
        }
    }

    public static function getProductHome(){
        try {
            $query = Product::where('product_status', 1);
            return $query->get();
        } catch (PDOException $e) {
            throw new PDOException();
        }
    }

    public static function getProductByIds($ids)
    {
        try {
            $query = Product::whereIn('product_id', $ids);
            $query->where('product_Status', 1);
            $query->where('product_show_site', 1);
            return $query->get();
        } catch (PDOException $e) {
            throw new PDOException();
        }
    }

    public static function getListCateByIds($ids)
    {
        try {
            $query = Product::whereIn('product_id', $ids);
            $query->where('product_Status', 1);
            $query->where('product_show_site', 1);
            return $query->lists('product_Category');
        } catch (PDOException $e) {
            throw new PDOException();
        }
    }

    public static function getProductKm()
    {
        try {
            $query = Product::where('product_Status', 1);
            $query->where('product_show_site', 1);
            $query->where('product_landing_start', '<=', time());
            $query->where('product_landing_end', '>=', time());
            return $query->get();
        } catch (PDOException $e) {
            throw new PDOException();
        }
    }


}