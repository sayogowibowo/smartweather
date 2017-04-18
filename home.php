<?php
	include "header.php";
?>
<body>

<div class="container">
	<h2><b>Smartweather</b></h2>
	<h4>Don't worry with weather, be happy!</h4>
   <style> 
	select {
		width: 100%;
		padding: 16px 20px;
		border: none;
		border-radius: 4px;
		background-color: #f1f1f1;
	}
	</style>
	<br>
	<span><i>masukan lokasi anda</i></span>
	<form action="" method="POST">
	<input type="text" name="kota">
	<input type="submit" class="button" name="submit" value="cari">
	</form>

	<?php
		error_reporting(0);
		$id = $_POST['kota'];
		if(isset($id)){
		$json_string = file_get_contents("http://api.wunderground.com/api/3f99394a1c5b6dc6/geolookup/conditions/q/IA/$id.json");
	  $parsed_json = json_decode($json_string);
	  $location = $parsed_json->{'response'}->{'version'};
	  $station_id = $parsed_json->{'response'}->{'termsofService'};
	  $weather = $parsed_json->{'location'}->{'city'};
	  $local = $parsed_json->{'current_observation'}->{'observation_time'};
	  $dewpoint_string = $parsed_json->{'current_observation'}->{'dewpoint_string'};
	  $cuaca = $parsed_json->{'current_observation'}->{'weather'};
	  $suhu = $parsed_json->{'current_observation'}->{'temp_c'};
	  $k_angin = $parsed_json->{'current_observation'}->{'wind_mph'};
	  $uv = $parsed_json->{'current_observation'}->{'uv'};
	  
	  echo "<br>";
	  echo "lokasi anda di : ${weather}\n";
	  echo "<br>";
	  echo "Cuaca saat ini : ${cuaca}\n";
	  echo "<br>";
	  echo "Suhu saat ini : ${suhu}\n";
	  echo "<br>";
	  echo "Kecepatan angin saat ini : ${k_angin}\n";
	  echo "<br>";
	  echo "UV : ${uv}\n";
	  echo "<br><br>";
	  
	  if(${cuaca}=="Partly Cloudy")
		  {
			  echo "Sedia jas hujan";
		  }
		  else
		  {
			  echo "Semoga hari anda menyenangkan";
		  }
	  
	  echo "<br>";
	  echo "<br>";
	  echo "observation_time in ${location} is: ${local}\n";
	  echo "<br>";
	  echo "term of services in ${location} is: ${station_id}\n";
	  echo "<br>";
}
?>
</div> 
</body>
