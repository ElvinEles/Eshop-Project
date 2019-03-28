@extends('admin')

@section('title')
Mesajlar
@endsection

@section('stitle')
Mesaj Göstər
@endsection

@section('content')

<!-- SECTION -->
<div class="section">
  <!-- container -->
  <div class="container">
    <!-- row -->
    <div class="row">

      <div class="col-md-12">
        <!-- Billing Details -->
        <div class="billing-details">
          <div class="section-title">
            <h3 style="margin-top:30px;" class="title">Mesaj Oxumaq</h3>
          </div>
                <div>
          <div>
            <input style="margin-bottom:30px;" class="input form-control" type="email" name="user_email" value="{{$message->user_email}}">
          </div>

          <div>
              <textarea style="margin-bottom:30px;" class="input form-control" name="message_text" >
                {{$message->message_text}}
              </textarea>
          </div>
          </div>
          <div>
          <a href="/admin/message"  class="btn btn-block btn-primary">Mesajlar</a>
          </div>



        </div>

      </div>




    </div>
    <!-- /row -->
  </div>
  <!-- /container -->
</div>
<!-- /SECTION -->
@endsection
