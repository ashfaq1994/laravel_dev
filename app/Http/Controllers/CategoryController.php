<?php

namespace App\Http\Controllers;
use App\Product;
use App\category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
	
	$category = new category;
	$category->name =  "Category 1";
	$category->save();

    }


    public function product()
    {
	    $pro = new Product;
		$pro->title =  "pro 1";
		$pro->desc =  "desc 1";
		$pro->save();
    }
}
