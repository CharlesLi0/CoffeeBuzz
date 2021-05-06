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
                        <strong class="card-title">Order Table</strong>
                    </div>
                    <div class="card-body">
                        <table id="order-table" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Customer</th>
                                    <th>Price</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($orders as $order)
                                <tr>
                                    <td>{{$order->id}}</td>
                                    <td>{{$order->customer->name}}</td>
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
                                    <td>
                                        <a href="{{url('/order/finish/' . $order->id)}}">Finish</a>
                                        <a href="{{url('/order/delete/' . $order->id)}}">Cancel</a>
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
    $('#order-table').DataTable();
} );
</script>
@endsection
