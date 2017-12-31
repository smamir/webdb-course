<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Nearby Restaurants</title>

</head>
<body>
</body>
</html>

<?php

if($_SERVER['REQUEST_METHOD'] == 'POST') {
  $location = urlencode($_POST['search']);
        echo "<h3>Locations near " . $location . " ...<h3/><br>";
  
          $geocodeFromAddr = file_get_contents('https://maps.googleapis.com/maps/api/geocode/json?address='.$location.'&key=AIzaSyCdxQs0v23PjSi1HbMsxgMXU1WLCuPWZjg'); 

        $output = json_decode($geocodeFromAddr);
        $data['latitude']  = $output->results[0]->geometry->location->lat; 
        $data['longitude'] = $output->results[0]->geometry->location->lng;
        $dataa=$data['latitude'];
        $dataa2=$data['longitude'];

          // var_dump($geocodeFromAddr); die();
$url = "https://maps.googleapis.com/maps/api/place/nearbysearch/json?location=".$dataa . "," . $dataa2."&radius=1000&type=restaurant&key=AIzaSyCdxQs0v23PjSi1HbMsxgMXU1WLCuPWZjg";
        // var_dump($url); die();

        $getres=file_get_contents($url);

        $output1=json_decode($getres);



        //var_dump($output1);

        foreach($output1->results as $shop)
        {
                  echo $shop->name;
        echo "<br>";
        }

}
?>
