@extends('admin')

@section('title')
Kateqoriya
@endsection

@section('stitle')
Kateqoriya Düzəliş et
@endsection

@section('content')

<!-- basic form start -->
<div class="col-12 mt-5">
    <div class="card">
        <div class="card-body">
            <h4 class="header-title"></h4>
            <form method="post" action="{{URL::to('admin/edit_category_save/'.$category->category_id)}}">
            {{ csrf_field() }}

               <div class="form-group">
                   <label for="exampleInputEmail1">Kateqoriya ID*</label>
                   <input type="text" disabled class="form-control" value="{{$category->category_id}}" name="category_name" id="exampleInputEmail1">
               </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">Kateqoriya adı*</label>
                    <input type="text" class="form-control" value="{{$category->category_name}}" name="category_name" id="exampleInputEmail1">
                </div>

                <?php
                   $menu=DB::table('tbl_menu')->where('menu_id','=',$category->menu_id)->first();

                 ?>


                <div class="form-group">
                    <label for="disabledSelect">Kateqoriya menu*</label>
                    <select class="form-control" name="menu_id">
                        <option value="{{$menu->menu_id}}" selected>{{$menu->menu_name}}</option>
                        <option>-------</option>
                        @foreach($menus as $item)
                          <option value="{{$item->menu_id}}">{{$item->menu_name}}</option>
                        @endforeach

                    </select>
                </div>

                <button type="submit" class="btn btn-primary btn-block">Düzəliş et</button>
            </form>
        </div>
    </div>
</div>
<!-- basic form end -->

@endsection
