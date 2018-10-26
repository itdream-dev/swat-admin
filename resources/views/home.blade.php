@extends('layouts.app')

@section('content')
<section role="main" class="content-body">
  <header class="page-header">
    <h2>Dashboard </h2>
    <span class="ether_unit" style="width:200px; font-size:20px;text-align: center;color:#fff;line-height:50px;position:absolute;left:50%;margin-left:-100px"></span>
    <!-- <span class="btc_unit" style="width:200px; display: none;font-size:20px;color:#fff;line-height:50px;position:absolute;left:60%; margin-left:-75px"></span> -->
  </header>

  <!-- start: page -->
  <div class="row">
    <div class="col-md-12 col-lg-12 col-xl-12">
      <div class="row">
        <div class="col-md-12 col-lg-6 col-xl-4">
          <section class="panel panel-featured-left panel-featured-secondary">
            <div class="panel-body">
              <div class="widget-summary">
                <div class="widget-summary-col widget-summary-col-icon">
                  <div class="summary-icon bg-secondary">
                    <i class="fa fa-users"></i>
                  </div>
                </div>
                <div class="widget-summary-col">
                  <div class="summary">
                    <h4 class="title">Total Devices</h4>
                    <div class="info">
                      <strong class="amount">{{$device_count}}</strong>
                    </div>
                  </div>
                  <div class="summary-footer">

                  </div>
                </div>
              </div>
            </div>
          </section>
        </div>
        <div class="col-md-12 col-lg-6 col-xl-4">
          <section class="panel panel-featured-left panel-featured-secondary">
            <div class="panel-body">
              <div class="widget-summary">
                <div class="widget-summary-col widget-summary-col-icon">
                  <div class="summary-icon bg-secondary">
                    <i class="fa fa-mobile"></i>
                  </div>
                </div>
                <div class="widget-summary-col">
                  <div class="summary">
                    <h4 class="title">Online Devices</h4>
                    <div class="info">
                      <strong class="amount">{{$online_count}}</strong>
                    </div>
                  </div>
                  <div class="summary-footer">

                  </div>
                </div>
              </div>
            </div>
          </section>
        </div>
        <div class="col-md-12 col-lg-6 col-xl-4">
          <section class="panel panel-featured-left panel-featured-secondary">
            <div class="panel-body">
              <div class="widget-summary">
                <div class="widget-summary-col widget-summary-col-icon">
                  <div class="summary-icon bg-secondary">
                    <i class="fa fa-money"></i>
                  </div>
                </div>
                <div class="widget-summary-col">
                  <div class="summary">
                    <h4 class="title">Minting Amount (per minute)</h4>
                    <div class="info">
                      <strong class="amount">{{$minting_speed}} SWAT</strong>
                    </div>
                  </div>
                  <div class="summary-footer">
                    
                  </div>
                </div>
              </div>
            </div>
          </section>
        </div>
      </div>
    </div>
    <!-- end: page -->
  </section>
  <script>
  $(document).ready(function(){
    jQuery.get('https://api.coinmarketcap.com/v1/ticker/ethereum/', function(data, status){
      $('.ether_unit').html('1ETH = $' + parseFloat(data[0].price_usd).toFixed(2));
    });
  });
  </script>
  @endsection
