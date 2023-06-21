<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use Mail;
use Illuminate\Support\Facades\Redirect;
session_start();

class SearchController extends Controller
{
    //
public function tang_dan(Request $request){
        //seo 
        // $meta_desc = "cap nhat..."; 
        // $meta_keywords = "cap nhat";
        // $meta_title = "cap nhat";
        // $url_canonical = $request->url();
        //--seo
        
        $cate_product = DB::table('tbl_category_product')->where('category_status','1')->orderby('category_id','desc')->get(); 
        $brand_product = DB::table('tbl_brand')->where('brand_status','1')->orderby('brand_id','desc')->get(); 

        
        
         $all_product = DB::table('tbl_product')->where('product_status','0')->orderby('product_price')->get();

        return view('pages.sanpham.sort_tang')->with('category',$cate_product)->with('brand',$brand_product)->with('all_product',$all_product); 
    }
    public function giam_dan(){
    	// $all_product = DB::table('tbl_product')->where('product_status','0')->order_by('product_price')->get();

        $cate_product = DB::table('tbl_category_product')->where('category_status','1')->orderby('category_id','desc')->get(); 
        $brand_product = DB::table('tbl_brand')->where('brand_status','1')->orderby('brand_id','desc')->get(); 

        
        
         $all_product = DB::table('tbl_product')->where('product_status','0')->orderby('product_price','desc')->get();

        return view('pages.sanpham.sort_tang')->with('category',$cate_product)->with('brand',$brand_product)->with('all_product',$all_product); 

    }
}
