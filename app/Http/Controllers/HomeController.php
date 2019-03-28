<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use DB;

class HomeController extends Controller
{
    public function index()
    {
     $categories_index=Category::all();

      return view('include/home')->with("categories_index",$categories_index);


    }


    public function computer_all_products()
    {
      $categories_index=Category::all();
      return view('include/allcomputers')->with("categories_index",$categories_index);
    }

    public function phones_all_products()
    {
      $categories_index=Category::all();
      return view('include/allphones')->with("categories_index",$categories_index);
    }

    public function cameras_all_products()
    {
      $categories_index=Category::all();
      return view('include/allcameras')->with("categories_index",$categories_index);
    }


    public function accessories_all_products()
    {
      $categories_index=Category::all();
      return view('include/allaccessories')->with("categories_index",$categories_index);
    }

    public function addwish($id)
    {
      if (session()->get('user_id') != null) {

        $result=DB::table('tbl_favorite')->insert([
          ['product_id'=>$id,'user_id'=>session()->get('user_id')]
        ]);

       if ($result) {
         return back();
       }else{

       }

      }else{
        return redirect('/login');
      }



    }


   public function deletewish($id)
   {
     $result=DB::table('tbl_favorite')->where([
       ['product_id','=',$id],['user_id','=',session()->get('user_id')]
     ])->delete();

     if ($result) {
       return back();
     }else{

     }
   }

   public function product_detail_information($id)
   {
       $categories_index=Category::all();

    $product_detail=DB::table('tbl_product')
                   ->join('tbl_category','tbl_category.category_id','=','tbl_product.product_category')
                   ->where('product_id','=',$id)->first();
     return view('include/product_details_information')->with("categories_index",$categories_index)
                                                       ->with('product_detail',$product_detail);
   }

   public function checkemail()
   {
      $categories_index=Category::all();
     if (session()->get('user_email') != null) {

       return view('include/sendmessage')->with("categories_index",$categories_index);
    }else{

      return redirect('/login');
    }
   }

   public function message(Request $request)
   {
      $message=DB::table('tbl_message')->insert([
        ['message_text'=>$request->message_text,'user_email'=>$request->user_email]
      ]);


      if ($message) {
          return redirect('/');
      }else {
          return redirect('/checkemail');
      }
   }

}
