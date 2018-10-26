<?php
/******************************************************
 * IM - Vocabulary Builder
 * Version : 1.0.2
 * Copyright© 2016 Imprevo Ltd. All Rights Reversed.
 * This file may not be redistributed.
 * Author URL:http://imprevo.net
 ******************************************************/
?>

@extends('layouts.app')
<?php
function getDevices($devices){
  $imei_str = 'No Any Allocated Device!';
  if ($devices != NULL && count($devices) > 0){
    $imei_str = '';
    foreach ($devices as $device){
      $imei_str = $imei_str.' '.$device->phone_imei;
    }
  }
  return $imei_str;
}
?>

@section('content')
	<section role="main" class="content-body">

		<header class="page-header">
			<h2>
				User management
			</h2>
			<span class="ether_unit" style="width:200px; font-size:20px;color:#fff;line-height:50px;position:absolute;left:50%; margin-left:-100px"></span>
			<!-- <span class="btc_unit" style="width:200px; font-size:20px;color:#fff;line-height:50px;position:absolute;left:60%; margin-left:-75px"></span> -->
		</header>
		<div class="row">
			<div class="col-lg-12">
				<section class="panel">
					<header class="panel-heading">
						@if($user['id'])
							<h2 class="panel-title">Edit user</h2>
						@else
							<h2 class="panel-title">Add new user</h2>
						@endif
					</header>
					<div class="panel-body">
						@include('common.errors')
						<form id="form" role="form" class="form-horizontal form-bordered" action="{{ Config::get('RELATIVE_URL') }}/user" method="post">
							@if($user['id'])
								<input type="hidden" name="id" value="{{$user->id}}">
							@endif
							<div class="form-group">
								<label class="col-md-3 control-label label-left" for="name">Name</label>
								<div class="col-md-6">
									<input type="text" class="form-control" id="name" name="name" value="{{$user['name']}}">
								</div>
							</div>
							
							<div class="form-group">
								<label class="col-md-3 control-label label-left" for="email">Email address <span class="required">*</span></label>
								<div class="col-md-6">
									<input type="email" class="form-control" id="email" name="email" required value="{{$user['email']}}" @if($user['email'] != '') readonly @endif>
								</div>
							</div>
							@if(!$user['id'])
							<div class="form-group">
								<label class="col-md-3 control-label label-left" for="password">Password<span class="required">*</span></label>
								<div class="col-md-6">
									<input type="password" class="form-control" id="password" name="password" required>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label label-left" for="passwordConfirm">Confirm password<span class="required">*</span></label>
								<div class="col-md-6">
									<input type="password" class="form-control" id="passwordConfirm" name="passwordConfirm" required>
								</div>
							</div>
							@endif


							@if($user['id'])
							<div class="form-group">
								<label class="col-md-3 control-label label-left" for="devices">Device</label>
								<div class="col-md-6">
									<input type="text" class="form-control" id="devices" name="devices" value="{{getDevices($user->devices)}}" disabled>
									<label style="font-weight:bold">You can allocate device to the user on Device management section.</label>
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-3 control-label label-left" for="isResetPassword">Reset password?</label>
								<div class="col-md-6">
									<div class="switch switch-primary">
										<input type="checkbox" id="isResetPassword" name="isResetPassword" onchange="Resetpassword()" value='0' data-plugin-ios-switch />
									</div>
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-3 control-label label-left" for="password">Password<span class="required">*</span></label>
								<div class="col-md-6">
									<input type="password" class="form-control" id="reset_password" name="reset_password" disabled>
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-3 control-label label-left" for="passwordConfirm">Confirm password<span class="required">*</span></label>
								<div class="col-md-6">
									<input type="password" class="form-control" id="reset_password_confirm" name="reset_password_confirm" disabled>
								</div>
							</div>
							@endif

							<div class="form-group">
								<label class="col-md-3 control-label label-left" for="Save"></label>
								<div class="col-md-6">
									<button type="button" class="btn btn-primary" style="width:120px" onclick="Save()">Save</button>
								</div>
							</div>
						</form>
					</div>
				</section>
			</div>
		</div>
	</section>
	<script type="text/javascript">
		$(function(){
			$("#form").validate({
				rules: {
					password: "required",
					passwordConfirm: {
						equalTo: "#password"
					}
				},
				highlight: function( label ) {
					$(label).closest('.form-group').removeClass('has-success').addClass('has-error');
				},
				success: function( label ) {
					$(label).closest('.form-group').removeClass('has-error');
					label.remove();
				},
				errorPlacement: function( error, element ) {
					var placement = element.closest('.input-group');
					if (!placement.get(0)) {
						placement = element;
					}
					if (error.text() !== '') {
						placement.after(error);
					}
				}
			});
		});

		function Save(){
			var isReset = document.getElementById('isResetPassword');

			if (isReset && isReset.checked)
			{
				resetpassword = document.getElementById('reset_password').value;
				reset_password_confirm = document.getElementById('reset_password_confirm').value;

				bvalidation = false;
				if (resetpassword.length > 5 && reset_password_confirm.length > 5)
				{
					if (resetpassword == reset_password_confirm)
					{
						bvalidation = true;
					}
				}
				if (!bvalidation)
				{
					new PNotify({
						text: 'please check reset password fields again. (len > 5, equal)',
						type: 'error',
						icon: false,
						addclass: 'ui-pnotify-no-icon',
					});
					return;
				}
			}
			$('#form').submit();
		}

		function Resetpassword(){
			value = document.getElementById('isResetPassword').checked;
			if (value == true)
			{
				document.getElementById('reset_password').disabled = false;
				document.getElementById('reset_password_confirm').disabled = false;
				document.getElementById('isResetPassword').value = 1;
			}
			else
			{
				document.getElementById('reset_password').disabled = true;
				document.getElementById('reset_password_confirm').disabled = true;
				document.getElementById('isResetPassword').value = 0;
			}
		}

		$(document).ready(function(){
      jQuery.get('https://api.coinmarketcap.com/v1/ticker/ethereum/', function(data, status){
        $('.ether_unit').html('1ETH = $' + parseFloat(data[0].price_usd).toFixed(2));
      });
    });

    // $(document).ready(function(){
    //   jQuery.get('https://api.coinmarketcap.com/v1/ticker/bitcoin/', function(data, status){
    //     $('.btc_unit').html('1BTC = $' + parseFloat(data[0].price_usd).toFixed(2));
    //   });
    // });
	</script>
@endsection
