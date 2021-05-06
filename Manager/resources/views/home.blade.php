@extends('layouts.menu') 
@section('content')
    <div class="content mt-3">
        <div class="col-md-6 col-lg-3">
            <div class="card bg-flat-color-1 text-light">
                <div class="card-body">
                    <div class="h4 m-0" id="num-gameology-products">{{$orderCount}}</div>
                    <div>Orders</div>
                    <div class="progress-bar bg-light mt-2 mb-2" role="progressbar" style="width: 20%; height: 5px;" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                    <small class="text-light">Total # Orders in database.</small>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-lg-3">
            <div class="card bg-flat-color-2 text-light">
                <div class="card-body">
                    <div class="h4 m-0" id="num-matched">{{$created}}</div>
                    <div>Created</div>
                    <div class="progress-bar bg-light mt-2 mb-2" role="progressbar" style="width: 20%; height: 5px;" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                    <small class="text-light"># Order Created.</small>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-lg-3">
            <div class="card bg-flat-color-3 text-light">
                <div class="card-body">
                    <div class="h4 m-0" id="num-partially-matched">{{$canceld}}</div>
                    <div>Canceld</div>
                    <div class="progress-bar bg-light mt-2 mb-2" role="progressbar" style="width: 20%; height: 5px;" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                    <small class="text-light"># Order Canceled.</small>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-lg-3">
            <div class="card bg-flat-color-4 text-light">
                <div class="card-body">
                    <div class="h4 m-0" id="num-not-completed">{{$finished}}</div>
                    <div>Finished</div>
                    <div class="progress-bar bg-light mt-2 mb-2" role="progressbar" style="width: 20%; height: 5px;" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                    <small class="text-light"># Order finished.</small>
                </div>
            </div>
        </div>  

        <div class="col-lg-6 col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="stat-widget-one">
                        <div class="stat-icon dib"><i class="ti-layout-grid2 text-warning border-warning"></i></div>
                        <div class="stat-content dib">
                            <div class="stat-text"># Products - total products</div>
                            <div class="stat-digit" id="num-price-higher-than-competitors">{{$productCount}}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-6 col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="stat-widget-one">
                        <div class="stat-icon dib"><i class="ti-link text-danger border-danger"></i></div>
                        <div class="stat-content dib">
                            <div class="stat-text"># Sold - total sold money</div>
                            <div class="stat-digit" id="num-price-lower-than-competitors">{{$sold}}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <strong class="card-title">Top 5 Popular Products</strong>
                </div>
                <div class="card-body">
                     <table id="product-table" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Price</th>
                                    <th>Description</th>
                                    <th>Sold</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($popularProducts as $product)
                                <tr>
                                    <td>{{$product->name}}</td>
                                    <td>{{$product->price}}</td>
                                    <td>{{$product->description}}</td>
                                    <td>{{$product->sold}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                </div>
            </div>
        </div>
    </div>
@endsection
    
@section('script')
<script src="{{asset('resources/community/sufee-admin/assets/js/lib/chart-js/Chart.bundle.js')}}"></script>
<script>
var ctx = document.getElementById("barChart");
var myChart = new Chart( ctx, {
    type: 'bar',
    data: {
        labels: [ "Dungeon Crawl", "MightyApe", "Milsims Games",  "The Games Capital" ],
        datasets: [
            {
                label: "# Matched Products",
                data: result[0],
                borderColor: "rgba(0, 123, 255, 0.9)",
                borderWidth: "0",
                backgroundColor: "rgba(0, 123, 255, 0.5)"
            },
            {
                label: "# No Matching Found Products",
                data: [1,2],
                borderColor: "rgba(0,0,0,0.09)",
                borderWidth: "0",
                backgroundColor: "rgba(0,0,0,0.07)"
            }
        ]
    },
    options: {
        scales: {
            yAxes: [ {
                ticks: {
                    beginAtZero: true
                }
            } ]
        }
    }
});      
</script>
@endsection