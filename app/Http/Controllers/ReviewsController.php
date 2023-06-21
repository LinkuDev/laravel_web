<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use Session;

use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();
use App\City;
use Mail;
class ReviewsController extends Controller
{
    //
        public function comment(Request $request){
        // $this->AuthLogin();
        
    	$data = array();
    	$data['product_id'] = $request->product_id;
        
    	$data['customer_id'] = $request->customer_id;
    
       $data['user'] = $request->user;
       $data['content'] = $request->content;
       
       
       
       
 
         DB::table('tbl_reviews')->insert($data);

       return redirect()->route('chi-tiet-san-pham', ['product_id' => $data['product_id'] ]);
          
        
        
    	
    }
}
