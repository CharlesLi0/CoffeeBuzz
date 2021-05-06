@extends('layouts.menu')
@section('content')
    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>Make payment</h1>
                </div>
            </div>
        </div>
    </div>
    <div class="content mt-3">
        @if(isset($errorMsg))
            <div class="alert alert-danger">{{$errorMsg}}</div>
        @endif          
        <div class="card">
            <div class="card-body card-block">
                <table class="table table-striped table-bordered" style="width:100%">
                   <thead>
                      <tr>
                         <th>Name</th>
                         <th>Price</th>
                         <th>Description</th>
                      </tr>
                   </thead>
                   <tbody>
                      @foreach($order->Products as $product)
                      <tr>
                         <td>{{$product->name}}</td>
                         <td>${{$product->price}}</td>
                         <td>{{$product->description}}</td>
                      </tr>
                      @endforeach
                   </tbody>
                </table>
                <Lable>Total: $<?php $total = 0; foreach($order->Products as $product){ $total += $product->price; } echo $total; ?></Lable>
            </div>
            <div class="card-body card-block">
                <form action="" method="post" class="">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-addon"><i class="fa fa-asterisk"></i></div>
                            <input type="number" name="card-number" min="1000000000000000" max="9999999999999999" placeholder="Card Number" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-addon"><i class="fa fa-asterisk"></i></div>
                            <input type="number" name="css" min="100" max="999" placeholder="CVV" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-addon"><i class="fa fa-asterisk"></i></div>
                            <input type="month" name="expiry-date" placeholder="Expiry Date" class="form-control" required>
                        </div>
                    </div>                                                   
                    <div class="form-actions form-group"><button type="submit" class="btn btn-success btn-sm">Check Out</button></div>
                </form>
            </div>
         </div>
    </div>
@endsection