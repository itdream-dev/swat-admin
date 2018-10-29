@extends('layouts.app')

@section('content')
<style>
.userinfolabel {
  font-size:20px;
}
</style>
<section role="main" class="content-body">
  <header class="page-header">
    <h2>Settings</h2>
    <span class="ether_unit" style="width:200px; font-size:20px;color:#fff;line-height:50px;position:absolute;left:50%; margin-left:-100px"></span>
  </header>

  <!-- start: page -->
  <div class="row">
    <section class="panel">
      <header class="panel-heading">
        <h2 class="panel-title">Settings</h2>
      </header>
      <div class="panel-body">
        @include('common.errors')
						<form id="settingForm" role="form" class="form-horizontal form-bordered" action="/setting" method="post">
              @if ($message = Session::get('success'))
              <div id="save-result-div" class="row" style="z-index:2; text-align: center; left: 30%; position: relative;border-radius:8px; width:35%; height:60px; background-color:#dff0d8; margin-bottom:20px">
										<div class="col-md-11" style="padding-top:15px; text-align:center; ">
											<span style="font-weight:bold; font-size:16px; color:#3c763d;">Settings has been successfully saved.</span>
										</div>
										<div class="col-md-1" style="padding-top:15px;float:right">
											<i aria-hidden="true" class="fa fa-close" onclick="closeSave(event)" style="float:right;"></i>
									  </div>
							</div>
              @endif
							<div class="form-group">
								<label class="col-md-3 control-label label-left" for="minting_amount_per_min">Minting Amount Per Minute<span class="required">*</span></label>
								<div class="col-md-6">
									<input type="text" class="form-control" id="minting_amount_per_min" name="minting_amount_per_min" value="{{isset($settings['minting_amount_per_min'])? $settings["minting_amount_per_min"]:''}}" required>
								</div>
							</div>

							<!-- <div class="form-group">
								<label class="col-md-3 control-label label-left" for="minting_private_key">Minter Private Key<span class="required">*</span></label>
								<div class="col-md-6">
									<input type="text" class="form-control" id="minting_private_key" name="minting_private_key" value="{{isset($settings['minting_private_key'])? $settings["minting_private_key"]:''}}" required>
								</div>
							</div> -->

              <div class="form-group">
                <label class="col-md-3 control-label label-left" for="mining_time_period">Minting Time period (minutes)<span class="required">*</span></label>
                <div class="col-md-6">
                  <input type="text" class="form-control" id="mining_time_period" name="mining_time_period" value="{{isset($settings['mining_time_period'])? $settings["mining_time_period"]:''}}" required>
                </div>
              </div>

              <div class="form-group">
                <label class="col-md-3 control-label label-left" for="minting_min_value">Minting Min Value (SWAT per once)<span class="required">*</span></label>
                <div class="col-md-6">
                  <input type="text" class="form-control" id="minting_min_value" name="minting_min_value" value="{{isset($settings['minting_min_value'])? $settings["minting_min_value"]:''}}" required>
                </div>
              </div>

              <div class="form-group">
								<label class="col-md-3 control-label label-left" for="is_test_net">Test Net ?</label>
								<div class="col-md-6">
									<div class="switch switch-primary">
										<input type="checkbox" id="is_test_net" name="is_test_net" onchange="ResetStatus()" value='0' data-plugin-ios-switch  @if(isset($settings['is_test_net']) && $settings['is_test_net']) checked="checked" @endif/>
									</div>
								</div>
							</div>

              <div class="form-group">
                <label class="col-md-3 control-label label-left" for="save"></label>
                <div class="col-md-6">
                  <button type="submit" class="btn btn-primary" style="width:120px">Save</button>
                </div>
              </div>
            </form>
      </div>
    </section>
  </div>
  <!-- end: page -->
</section>
<script>

function ResetStatus(){
  value = document.getElementById('is_test_net').checked;
  if (value == true)
  {
    document.getElementById('is_test_net').value = 1;
  }
  else
  {
    document.getElementById('is_test_net').value = 0;
  }
}

function closeSave(e)
{
   document.getElementById('save-result-div').style.display = 'none';
}

$(document).ready(function(){
  jQuery.get('https://api.coinmarketcap.com/v1/ticker/ethereum/', function(data, status){
    $('.ether_unit').html('1ETH = $' + parseFloat(data[0].price_usd).toFixed(2));
  });
});

</script>
@endsection
