<?php
// SCRIPT TO GET AND DISPLAY API DATA/CITY FROM OPENWEATHER - BY PAUL OKWUCHI
function WeatherUrl($url){
		$cn = curl_init();
		curl_setopt($cn, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($cn, CURLOPT_URL, $url);    // get the contents using url
		$weatherdata = curl_exec($cn); // execute the curl request
		curl_close($cn); //close the cURL
		return $weatherdata;
}
$apikey = "0ae73d69c275b363e06e3b39d6f147df";
$city = $_GET['city'] ?? 'london';
$url="http://api.openweathermap.org/data/2.5/weather?q=".$city."&units=metric&appid=".$apikey;
$response=WeatherUrl($url);

$data = json_decode($response);

$temp = $data->main->temp . '℃';
$minimum_temp = $data->main->temp_min . '℃';
$maximum_temp = $data->main->temp_max . '℃';
$feels_like = $data->main->feels_like . '℃';
$pressure = $data->main->pressure . '℃';
$humidity = $data->main->humidity . '℃';

echo 'The City of <b>'.''.$city.'</b> - Weather Information<br><br>';
echo 'Temperature : '. $temp.'<br>';
echo 'Minimum Temperature : '. $minimum_temp.'<br>';
echo 'Maximum Temperature : '. $maximum_temp.'<br>';
echo 'Feels Like : '. $feels_like.'<br>';
echo 'Pressure : '. $pressure.'<br>';
echo 'Humidity : '. $humidity;
?>
<form action="openweathermap.php">
    <input type="text" name="city" id="city" />
    <input type="submit" name="change_city" value="Search City" id="change_city"  />
</form>
