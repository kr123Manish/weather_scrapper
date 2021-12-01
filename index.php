<?php
  if($_GET['company']) {
      $company_data='';
      $error='';
      $company=str_replace(' ','',$_GET['company']); //function used for remove spaces for proper search.
      //for check company is listed or not.
      $file_headers = @get_headers("https://www.screener.in/company/".$company."/consolidated/");
      if(!$file_headers || $file_headers[0] == 'HTTP/1.1 404 Not Found') {
             $error="This company could not listed on stock :(";
            }
    else {
      $forecastpage=file_get_contents("https://www.screener.in/company/".$company."/consolidated/");
      $pageArray=explode('<div class="sub show-more-box">',$forecastpage);
      if(sizeof($pageArray)>1){
          $company_data=explode('</p>',$pageArray[1]);
          if(sizeof($company_data)>1){
              $company_data=$company_data[0];
              //echo $company_data[0];
          }
          else{
            $error="Body Syntax of Main website is changed :(";
        }
      }
      else{
          $error="Body Syntax of Main website is changed :(";
      }
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
    HTML{
        background-image:linear-gradient(rgba(0, 0, 0, 0.3),rgba(0, 0, 0, 0.1)),url('weather.jpg');
        width: 100%;
        height: 100vh;
        background-size:cover;
        background-repeat: no-repeat;
      }
      body{
        background: none;
      }
      .container{
        margin-top:20vh;
        text-align: center;
        width:25%;
        }
      #company_data{
          margin-top:3vh;
          }
    input{
        margin-top:15px;
        margin-bottom:30px;
      }
    </style>
  </head>
  <body>
    <div class="container">
      <header>
        <h1>What's the Weather?</h1>
      </header>
      <main>
        <form>
  <div class="mb-3">
    <label for="search" class="form-label">Enter the name of Company.</label>
    <input type="text" class="form-control" name='company' placeholder="eg RELIANCE, TATASTEEL, HDFCBANK...." value="<?php echo $_GET['company']; ?>">
  </div>

  <button type="submit" class="btn btn-primary">Submit</button>
  <div id="company_data">
      <?php
            if($company_data){
                echo '<div class="alert alert-success" role="alert">'.$company_data.'</div>';
            }
            if($error){
                echo '<div class="alert alert-danger" role="alert">'.$error.'</div>';
            }
      ?>
  </div>
</form>
      </main>
      
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
  </body>
</html>