<?php 
require_once 'db.php';
require_once 'Country.php';

class Process
{
	function __construct()
	{
		if (isset($_GET) && !empty($_GET['country'])){
			$this->display_country_info($_GET['country']);
		}else{
			header("Location: index.php");
		}
	}

	private function display_country_info($country_name)
	{
		global $country;
		
		$info = $country->info($country_name);
		$data["html"] = "
			<ul>
				<li>Country: {$info['name']}</li>
				<li>Continent: {$info['continent']}</li>
				<li>Region: {$info['region']}</li>
				<li>Population: {$info['population']}</li>
				<li>Life Expectancy: {$info['lifeExpectancy']}</li>
				<li>Government Form: {$info['governmentForm']}</li>
			</ul>";
		echo json_encode($data);
	}
}

$process = new Process();

?>