<?php 
require_once 'Country.php';
require_once 'HTML_Helper.php';
$country = new Country();
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Seattle - OOP Intermediate 2</title>

	<!-- css -->
	<!-- inline -->
	<style type="text/css">
	body{
		font-family: "Helvetica Neue", Helvetica, sans-serif;
	}
	h1{
		border-bottom: 1px solid #dddddd;
	}
	li{
		list-style: none;
	}
	</style>
	
	<!-- js -->
	<!-- external -->
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
	<!-- inline -->
	<script type="text/javascript">
		$(document).ready(function(){
			$('form').on('submit', function(){
				$.get($(this).attr('action'), $(this).serialize(), function(data){
					$('#country_info').next().remove();
					$('#country_info').after(data.html);
				}, "json");

				return false;
			});

			$('#country').change(function(){
				$('form').submit();
			});
		});
	</script>
</head>
<body>
	<form action="process.php" method="get">
		Select Country: 
		<?= HTML_Helper::selectify("country", $country->list_all_countries()) ?>
		<!-- <input type="submit" value="Check Info" /> -->
	</form>
	<h1 id="country_info">Country Information</h1>
</body>
</html>