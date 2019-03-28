<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use DB;

session_start();

class CategoryController extends Controller
{

  public function save_category(Request $request)
  {
    $category_name=ucwords($request->category_name);
    $menu_id=$request->menu_id;

    $old_category_name=DB::table('tbl_category')
                       ->where('category_name',$category_name)
                       ->first();

      if (!$old_category_name || $old_category_name && $menu_id !=$old_category_name->menu_id) {
        DB::table('tbl_category')->insert([
           ['category_name' => $category_name, 'menu_id' => $menu_id]
       ]);

        return redirect('admin/allcategories');

      }else{
        session()->put('category_error','Bu kateqoriya mövcuddur');
        return redirect('admin/addcategory');

      }


  }


  public function delete_category(Request $request)
  {
    $id=$request->category_id_modal_input;

    $result=DB::table('tbl_category')
              ->where('category_id','=',$id)
              ->delete();

      return redirect('admin/allcategories');

  }


  public function edit_category_save(Request $request,$id)
  {
    $category_name=ucwords($request->category_name);
    $menu_id=$request->menu_id;


    DB::table('tbl_category')
            ->where('category_id', $id)
            ->update(['category_name' => $category_name,'menu_id' => $menu_id]);

    return redirect('admin/allcategories');
  }

}
