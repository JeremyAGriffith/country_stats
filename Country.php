<?php 
require_once 'db.php';
require_once 'HTML_Helper.php';

class Country
{
	public function info($country_name)
	{
		global $database;

		$info_query = "SELECT name, continent, region, population, lifeExpectancy, governmentForm
			FROM Country
			WHERE name = '{$country_name}'";
		$info = $database->fetch_record($info_query);

		return $info;
	}

	public function list_all_countries()
	{
		global $database;

		$list_query = "SELECT name FROM Country";
		$countries = $database->fetch_all($list_query);

		return $countries;
	}
}

$country = new Country();

?>