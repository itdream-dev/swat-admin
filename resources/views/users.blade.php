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
                <h2>User management</h2>
                <span class="ether_unit" style="width:200px; font-size:20px;color:#fff;line-height:50px;position:absolute;left:50%; margin-left:-100px"></span>
            </header>
            <div class="panel-body" id="pageDocument">
                <div class="row">
                    <div class="col-sm-9">
                        <div class="mb-md">
                            <a href="/users/new" id="addToTable" class="btn btn-primary">Add <i class="fa fa-plus"></i></a>
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
                        <th>Name</th>
                        <th>Email address</th>
                        <th>Device IMEI</th>
                        <th>Joined At</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($users as $user)
                        <tr id="{{$user->id}}">
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{getDevices($user->devices)}}</td>
                            <td>{{$user->created_at}}</td>
                            <td class="actions">
                                <a href="/users/{{$user->id}}" class="on-default edit-row"><i class="fa fa-pencil"></i></a>
                                <a href="#" class="on-default remove-row" onclick="removeUser({{$user->id}})"><i class="fa fa-trash-o"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{ $users->links() }}
            </div>
        </section>
    <script>

        function removeUser(id) {
          res = confirm("Do you really want to delete this item?");
          if (res){
            $.ajax({
              url:'/users/' + id,
              type:'delete'
            }).then(function(ret){
                console.log(ret);
                location.href = "{{$users->url($users->currentPage())}}"
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

        // $(document).ready(function(){
        //   jQuery.get('https://api.coinmarketcap.com/v1/ticker/bitcoin/', function(data, status){
        //     $('.btc_unit').html('1BTC = $' + parseFloat(data[0].price_usd).toFixed(2));
        //   });
        // });
</script>

@endsection
