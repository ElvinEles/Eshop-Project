@extends('admin')

@section('title')
Kateqoriya
@endsection

@section('stitle')
Kateqoriyalar
@endsection

@section('content')


<!-- Progress Table start -->
<div class="col-12 mt-5">
    <div class="card">
        <div class="card-body">
            <h4 class="header-title">Kateqoriyalar</h4>
            <div class="container">

            <div class="single-table">
                <div class="table-responsive">
                    <table class="table table-hover progress-table text-center">
                        <thead>
                            <tr>
                                <th scope="col" class="col-md-2 text-center">ID</th>
                                <th scope="col" class="col-md-4 text-center">Kateqoriya</th>
                                <th scope="col" class="col-md-4 text-center">Menu</th>
                                <th scope="col" class="col-md-2 text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                          @foreach($categories as $category)
                            <tr>
                                <td class="col-md-2 text-center">{{$category->category_id}}</td>
                                <td class="col-md-2 text-center">{{$category->category_name}}</td>
                                <td class="col-md-2 text-center">{{$category->menu_name}}</td>

                                <td class="col-md-4 text-truncate">
                                        <a href="{{URL::to('admin/edit_category/'.$category->category_id)}}" class="text-secondary" data-toggle="tooltip" data-placement="top" title="Düzəliş et"><i class="fa fa-edit"></i></a>
                                        <a href="category_id_modal" data-id="{{$category->category_id}}"   data-target="#myModal" class="text-danger" style="margin-left:20px;" data-toggle="modal" data-toggle="tooltip" data-placement="top" title="Sil"><i class="ti-trash"></i></a>


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
  <div class="modal fade" id="myModal" role="dialog">
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
           <form id="myForm" method="get" action="{{URL::to('admin/delete_category')}}">
            <input type="hidden" id="dataid" name="category_id_modal_input" />
            <div class="col-md-6">
                <button type="submit" id="deletecategory"  class="btn btn-block btn-danger">Bəli</button>
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
