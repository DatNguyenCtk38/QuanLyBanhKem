<?php

namespace App\Http\Controllers;
use App\Product;
use Illuminate\Http\Request;
use DB;
class SanPhamController extends Controller
{
    public function getDanhSachSanPham(){
    	$danhSachSP = DB::table('products')
    	->join('type_products','products.id_type','=','type_products.id')
    	->select('products.*','type_products.catename')->get();
    	//print_r($danhSachSP);
    	//die();
    	return view('admin.sanpham.danhsach',compact('danhSachSP'));
    }
    
}
