@extends('admin')

@section('title')
Məhsul
@endsection

@section('stitle')
Məhsullar
@endsection

@section('content')


<!-- Progress Table start -->
<div class="col-12 mt-5">
    <div class="card">
        <div class="card-body">
            <h4 class="header-title">Məhsullar</h4>
            <div class="single-table">
                <div class="table-responsive">
                    <table class="table table-hover progress-table text-center">
                        <thead>
                            <tr>
                                <th scope="col" class="col-md-1 text-center">ID</th>
                                <th scope="col" class="col-md-2 text-center">Adı</th>
                                <th scope="col" class="col-md-1 text-center">Kateqoriyası</th>
                                <th scope="col" class="col-md-1 text-center">Qiyməti</th>
                                <th scope="col" class="col-md-2 text-center">Köhnə Qiyməti</th>
                                <th scope="col" class="col-md-1 text-center">Endirim</th>
                                <th scope="col" class="col-md-1 text-center">Yeniliyi</th>
                                <th scope="col" class="col-md-1 text-center">Şəkili</th>
                                <th scope="col" class="col-md-1 text-center">Aktivliyi</th>
                                <th scope="col" class="col-md-1 text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                         @foreach($products as $product)
                            <tr>
                                <td class="col-md-1 text-center">{{$product->product_id}}</td>
                                <td class="col-md-2 text-center">{{$product->product_name}}</td>
                                <td class="col-md-1 text-center">{{$product->category_name}}</td>
                                <td class="col-md-1 text-center">{{$product->product_price}} AZN</td>
                                <td class="col-md-2 text-center">{{$product->product_old_price}} AZN</td>
                                <td class="col-md-1 text-center">{{$product->product_sale}} %</td>
                                <td class="col-md-1 text-center">{{$product->product_time}}</td>
                                <td class="col-md-1 text-center"><img style="width:40px;height:40px;" src="{{URL::to($product->product_photo)}}" alt="{{$product->product_name}}"></td>
                                <td class="col-md-1 text-center">@if($product->product_active==0)<?php echo "Aktiv";?>@elseif($product->product_active==1)<?php echo "Deaktiv";?>@endif</td>
                                <td class="col-md-1 text-truncate">
                                @if($product->product_active==1)
                                    <a href="{{URL::to('admin/active_product/'.$product->product_id)}}" class="text-secondary" data-toggle="tooltip" data-placement="top" title="Aktiv et"><i class="fa fa-thumbs-up"></i></a>
                                @elseif($product->product_active==0)
                                    <a href="{{URL::to('admin/deactive_product/'.$product->product_id)}}" class="text-secondary" data-toggle="tooltip" data-placement="top" title="Deaktiv et"><i class="fa fa-thumbs-down"></i></a>
                                @endif
                                  <a href="{{URL::to('admin/edit_product/'.$product->product_id)}}" class="text-secondary" data-toggle="tooltip" style="margin-left:10px;" data-placement="top" title="Düzəliş et"><i class="fa fa-edit"></i></a>
                                  <a href="product_id_modal" data-id="{{$product->product_id}}"   data-target="#myModalProduct" class="text-danger" style="margin-left:10px;" data-toggle="modal" data-toggle="tooltip" data-placement="top" title="Sil"><i class="ti-trash"></i></a>
                                </td>
                            </tr>
                          @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Progress Table end -->


<<!-- Modal -->
  <div class="modal fade" id="myModalProduct" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">

          <h4 class="modal-title">Silinmə</h4>
        </div>
        <div class="modal-body">
          <p>Silmək istədiyinizdən əminmisiniz?</p>
        </div>
        <div class="modal-footer">
           <form id="myFormProduct" method="get" action="{{URL::to('admin/delete_product')}}">
            <input type="hidden" id="dataid" name="product_id_modal_input" />
            <div class="col-md-6">
                <button type="submit" id="deleteproduct"  class="btn btn-block btn-danger">Bəli</button>
            </div>
           <div class="col-md-6">
             <button type="button" class="btn btn-block btn-default" data-dismiss="modal">Xeyr</button>
           </div>
          </form>

        </div>
      </div>

    </div>
  </div>



@endsection
