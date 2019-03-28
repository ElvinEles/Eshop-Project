@extends('index')

@section('title')
Mənim kabinetim
@endsection

@section('content')

		<!-- SECTION -->
		<div style="margin-bottom:200px;" class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">

					<div class="col-md-12 text-center">
						<!-- Billing Details -->
						<div class="billing-details">
							<div class="section-title">
								<h3 class="title">Şəxsi məlumatlarım</h3>
								<h4 style="color:red;">
									@if(session()->has('user_error'))
									<?php echo session()->get('user_error');
									   session()->forget('user_error');
									?>
									@endif
								</h4>
							</div>
              <form class="" action="{{URL::to('myprofile/update')}}" method="post">
                {{ csrf_field() }}
							<div class="form-group">
								<input class="input" type="text" value="{{$current_user->user_name}}" autocomplete="off" name="user_name" placeholder="Ad">
							</div>
							<div class="form-group">
								<input class="input" type="email" autocomplete="off" value="{{$current_user->user_email}}" name="user_email" placeholder="Email">
							</div>
							<div class="form-group">
								<input class="input" type="password" autocomplete="off" value="{{$current_user->user_password}}" name="user_password" placeholder="Parol">
							</div>
              <div class="form-group">
                <div class="col-md-6">
                  <button class="btn btn-primary btn-block" type="submit">Təsdiqlə</button>
                </div>
                <div class="col-md-6">
                  <button type="reset" class="btn btn-danger btn-block">Təmizlə</button>
                </div>
              </div>
            </form>
						</div>
						<!-- /Billing Details -->
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->
@endsection
