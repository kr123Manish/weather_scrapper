<!-- # <a href="http://weather-info-com.stackstaging.com/">Overview</a> -->
### - Here I make a web app using <a href="https://openweathermap.org/api">Weather API</a> which give you weather info of place you search.
<img src="https://github.com/kr123Manish/weather_scrapper/blob/main/code/1.png" width="30%"></img>
<img src="https://github.com/kr123Manish/weather_scrapper/blob/main/code/3.png" width="31%"></img>
<img src="https://github.com/kr123Manish/weather_scrapper/blob/main/code/2.PNG" width="30%"></img>
## Prerequisite
- HTML-5
- CSS
- PHP
## Main Code
```php
<?php
 

  if($_GET['city']){
    $urlContents= file_get_contents("https://api.openweathermap.org/data/2.5/weather?q=".$_GET['city']."&appid=Your api id");
    //convert into array.
    $weatherArray=json_decode($urlContents,true);
    // print_r($weatherArray);
    if($weatherArray['cod']==200){
        $weather_data="The weather in ".$_GET['city']." is currently '".$weatherArray['weather'][0]['description']."'. ";
        $weather_data.="The Temperature is ".round(($weatherArray['main']['temp'])-273.15)."&#176;C and the wind speed is ".($weatherArray['wind']['speed'])."m/s.";
      }else{
        $error="Could not find city - please try again. ";
      }
  }
?>
```
- Get the name of city.
- Set url for search with help of API key.
- Make a weather array.
- If code =200 is check condition for city name is correct or not.
- If yes then for that city we take info of  weather descriotion,temperature,and speed if you can add or extract more info also refer <a href="https://openweathermap.org/current">More...</a>
- If city could not found then error message appears.

<!-- ## <a href="http://weather-info-com.stackstaging.com/">Click here for take Demo</a> -->
### For complete source code <a href="https://github.com/kr123Manish/weather_scrapper/tree/main/code">click here...</a>
