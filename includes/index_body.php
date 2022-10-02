<?php
require_once('../function/get_all_codinate.php');
// var_dump($get_all_result);
?>

<br>
<br>
<br>
<br>

<?php 


echo "<h3>welcom back {$_SESSION['first Name']} {$_SESSION['last Name']}</h3>";
?>

    <div id="map" style ="height: 500px; width: 100%;">

  </div>





    <?php
	echo '
  <script async="false"
          src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDgr4tJkvr4s1Krsuu29dC4EKHMYlN157M&v=beta&callback=initMap">
          </script>';


    echo "<script>";
    echo '
    function initMap(){
        const bruselle = { lat:50.8503, lng:4.3517 };
    
        const map = new google.maps.Map(
          document.getElementById("map"),
          {
            zoom: 8,
            center: bruselle,
          }
        );
      
        const content1 = "<h3>bruselle de belgique</h3>";
        const content2 = "<h3>namur the great</h3>";
      
      
        function addmarker(location,name,content) {
    
            
        const infowindow = new google.maps.InfoWindow({
            content: content,
          });
    
            const marker = new google.maps.Marker({
                position: location,
                map,
                title:name,
              });
    
              marker.addListener("click", () => {
                infowindow.open({
                  anchor: marker,
                  map,
                  shouldFocus: false,
                });
              });
        }
    

        
        ';
        foreach ($get_all_result as $row) {
          echo "addmarker({lat : ".$row['latitute']." , lng : ".$row['longitude']." },'".$row['area_name']."','<h3>".$row['nom']."\'s</h3> green Area');";
        }
        
 echo "
      }
</script>";




    ?>

