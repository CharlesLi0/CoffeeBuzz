@extends('layouts.menu')
@section('content')
    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>New Product</h1>
                </div>
            </div>
        </div>
    </div>
    <div class="content mt-3">
        @if(isset($successMsg))
            <div class="alert alert-success">{{$successMsg}}</div>
        @endif        
        @if(isset($errorMsg))
            <div class="alert alert-danger">{{$errorMsg}}</div>
        @endif          
        <div class="card">
            <div class="card-body card-block">
                <form action="" method="post" class="">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-addon"><i class="fa fa-asterisk"></i></div>
                            <input type="text" name="name" placeholder="Name" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-addon"><i class="fa fa-asterisk"></i></div>
                            <input type="number" name="price" placeholder="Price" step="0.01" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-addon"><i class="fa fa-asterisk"></i></div>
                            <input type="text" name="description" placeholder="Description" class="form-control">
                        </div>
                    </div>                                                   
                    <div class="form-actions form-group"><button type="submit" class="btn btn-success btn-sm">Submit</button></div>
                </form>
            </div>
         </div>
    </div>
@endsection