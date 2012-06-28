
<!DOCTYPE html>
<html>
  <head>
    <!titleGoogle Maps JavaScript API v3 Example: Places Autocomplete</title>
    

        <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js"></script>
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.16/jquery-ui.min.js"></script>
        <script type="text/javascript">


        var PostCodeid = "#Postcode";
        var longval = "#hidLong";

        var latval = "#hidLat";
        var geocoder;
        var map;
        var marker;

        function initialize() {
            //MAP
            var initialLat = $(latval).val();
            var initialLong = $(longval).val();
            if (initialLat == '') {
                initialLat = "23.716211";
                initialLong = "90.408154";
            }
            var latlng = new google.maps.LatLng(initialLat, initialLong);
            var options = {
                zoom: 16,
                center: latlng,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            };

            map = new google.maps.Map(document.getElementById("geomap"), options);


            geocoder = new google.maps.Geocoder();

            marker = new google.maps.Marker({
                map: map,
                draggable: true,
                position: latlng
            });

            google.maps.event.addListener(marker, "dragend", function (event) {
                var point = marker.getPosition();
                map.panTo(point);
            });

            <?php echo 'var myPhpVariable = "'. $add . '";'; ?>
                 geocoder.geocode({ 'address': myPhpVariable }, function (results, status) {
                    if (status == google.maps.GeocoderStatus.OK) {
                        map.setCenter(results[0].geometry.location);
                        marker.setPosition(results[0].geometry.location);
                        $(latval).val(marker.getPosition().lat());
                        $(longval).val(marker.getPosition().lng());
                        $(PostCodeid).val(myPhpVariable);
                    } else {
                        alert("Geocode was not successful for the following reason: " + status);
                    }
                });

        };

        $(document).ready(function () {

            initialize();

            $(function () {
                $(PostCodeid).autocomplete({
                    //This bit uses the geocoder to fetch address values
                    source: function (request, response) {
                        geocoder.geocode({ 'address': request.term }, function (results, status) {
                            response($.map(results, function (item) {
                                return {
                                    label: item.formatted_address,
                                    value: item.formatted_address
                                };
                            }));
                        });
                    }
                });
            });

            $('#findbutton').click(function (e) {
                   var address = $(PostCodeid).val();
                geocoder.geocode({ 'address': address }, function (results, status) {
                    if (status == google.maps.GeocoderStatus.OK) {
                        map.setCenter(results[0].geometry.location);
                        marker.setPosition(results[0].geometry.location);
                        $(latval).val(marker.getPosition().lat());
                        $(longval).val(marker.getPosition().lng());
                    } else {
                        alert("Geocode was not successful for the following reason: " + status);
                    }
                });
                e.preventDefault();
            });

            //Add listener to marker for reverse geocoding
            google.maps.event.addListener(marker, 'drag', function () {
                geocoder.geocode({ 'latLng': marker.getPosition() }, function (results, status) {
                    if (status == google.maps.GeocoderStatus.OK) {
                        if (results[0]) {
                            $(latval).val(marker.getPosition().lat());
                            $(longval).val(marker.getPosition().lng());

                         //   var title = marker.getTitle();
                       //     <?php echo 'var myTitle = marker.getTitle();'; ?>
                       //     $(PostCodeid).val(myTitle));
                        }

                    }
                });
            });

        });

    </script>
  </head>
  <body>
  <style type="" >
            .ui-autocomplete {
                background-color: white;
                width: 300px;
                border: 1px solid #cfcfcf;
                list-style-type: none;
                padding-left: 0px; font-family:Arial, Helvetica, sans-serif; cursor:pointer; font-size:12px;
            }
            .ui-menu-item {padding:3px 0;}
        </style>

        <form method="post" accept-charset="utf-8" action="http://localhost/ci/index.php/map/" />

        <p><input class="postcode" id="Postcode" name="Postcode" type="text" size="50"> <input type="submit" id="findbutton" value="Find" /></p>

        <div id="geomap" style="width:400px; height:400px;">
            <p>Loading Please Wait...</p>
        </div>

        <input id="hidLat" name="hidLat" type="text" value="">
        <input id="hidLong" name="hidLong" type="text" value="">
        
        <p><input type="submit" id="savebutton" value="Save longitude & lattitude" /></p>

      <!--  <?php echo "$add";?>
      -->


  </body>
</html>
