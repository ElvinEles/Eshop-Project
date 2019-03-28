@extends('admin')

@section('title')
Kateqoriya
@endsection

@section('stitle')
Kateqoriya Əlavə et
@endsection

@section('content')

<!-- basic form start -->
<div class="col-12 mt-5">
    <div class="card">
        <div class="card-body">
            <h4 style="color:red;" class="header-title">@if(session()->has('category_error'))<?php echo session()->get('category_error');?>@endif</h4>
            <form method="post" action="{{URL::to('admin/save_category')}}">
            {{ csrf_field() }}
                <div class="form-group">
                    <label for="exampleInputEmail1">Kateqoriya adı*</label>
                    <input type="text" autocomplete="off" class="form-control" name="category_name" id="exampleInputEmail1">
                </div>

                <div class="form-group">
                    <label for="disabledSelect">Kateqoriya menu*</label>
                    <select class="form-control" name="menu_id">
                        <option>Menu seçin</option>
                        @foreach($menus as $menu)
                        <option value="{{$menu->menu_id}}">{{$menu->menu_name}}</option>
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="btn btn-primary btn-block">Əlavə et</button>
            </form>
        </div>
    </div>
</div>
<!-- basic form end -->

@endsection
