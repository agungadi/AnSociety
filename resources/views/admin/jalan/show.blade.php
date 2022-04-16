@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('global.jalan.title') }}
    </div>

    <div class="card-body">
        <table class="table table-bordered table-striped">
            <tbody>
                <tr>
                    <th>
                        {{ trans('global.jalan.fields.id_user') }}
                    </th>
                    <td>
                        {{ $jalan->idUser }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('global.jalan.fields.image') }}
                    </th>
                    <td>
                        <img src="{{ asset('storage/image/'.$jalan->image) }}" alt="laporan" title="jalan" width="350" height="400"/>

                    </td>
                </tr>

                <tr>
                    <th>
                        {{ trans('global.jalan.fields.deskripsi') }}
                    </th>
                    <td>
                        {{ $jalan->deskripsi }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('global.jalan.fields.alamat') }}
                    </th>
                    <td>
                        {{ $jalan->alamat }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('global.jalan.fields.kecamatan') }}
                    </th>
                    <td>
                        {{ $jalan->kecamatan }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('global.jalan.fields.latitude') }}
                    </th>
                    <td>
                        {{ $jalan->latitude }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('global.jalan.fields.longtitude') }}
                    </th>
                    <td>
                        {{ $jalan->longtitude }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('global.jalan.fields.created_at') }}
                    </th>
                    <td>
                        {{ $jalan->created_at }}
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


        var locations = <?php print_r(json_encode($jalan)) ?>;


        var mymap = new GMaps({
          el: '#mymap',
          lat: -7.1998997,
          lng: 111.898809,
          zoom:9
        });


        $.each( locations, function(index){
            mymap.addMarker({
              lat: {{ $jalan->latitude }},
              lng: {{ $jalan->longtitude }},
              title: 'map',
              click: function(e) {
                alert('This is {{ $jalan->alamat }}');
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
