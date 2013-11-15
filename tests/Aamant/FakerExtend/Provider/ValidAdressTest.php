<?php namespace Aamant\FakerExtend\Test;

use \Faker\Factory;

class ValidAddressTest extends \PHPUnit_Framework_TestCase
{
	public function testNext()
	{
		$faker = \Faker\Factory::create('fr_FR');
		$faker->addProvider(new \Aamant\FakerExtend\Provider\ValidAddress($faker));

		$this->assertInstanceof('\Faker\Generator', $faker->next());

		$this->assertInternalType('string', $faker->next()->vstreet);
		$this->assertTrue($faker->vstreet == $faker->vstreet);
		$this->assertTrue($faker->vstreet != $faker->next()->vstreet);
	}
}