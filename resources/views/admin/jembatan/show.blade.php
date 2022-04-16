@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('global.jembatan.title') }}
    </div>

    <div class="card-body">
        <table class="table table-bordered table-striped">
            <tbody>
                <tr>
                    <th>
                        {{ trans('global.jembatan.fields.id_user') }}
                    </th>
                    <td>
                        {{ $jembatan->idUser }}
                    </td>
                </tr>
                <tr>
                <tr>
                    <th>
                        {{ trans('global.jembatan.fields.image') }}
                    </th>
                    <td>
                        {{ $jembatan->image }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('global.jembatan.fields.deskripsi') }}
                    </th>
                    <td>
                        {{ $jembatan->deskripsi }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('global.jembatan.fields.alamat') }}
                    </th>
                    <td>
                        {{ $jembatan->alamat }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('global.jembatan.fields.kecamatan') }}
                    </th>
                    <td>
                        {{ $jembatan->kecamatan }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('global.jembatan.fields.latitude') }}
                    </th>
                    <td>
                        {{ $jembatan->latitude }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('global.jembatan.fields.longtitude') }}
                    </th>
                    <td>
                        {{ $jembatan->longtitude }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('global.jembatan.fields.created_at') }}
                    </th>
                    <td>
                        {{ $jembatan->created_at }}
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                    <div style="width: 500px; height: 500px;">
                    <html>
    <head>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="http://maps.google.com/maps/api/js"></script>
          <script src="https://cdnjs.cloudflare.com/ajax/libs/gmaps.js/0.4.24/gmaps.js"></script>


          <style type="text/css">
            #mymap {
                  border:1px solid red;
                  width: 800px;
                  height: 500px;
                margin-left:200px;
            }
          </style>


    </head>
    <body>


      <h4>Titik Lokasi Pada Google Maps</h4>


      <div id="mymap"></div>


      <script type="text/javascript">


        var locations = <?php print_r(json_encode($jembatan)) ?>;


        var mymap = new GMaps({
          el: '#mymap',
          lat: -7.1998997,
          lng: 111.898809,
          zoom:9
        });


        $.each( locations, function(index){
            mymap.addMarker({
              lat: {{ $jembatan->latitude }},
              lng: {{ $jembatan->longtitude }},
              title: 'map',
              click: function(e) {
                alert('This is {{ $jembatan->alamat }}');
              }
            });
       });


      </script>


    </body>
    </html>

    </div>
                    </td>

                    </tr>
            </tbody>
        </table>
    </div>
</div>

@endsection
