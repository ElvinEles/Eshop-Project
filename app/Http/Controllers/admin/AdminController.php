<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Product;
class AdminController extends Controller
{
    public function index()
    {
       return view('admin');
    }

    public function all_categories()
    {
      $categories=DB::table('tbl_category')
                  ->join('tbl_menu', 'tbl_category.menu_id', '=', 'tbl_menu.menu_id')
                  ->select('tbl_category.*','tbl_menu.menu_name')
                  ->get();


       return view('admin.all_categories')->with('categories',$categories);
    }

   public function addcategory()
   {
     $menus=DB::table('tbl_menu')->get();

    return view('admin.add_category')->with('menus',$menus);
    }


  public function edit_category($id)
  {
    $category=DB::table('tbl_category')->where('category_id','=',$id)->first();
    $menus=DB::table('tbl_menu')->get();

    return view('admin.edit_category')->with('category',$category)
                                      ->with('menus',$menus);
  }



  /*PRODUCT*/

  public function addproduct()
  {
    $categories=DB::table('tbl_category')->get();

   return view('admin.add_product')->with('categories',$categories);
  }

  public function allproduct()
  {
    $products=DB::table('tbl_product')
             ->join('tbl_category', 'tbl_category.category_id', '=','tbl_product.product_category')
             ->select('tbl_product.*','tbl_category.category_name')
             ->get();

   return view('admin.allproduct')->with('products',$products);
  }


  public function edit_product($id)
  {
    $product=DB::table('tbl_product')->where('product_id','=',$id)->first();
    $categories=DB::table('tbl_category')->get();

    return view('admin.edit_product')->with('product',$product)
                                      ->with('categories',$categories);
  }

  public function newcollection()
  {
    $products=$product=DB::table('tbl_product')->get();
    $collection=DB::table('tbl_newcollection')->where('newcollection_id','=',1)->first();

    return view('admin.add_newcollection')->with('products',$products)->with('collection',$collection);
  }

  public function message()
  {
    $messages=DB::table('tbl_message')->get();

   return view('admin.message')->with('messages',$messages);
  }


  public function showmessage($id)
  {
    $message=DB::table('tbl_message')->where('message_id','=',$id)->first();
    DB::table('tbl_message')->where('message_id','=',$id)->update(['message_show'=>1]);


    return view('admin.showmessage')->with('message',$message);
  }

  public function delete_message(Request $request)
  {
    $message_id=$request->message_id_modal_input;

    $message_result=DB::table('tbl_message')->where('message_id','=',$message_id)->delete();

    if ($message_result) {
     return redirect('admin/message');
    }
  }

}
