<?php namespace App\Admin\Http\Controllers\Product;


use App\Admin\Http\Controllers\BaseController;
use Illuminate\Http\Request;

class ProductCategoryController extends BaseController
{
    public function index()
    {
        $data = [];
        return view('product.product-category.index',$data);
    }

    public function edit()
    {
        $data = [];
        return view('product.product-category.edit',$data);
    }

    public function getAppends()
    {
        $appends = [];
        return $appends;
    }
}
