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

@section('content')
        <section role="main" class="content-body">
            <header class="page-header">
                <h2>Device management</h2>
                <span class="ether_unit" style="width:200px; font-size:20px;color:#fff;line-height:50px;position:absolute;left:50%; margin-left:-100px"></span>
            </header>
            <div class="panel-body" id="pageDocument">
                <div class="row">
                    <div class="col-sm-9">
                        <div class="mb-md">
                            <a href="/devices/new" id="addToTable" class="btn btn-primary">Add <i class="fa fa-plus"></i></a>
                        </div>
                    </div>
                    <div class="col-sm-3">
                      <form id="search-form" method="GET" action="">
      								<div class="input-group input-search">
      									<input type="text" class="form-control" name="query" id="query" placeholder="Search..." value="{{$search}}">
      									<span class="input-group-btn">
      										<button class="btn btn-default" type="submit"><i class="fa fa-search"></i></button>
      									</span>
      								</div>
                     </form>
      							</div>
                </div>
                <table class="table table-bordered table-striped mb-none" id="datatable-editable">
                    <thead>
                    <tr>
                        <th>Device ID</th>
                        <th>Device IMEI</th>
                        <th>Current Address</th>
                        <th>Minting?</th>
                        <th>Active?</th>
                        <th>Created At</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($devices as $device)
                        <tr id="{{$device->id}}">
                            <td>{{$device->id}}</td>
                            <td>{{$device->phone_imei}}</td>
                            <td>{{$device->current_address}}</td>
                            <td>{{$device->is_miniting? 'YES':'NO'}}</td>
                            <td>{{$device->status? 'YES':'NO'}}</td>
                            <td>{{$device->created_at}}</td>
                            <td class="actions">
                                <a href="/devices/{{$device->id}}" class="on-default edit-row"><i class="fa fa-pencil"></i></a>
                                <a href="#" class="on-default remove-row" onclick="removeDevice({{$device->id}})"><i class="fa fa-trash-o"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{ $devices->links() }}
            </div>
        </section>
    <script>
        function removeDevice(id) {
          res = confirm("Do you really want to delete this item?");
          if (res){
            $.ajax({
              url:'/devices/' + id,
              type:'delete'
            }).then(function(ret){
                console.log(ret);
                location.href = "{{$devices->url($devices->currentPage())}}"
            }, function(err){
                console.log(err);
            })
          }
        }

        $(document).ready(function(){
          jQuery.get('https://api.coinmarketcap.com/v1/ticker/ethereum/', function(data, status){
            $('.ether_unit').html('1ETH = $' + parseFloat(data[0].price_usd).toFixed(2));
          });
        });
    </script>

@endsection
