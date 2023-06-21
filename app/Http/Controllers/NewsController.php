<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
 use File; 
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();
class NewsController extends Controller
{
	public function add_news(){
        //$this->AuthLogin();
        // $cate_product = DB::table('tbl_category_product')->orderby('category_id','desc')->get(); 
        // $brand_product = DB::table('tbl_brand')->orderby('brand_id','desc')->get(); 
       

        return view('admin.add_news');
    	

    }
    public function save_news(Request $request){
        // $this->AuthLogin();
        
    	$data = array();
    	$data['tittle'] = $request->tittle;
        
    	$data['content'] = $request->content;
    
       

        $get_image = $request->file('image');
       
      
        if($get_image){
            $get_name_image = $get_image->getClientOriginalName();
            
            $name_image = current(explode('.',$get_name_image));
            $new_image =  $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('public/uploads/news',$new_image);
            $data['news_image'] = $new_image;
            DB::table('tbl_news')->insert($data);
            Session::put('message','Thêm tin tức thành công');
            return Redirect::to('add-news');
        }
        else{    
            Session::put('message','Lỗi');
            return Redirect::to('add-news'); 
            
        }
      
    	
    }
        public function news_home(){
        //$this->AuthLogin();
        $cate_product = DB::table('tbl_category_product')->where('category_status','1')->orderby('category_id','desc')->get(); 
        $brand_product = DB::table('tbl_brand')->where('brand_status','1')->orderby('brand_id','desc')->get(); 
        
    	$all_news = DB::table('tbl_news')->get();
    	return view('pages.news.news')->with('news',$all_news)->with('category',$cate_product)->with('brand',$brand_product);
    

    }
}
