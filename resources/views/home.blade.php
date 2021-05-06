@extends('layouts.menu')
@section('css')
@endsection

@section('content')
<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Home</h1>
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
                        <strong class="card-title">There are {{count($orders)}} orders now, You may need wating {{count($orders) * 5}} minutes</strong>
                    </div>
                    <div class="card-body">
                         <strong class="card-title">Hi, {{Session::get('customer')[0]['name']}}: </strong>
                         <p></p>
                         <p>Today is {{date('Y-m-d')}}, you have visited Coffee Buzz at {{date('H:i:s')}}.</p>
                         <p>You have ordered {{$history}} times before, we wish you can have a good memory today.</p>
                         <p>Do you wanna try our specail present <strong>{{$product->name}}</strong> today? It just need ${{$product->price}}.</p>
                         <p>There are many customer like it, it has been sold {{$product->sold}} times.</p>
                         <a href="{{url('/order/new')}}" style="color: purple">Have a try?</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
@endsection
