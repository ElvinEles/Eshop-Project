<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;
use DB;
use Illuminate\Support\Facades\Input;
use Validator;


class ProductController extends Controller
{

    public function save_product(Request $request)
    {
      $product=new Product();
      $product->product_name=ucwords($request->product_name);
      $product->product_category=$request->product_category;
      $product->product_price=$request->product_price;
      $product->product_old_price=$request->product_old_price;
      $product->product_sale=$request->product_sale;
      $product->product_time=strtoupper($request->product_time);
      $product->product_active=$request->product_active;


     $image=Input::file('product_photo');



       $validator = Validator::make($request->all(), [
           'product_photo' => 'max:2000',
       ]);

       if ($validator->fails()) {
         session()->put('product_error','Şəkilin ölçüsü 2 mb böyükdür');
         return redirect()->back()->withErrors($validator->errors());

       }else{
        if ($image) {
       $image_name=rand(0,10000).$image->getClientOriginalName();
       $destination="images";
       $product->product_photo=$destination."/".$image_name;
       $image->move($destination,$image_name);

     }else {
       $product->product_photo="No Photo";
     }



       if ($request->product_category==0) {
         session()->put('product_error','Kateqoriya seçmədiniz');
         return redirect('admin/addproduct');
       }else{

         $result=$product->save();

      if ($result) {
        return redirect('admin/allproduct');

      }else{
        session()->put('product_error','Məhsul yadda saxlanılmadı');
        return redirect('admin/addproduct');
      }
    }
    }
}
    public function delete_product(Request $request)
    {
      $id=$request->product_id_modal_input;

      $result=DB::table('tbl_product')
                ->where('product_id','=',$id)
                ->delete();

        return redirect('admin/allproduct');

    }


    public function edit_product_save(Request $request,$id)
    {

     $oldproduct=DB::table('tbl_product')->where('product_id','=',$id)->first();

      $product=$oldproduct;
      $product->product_name=ucwords($request->product_name);
      $product->product_category=$request->product_category;
      $product->product_price=$request->product_price;
      $product->product_old_price=$request->product_old_price;
      $product->product_sale=$request->product_sale;
      $product->product_time=strtoupper($request->product_time);
      $product->product_active=$request->product_active;

      $image=Input::file('product_photo');

      if ($image) {
        if ($image->getClientOriginalName() != $oldproduct->product_photo) {
          $image_name=rand(0,10000).$image->getClientOriginalName();
          $destination="images";
          $product->product_photo=$destination."/".$image_name;
          $image->move($destination,$image_name);
        }else {
          $product->product_photo=$oldproduct->product_photo;
        }
      }else {
        $product->product_photo=$oldproduct->product_photo;
      }



        if ($request->product_category==0) {
          session()->put('product_error','Kateqoriya seçmədiniz');
          return back();
        }else{

          $result=DB::table('tbl_product')->where('product_id','=',$id)->update([
            'product_name'=>$product->product_name,
            'product_category'=>$product->product_category,
            'product_price'=>$product->product_price,
            'product_old_price'=>$product->product_old_price,
            'product_sale'=>$product->product_sale,
            'product_time'=>strtoupper($product->product_time),
            'product_active'=>$product->product_active,
            'product_photo'=>$product->product_photo
          ]);



       if ($result) {
         return redirect('admin/allproduct');

       }else{
         session()->put('product_error','Məhsul yadda saxlanılmadı');
         return redirect('admin/allproduct');
       }

    }

     return redirect('admin/allproduct');
  }

  public function save_product_newcollection(Request $request)
  {
    $result=DB::table('tbl_newcollection')
            ->where('newcollection_id','=',1)
            ->update([
              'newcollection_product_id'=>$request->newcollection_product_id,
              'newcollection_day'=>$request->newcollection_day,
              'newcollection_hour'=>$request->newcollection_hour,
              'newcollection_minute'=>$request->newcollection_minute,
              'newcollection_second'=>$request->newcollection_second,
              'newcollection_tema'=>$request->newcollection_tema,

            ]);

            if ($result) {

              return back();
            }else{
              session()->put('newcollection_product_error','Düzəliş olunmadı');
              return back();
            }
  }

  public function active_product($id)
  {
    DB::table('tbl_product')->where('product_id','=',$id)
                            ->update(['product_active'=>0]);
      return back();
  }

  public function deactive_product($id)
  {
    DB::table('tbl_product')->where('product_id','=',$id)
                            ->update(['product_active'=>1]);
          return back();    
  }


}
