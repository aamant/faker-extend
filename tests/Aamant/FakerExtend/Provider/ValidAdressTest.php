<?php namespace Aamant\FakerExtend\Test;

use \Faker\Factory;

class ValidAddressTest extends \PHPUnit_Framework_TestCase
{
	public function testNext()
	{
		$faker = \Faker\Factory::create('fr_FR');
		$faker->addProvider(new \Aamant\FakerExtend\Provider\ValidAddress($faker));
		$this->assertInternalType('string', $faker->next()->street());
		$this->assertTrue($faker->street() == $faker->street());
		$this->assertTrue($faker->street() != $faker->next()->street());
	}
}