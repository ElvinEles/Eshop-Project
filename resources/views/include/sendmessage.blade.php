@extends('index')

@section('title')
Electro-Message
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
            <h3 class="title">Mesaj Göndərmə</h3>
          </div>
          <form class="" action="{{URL::to('/sendmessage/message')}}" method="post">
            {{ csrf_field() }}
          <div  class="col-md-6">
          <div class="form-group">
            <input class="input" type="email" name="user_email" value="@if(session()->get('user_email')!= null){{session()->get('user_email')}}@endif" placeholder="Email">
          </div>

          <div class="form-group">
              <textarea class="input" name="message_text" placeholder="Mesaj yaz.."></textarea>
          </div>
          </div>
          <div class="col-md-6">
          <button type="submit" class="btn btn-block btn-primary">Göndər</button>
          <button type="reset" class="btn btn-block btn-danger">Təmizlə</button>
          </div>
            </form>
        </div>

      </div>




    </div>
    <!-- /row -->
  </div>
  <!-- /container -->
</div>
<!-- /SECTION -->
@endsection
