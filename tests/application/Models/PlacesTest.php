
<?php 
require_once dirname(__FILE__). '../TestConfiguration.php';
require_once '../../../application/models/Places.php';

class models_PlacesTest extends PHPUnit_Framework_TestCase
{
	public function setUp()
	{
		//reset database to known state
		TestConfiguration::setupDatabase();
	}
	public function testFetchAll()
	{
		$placesFinder = new Places();
		$places = $placesFinder->fatchAll();

		$this->asserSame(3, $places->count());
	}
}
