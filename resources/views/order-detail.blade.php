@extends('layouts.menu')
@section('css')
@endsection

@section('content')
<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Your Order</h1>
            </div>
        </div>
    </div>
</div>
<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Order number : {{$order->id}}</strong>
                        <div style="display: inline;float: right"><a href="{{url('/order/check-out/' . $order->id)}}" class="btn btn-success btn-sm">Check Out</a></div>
                    </div>
                    <div class="card-body" >
                        <table class="table table-striped table-bordered" style="width:100%">
                           <thead>
                              <tr>
                                 <th>Name</th>
                                 <th>Price</th>
                                 <th>Description</th>
                                 <th>Actions</th>
                              </tr>
                           </thead>
                           <tbody>
                              @foreach($order->Products as $product)
                              <tr>
                                 <td>{{$product->name}}</td>
                                 <td>${{$product->price}}</td>
                                 <td>{{$product->description}}</td>
                                 <td nowrap>
                                    <a href="{{url('/order/' . $order->id . '/delete/' . $product->id)}}">Delete
                                    </a>
                                 </td>
                              </tr>
                              @endforeach
                           </tbody>
                        </table>
                        <Lable>Total: $<?php $total = 0; foreach($order->Products as $product){ $total += $product->price; } echo $total; ?></Lable>
                    </div>
                    <div class="card-header">
                        <strong class="card-title">Add more product</strong>
                        <div style="display: inline;float: right"><a href="{{url('/order/cancel/' . $order->id)}}" class="btn btn-success btn-sm">Cancel</a></div>
                    </div>
                    <div class="card-body">
                        <table id="all-products" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                              <tr>
                                 <th>Name</th>
                                 <th>Price</th>
                                 <th>Description</th>
                                 <th>Actions</th>
                              </tr>
                           </thead>
                           <tbody>
                              @foreach($products as $product)
                              <tr>
                                 <td>{{$product->name}}</td>
                                 <td>${{$product->price}}</td>
                                 <td>{{$product->description}}</td>
                                 <td nowrap>
                                    <a href="{{url('/order/' . $order->id . '/add/' . $product->id)}}">Add
                                    </a>
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
@endsection

@section('script')
<script type="text/javascript">
$(document).ready(function() {
    $('#all-products').DataTable();
} );
</script>
@endsection
