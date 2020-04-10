<?php
		$weather = "";
		error_reporting(0);
		if ($_GET) {

			
			$city = str_replace(' ', '', $_GET['city']);

			$forcastpage = file_get_contents("https://www.weather-forecast.com/locations/".$city."/forecasts/latest");
			

			$pagearray = explode ('</h2> (1–3 days)</div><p class="b-forecast__table-description-content"><span class="phrase">',$forcastpage);

			$secondpagearray = explode('</span></p></td><td class="b-forecast__table-description-cell--js" colspan="9"><div class="b-forecast__table-description-title">', $pagearray[1]);

			 $weather = $secondpagearray[0];	
			   
		}

?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <style type="text/css">
    	
		html { 
				 background: url(background.gif) no-repeat center center fixed; 
				 -webkit-background-size: cover;
				 -moz-background-size: cover;
				 -o-background-size: cover;
				 background-size: cover;
			}

			body {
				background: none;
			}

			.container{

				text-align: center;
				margin-top: 150px;
				width: 400px;
			}
			.white {
				color: white
			}

			input {

				margin: 20px 0 ;

			}

			#weather {

				margin: 20px 0;

			    
			}

    </style>

    <title>weather</title>
  </head>
  <body>
  	<div class="container">
  		<h1 class="white" >WEATHER</h1>
  		


  		<form>
  <div class="form-group">
    <label for="city" class="white">City Name</label>
    <input type="text" class="form-control" id="city" name="city" placeholder="Mumbai , Nagaland" value="<?php echo $_GET['city'];?>">
    <small id="emailHelp" class=" white">Have a nice day !</small>
  </div>


  <button type="submit" class="btn btn-primary">Search</button>
  <div id="weather"><?php 

  				if ($weather) {
  					
  					echo '<div class="alert alert-success" role="alert">
  							  '.$weather.'
						</div>';
  				}

   ?></div>
</form>

  	</div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>