
        <title>@yield('title')</title>

      <!--Import Google Icon Font-->
<!--      <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">-->
      <!--Import materialize.css-->

        {{ Html::style('fonts/font-awesome-4.6.3/css/font-awesome.min.css') }}
        {{-- {{ Html::style('css/materialize.min.css') }} --}}
        {!! MaterializeCSS::include_full() !!}
        {{ Html::style('css/fusion_style.min.css') }}
        @yield('stylesheets')
        {{ Html::style('css/pmc_style.css') }}

        <!--Let browser know website is optimized for mobile-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
          <script src="{{ url('http://maps.googleapis.com/maps/api/js') }}"></script>

        <script>
          var myCenter=new google.maps.LatLng(23.1787358,80.02477810000005);
          var marker;

          function initialize()
          {
            var mapProp = {
              center:myCenter,
              zoom:5,
              scrollwheel: false,
              mapTypeId:google.maps.MapTypeId.ROADMAP
            };
            var map=new google.maps.Map(document.getElementById("googleMap"),mapProp);
            var marker=new google.maps.Marker({
              position:myCenter,
            });
            marker.setMap(map);
          }
          google.maps.event.addDomListener(window, 'load', initialize);
          </script>
          @yield('jshead')
