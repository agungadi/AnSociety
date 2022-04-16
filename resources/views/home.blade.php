@extends('layouts.admin')
@section('content')
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-8">
                <h4 class="card-title mb-0">
                Welcome to {{ config('app.name') }} Admin Dashboard. </h4>
                <div class="small text-muted">{{ date('D, F d, Y') }}</div>
            </div>

            <div class="col-sm-4 hidden-sm-down">
                <div class="btn-toolbar float-right" role="toolbar" aria-label="Toolbar with button groups">
                 <!--   <button type="button" class="btn btn-primary float-right"> -->
                        <i class="icon-cloud-download"></i>
                    </button>
                </div>
            </div>
        </div>


        <hr>

    </div>

</div>
<!-- / card -->



<div class="card-group mb-5 mr-3 ml-3 mt-5">
    <div class="card text-white bg-info mr-2">
        <div class="card-body">
            <div class="text-muted text-right mb-5">
            <i class="mdi mdi-account-box text-light icon-lg mdi-48px fa-2x"></i>

            <div class="float-left">
                      <h5 class="mb-0 mt-2 text-white text-left">Pengguna</h5>
                      <div class="fluid-container">
                      <h5 class="font-weight-medium text-white text-left mt-3 mb-0"> {{$pengguna->count()}}</h5>
            </div>
            </div>
            </div>

            
            <h6 class="mdi mdi-account-alert mb-1 float-sm-right" aria-hidden="true"> Total Seluruh Pengguna</h6>

        </div>
    </div>

    <div class="card text-white bg-warning mr-2">
    <div class="card-body">
            <div class="text-muted text-right mb-5">
            <i class="mdi mdi-road-variant text-secondary icon-lg mdi-48px fa-2x"></i>

            <div class="float-left">
                      <h5 class="mb-0 mt-2 text-white text-left">Jalan</h5>
                      <div class="fluid-container">
                      <h5 class="font-weight-medium text-white text-left mt-3 mb-0"> {{$jalan->count()}}</h5>
            </div>
            </div>
            </div>

            
            <h6 class="mdi mdi-alert-circle mb-1 text-white float-sm-right" aria-hidden="true">Total Seluruh Laporan Jalan</h6>

        </div>
    </div>
    
    <div class="card text-white bg-success mr-2">
        <div class="card-body">
            <div class="text-muted text-right mb-5">
            <i class="mdi mdi-bridge text-danger icon-lg mdi-48px fa-2x"></i>

            <div class="float-left">
                      <h5 class="mb-0 mt-2 text-white text-left">Jembatan</h5>
                      <div class="fluid-container">
                      <h5 class="font-weight-medium text-white text-left mt-3 mb-0"> {{$jembatan->count()}}</h5>
            </div>
            </div>
            </div>

            
            <h6 class="mdi mdi-alert-circle mb-1 float-sm-right" aria-hidden="true"> Total Seluruh Laporan Jembatan</h6>

            </div>
        </div>
    </div>

 

    <!DOCTYPE html>
<html>
<head>
</head>
   
<body>

<div id="container"></div>
</body>
  
<script src="https://code.highcharts.com/highcharts.js"></script>
<script type="text/javascript">
    var user =  <?php echo json_encode($user) ?>;
   
    Highcharts.chart('container', {
        chart: {
        type: 'area'
    },
        title: {
            text: 'Pertumbuhan Pengguna Aplikasi, 2020'
        },
        subtitle: {
            text: 'Source: Aplikasi Dadan Dalan'
        },
         xAxis: {
            categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
        },
        yAxis: {
            title: {
                text: 'Number of New Users'
            }
        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'middle'
        },
        plotOptions: {
            series: {
                allowPointSelect: true
            }
        },
        series: [{
            name: 'New Users',
            data: user
        }],
        responsive: {
            rules: [{
                condition: {
                    maxWidth: 500
                },
                chartOptions: {
                    legend: {
                        layout: 'horizontal',
                        align: 'center',
                        verticalAlign: 'bottom'
                    }
                }
            }]
        }
});
</script>
</html>
@endsection
@section('scripts')
@parent

@endsection