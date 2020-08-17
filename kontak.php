
<div class="col-sm-12">
           
                        <div class="form-group col-sm-12">
                           <p  align="justify">Dinas Tenaga Kerja, Perindustrian, Koperasi dan UKM terletak di Jalan Conge No 99 Kudus. Tepatnya di Desa Ngembalrejo, Kecamatan Bae, Kabupaten Kudus. Berikut adalah peta lokasi Dinas Tenaga Kerja, Perindustrian, Koperasi dan UKM Kabupaten Kudus :</p>
                        </div>
                        
                        <br>
                                    
                                    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&key=AIzaSyAW0MSByownsUHADPii6MWhY8drTRgIEws&libraries=place&language=id" type="text/javascript"></script> 
                                        <script>
                                        function initialize() {
                                          var propertiPeta = {
                                            center:new google.maps.LatLng(-6.795416400000005,110.8783929),
                                            zoom:18,
                                            mapTypeId:google.maps.MapTypeId.ROADMAP
                                          };
                                          
                                          var peta = new google.maps.Map(document.getElementById("googleMap"), propertiPeta);
                                          
                                          // membuat Marker
                                          var marker=new google.maps.Marker({
                                              position: new google.maps.LatLng(-6.795416400000005,110.8783929),
                                              map: peta
                                          });

                                        }

                                        // event jendela di-load  
                                        google.maps.event.addDomListener(window, 'load', initialize);
                                        </script>
                                        <body>

                                          <div id="googleMap" style="width:100%;height:380px;"></div>
                                          
                                        </body>
                        
        </div>
        <div style="padding:290px 0 0 0;" class="row"></div>

    
    <div style="float:left";height:15px;width:100%">
    </div>
 