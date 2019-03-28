@extends('admin')

@section('title')
Reklam Məhsul
@endsection

@section('stitle')
Reklam Məhsul Əlavə et
@endsection

@section('content')

<!-- basic form start -->
<div class="col-12 mt-5">
    <div class="card">
        <div class="card-body">
            <h4 style="color:red;" class="header-title">@if(session()->has('newcollection_product_error'))<?php
            echo session()->get('newcollection_product_error');
             session()->forget('newcollection_product_error');

            ?>@endif</h4>
            <form method="post" action="{{URL::to('admin/save_product_newcollection')}}">
            {{ csrf_field() }}


            <?php
               $oldproduct=DB::table('tbl_product')->where('product_id','=',$collection->newcollection_product_id)->first();

             ?>

            <div class="form-group">
                <label for="disabledSelect">Məhsul Seçin*</label>
                <select class="form-control" name="newcollection_product_id">
                  <option value="@if($oldproduct !=null){{$oldproduct->product_id}}@endif">@if($oldproduct !=null){{$oldproduct->product_name}}@endif</option>

                  @foreach($products as $product)
                    <option value="{{$product->product_id}}">{{$product->product_name}}</option>
                  @endforeach
                </select>
            </div>


                <div class="form-group col-md-3">
                    <label for="exampleInputEmail1">Reklam gun*</label>
                    <input type="text" autocomplete="off" value="{{$collection->newcollection_day}}" class="form-control" name="newcollection_day" id="exampleInputEmail1">
                </div>

                <div class="form-group col-md-3">
                    <label for="exampleInputEmail1">Reklam saat*</label>
                    <input type="text" autocomplete="off" value="{{$collection->newcollection_hour}}"  class="form-control" name="newcollection_hour" id="exampleInputEmail1">
                </div>


                <div class="form-group col-md-3">
                    <label for="exampleInputEmail1">Reklam dəqiqə*</label>
                    <input type="text" autocomplete="off" value="{{$collection->newcollection_minute}}"  class="form-control" name="newcollection_minute" id="exampleInputEmail1">
                </div>

                <div class="form-group col-md-3">
                    <label for="exampleInputEmail1">Reklam saniyə*</label>
                    <input type="text" autocomplete="off" value="{{$collection->newcollection_second}}"  class="form-control" name="newcollection_second" id="exampleInputEmail1">
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">Reklam mövzu*</label>
                    <input type="text" autocomplete="off" value="{{$collection->newcollection_tema}}"  class="form-control" name="newcollection_tema" id="exampleInputEmail1">
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">Reklam endirim*</label>
                    <input type="text" autocomplete="off" value="{{$collection->newcollection_sale}}"  class="form-control" name="newcollection_sale" id="exampleInputEmail1">
                </div>


                <button type="submit" class="btn btn-primary btn-block">Düzəliş et</button>
            </form>
        </div>
    </div>
</div>
<!-- basic form end -->

@endsection
