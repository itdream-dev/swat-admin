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
				Device management
			</h2>
			<span class="ether_unit" style="width:200px; font-size:20px;color:#fff;line-height:50px;position:absolute;left:50%; margin-left:-100px"></span>
			<!-- <span class="btc_unit" style="width:200px; font-size:20px;color:#fff;line-height:50px;position:absolute;left:60%; margin-left:-75px"></span> -->
		</header>
		<div class="row">
			<div class="col-lg-12">
				<section class="panel">
					<header class="panel-heading">
						@if($device['id'])
							<h2 class="panel-title">Edit device</h2>
						@else
							<h2 class="panel-title">Add new device</h2>
						@endif
					</header>
					<div class="panel-body">
						@include('common.errors')
						<form id="form" role="form" class="form-horizontal form-bordered" action="{{ Config::get('RELATIVE_URL') }}/device" method="post">
							@if($device['id'])
								<input type="hidden" name="id" value="{{$device->id}}">
							@endif
							<div class="form-group">
								<label class="col-md-3 control-label label-left" for="phone_imei">Device IMEI</label>
								<div class="col-md-6">
									<input type="text" class="form-control" id="phone_imei" name="phone_imei" value="{{$device['phone_imei']}}">
								</div>
							</div>


              <div class="form-group">
								<label class="col-md-3 control-label label-left" for="status">Device Enabled?</label>
								<div class="col-md-6">
									<div class="switch switch-primary">
										<input type="checkbox" id="status" name="status" onchange="ResetStatus()" value='0' data-plugin-ios-switch @if($device['status']) checked="checked" @endif/>
									</div>
								</div>
							</div>


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

			$('#form').submit();
		}

		function ResetStatus(){
			value = document.getElementById('status').checked;
			if (value == true)
			{
				document.getElementById('status').value = 1;
			}
			else
			{
				document.getElementById('status').value = 0;
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
