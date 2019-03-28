@extends('admin')

@section('title')
Məhsul
@endsection

@section('stitle')
Məhsul Əlavə et
@endsection

@section('content')

<!-- basic form start -->
<div class="col-12 mt-5">
    <div class="card">
        <div class="card-body">
            <h4 style="color:red;" class="header-title">@if(session()->has('product_error'))<?php
            echo session()->get('product_error');
             session()->forget('product_error');

            ?>@endif</h4>
            <form method="post" action="{{URL::to('admin/save_product')}}" enctype="multipart/form-data">
            {{ csrf_field() }}

                <div class="form-group">
                    <label for="exampleInputEmail1">Məhsul adı*</label>
                    <input type="text" autocomplete="off" required class="form-control" name="product_name" id="exampleInputEmail1">
                </div>

                <div class="form-group">
                    <label for="disabledSelect">Məhsul Kateqoriya*</label>
                    <select class="form-control" name="product_category">
                        <option value="0">Kateqoriya seçin</option>
                        @foreach($categories as $category)
                        <option value="{{$category->category_id}}">{{$category->category_name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">Məhsulun yeni qiyməti*</label>
                    <input type="text" required autocomplete="off" class="form-control" name="product_price" id="exampleInputEmail1">
                </div>


                <div class="form-group">
                    <label for="exampleInputEmail1">Məhsulun köhnə qiyməti*</label>
                    <input type="text" required autocomplete="off" value="0" class="form-control" name="product_old_price" id="exampleInputEmail1">
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">Məhsulun endirim*</label>
                    <input type="text" required autocomplete="off" value="0" class="form-control" name="product_sale" id="exampleInputEmail1">
                </div>



                <div class="form-group">
                    <label for="disabledSelect">Məhsulun yeniliyi*</label>
                    <select class="form-control" name="product_time">
                        <option value="0">Normal</option>
                        <option value="1">Yeni</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">Məhsulun şəkili*</label>
                    <input type="file" required autocomplete="off" class="form-control" name="product_photo" id="exampleInputEmail1">
                </div>

                <div class="form-group">
                    <label for="disabledSelect">Məhsul aktivliyi*</label>
                    <select class="form-control" name="product_active">
                        <option value="0">Aktiv</option>
                        <option value="1">Deaktiv</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary btn-block">Əlavə et</button>
            </form>
        </div>
    </div>
</div>
<!-- basic form end -->

@endsection
