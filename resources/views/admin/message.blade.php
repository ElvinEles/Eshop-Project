@extends('admin')

@section('title')
Mesajlar
@endsection

@section('stitle')
Mesajlar
@endsection

@section('content')


<!-- Progress Table start -->
<div class="col-md-12">
    <div class="card">
        <div class="card-body">
            <h4 class="header-title">Mesajlar</h4>
            <div class="container">

            <div class="single-table">
                <div class="table-responsive">
                    <table class="table table-hover progress-table text-center">
                        <thead>
                            <tr>
                                <th scope="col" class="col-md-2 text-center">ID</th>
                                <th scope="col" class="col-md-4 text-center">User</th>
                                <th scope="col" class="col-md-4 text-center">Mesaj</th>
                                <th scope="col" class="col-md-2 text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                          @foreach($messages as $message)
                            <tr>
                                <td class="col-md-2 text-center">{{$message->message_id}}</td>
                                <td class="col-md-4 text-center">{{$message->user_email}}</td>
                                <td class="col-md-4 text-center">{{substr($message->message_text,0,15)}}</td>

                                <td class="col-md-2 text-truncate">
                                        <a href="{{URL::to('admin/edit_message/'.$message->message_id)}}" class="text-secondary" data-toggle="tooltip" data-placement="top" title="Cavabla"><i class="fa fa-envelope"></i></a>
                                        <a href="{{URL::to('admin/show_message/'.$message->message_id)}}" class="text-secondary" data-toggle="tooltip" data-placement="top" style="margin-left:20px;" title="Ətraflı"><i class="fa fa-eye"></i></a>
                                        <a href="message_id_modal" data-id="{{$message->message_id}}"   data-target="#myModalMessage" class="text-danger" style="margin-left:20px;" data-toggle="modal" data-toggle="tooltip" data-placement="top" title="Sil"><i class="ti-trash"></i></a>
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
</div>
<!-- Progress Table end -->

<!-- Modal -->
  <div class="modal fade" id="myModalMessage" role="dialog">
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
           <form id="myFormMessage" method="get" action="{{URL::to('admin/delete_message')}}">
            <input type="hidden" id="dataidMessage" name="message_id_modal_input" />
            <div class="col-md-6">
                <button type="submit" id="deletemessage"  class="btn btn-block btn-danger">Bəli</button>
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
