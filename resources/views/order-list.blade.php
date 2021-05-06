@extends('layouts.menu')
@section('css')
@endsection

@section('content')
<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Order List</h1>
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
                        <strong class="card-title">Your orders</strong>
                    </div>
                    <div class="card-body">
                         <table id="order-list" class="table table-striped table-bordered" style="width:100%">
                               <thead>
                                  <tr>
                                     <th>Id</th>
                                     <th>Price</th>
                                     <th>Status</th>
                                     <th>Actions</th>
                                  </tr>
                               </thead>
                               <tbody>
                                  @foreach($orders as $order)
                                    @if($order->customer_id == Session::get('customer')[0]->id)
                                      <tr>
                                         <td>{{$order->id}}</td>
                                         <td>
                                             $<?php 
                                                $total = 0;
                                                foreach($order->Products as $product){
                                                    $total += $product->price;
                                                }
                                                echo $total;
                                             ?>
                                         </td>
                                         <td>{{$order->status}}</td>
                                         <td nowrap>
                                            @if($order->status != "Created")
                                            <a href="{{url('/order/' . $order->id)}}"> Edit </a>
                                            <a href="{{url('/order/cancel/' . $order->id)}}"> Cancel </a>
                                            @endif
                                         </td>
                                      </tr>
                                      @endif
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
    $('#order-list').DataTable();
} );
</script>
@endsection
