<?php
 

  if($_GET['city']){
    $urlContents= file_get_contents("https://api.openweathermap.org/data/2.5/weather?q=".$_GET['city']."&appid=Your api key");
    //convert into array.
    $weatherArray=json_decode($urlContents,true);
    // print_r($weatherArray);
    if($weatherArray['cod']==200){
        $weather_data="Todays weather is ".$weatherArray['weather'][0]['description'];
        $weather_data="The weather in ".$_GET['city']." is currently '".$weatherArray['weather'][0]['description']."'. ";
        $weather_data.="The Temperature is ".round(($weatherArray['main']['temp'])-273.15)."&#176;C and the wind speed is ".($weatherArray['wind']['speed'])."m/s.";
      }else{
        $error="Could not find city - please try again. ";
      }
  }
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <title>Weather scrapper!</title>
    
    <style type="text/css">
    *{
        margin:0;
        padding:0;
        box-sizing: border-box;
    }
    
    HTML{
        
        background-image:linear-gradient(rgba(0, 0, 0, 0.3),rgba(0, 0, 0, 0.1)),url('https://github.com/kr123Manish/weather_scrapper/blob/main/code/bg.jpg');
        width: 100%;
        height: 100vh;
        background-size:cover;
        background-repeat: no-repeat;
      }

    body{
        background: none;
      }
    .main{
        width:100vw;
        height:100vh;
        /*background:blue;*/
        display: flex;
    align-items: center;
    justify-content:center;
    }
    .container{
        
        text-align: center;
        width:25%;
        }

    #company_data{
          margin-top:3vh;
          }

    input{
        /*margin-top:1rem;*/
        /*margin-bottom:1rem;*/
      }

    label,h1{
        color: white;
      }
     .x{
         color:#8F0000;
     }

  </style>
  </head>
  <body>
     <div class="main">
    <div class="container">
      <header>
        <h1 class="x">What's the Weather?</h1>
      </header>
      <main>
<form>
  <div class="mb-3">
    <label for="search" class="form-label x">Enter the name of City.</label>
    <input type="text" required class="form-control" name='city' placeholder="eg Delhi, Pune, Mumbai.." value="<?php echo $_GET['city']; ?>">
  </div>

  <button type="submit" class="btn btn-primary" name="submit">Submit</button>
  <div id="company_data">
      <?php
            if($weather_data){
                echo '<div class="alert alert-primary" role="alert">'.$weather_data.'</div>';
            }
            if($error){
                echo '<div class="alert alert-info" role="alert">'.$error.'</div>';
            }
      ?>
  </div>
</form>
      </main>
      
    </div>
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
  </body>
</html>
