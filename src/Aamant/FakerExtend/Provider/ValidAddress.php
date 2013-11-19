<?php namespace Aamant\FakerExtend\Provider;

class ValidAddress extends \Faker\Provider\Base
{
	protected $used = array();

	protected $current = null;

	protected $data = null;

	// public function __construct(Generator $generator, $data = 'Aamant\FakerExtend\Provider\ValidAddressData')
	// {
	// 	parent::__construct($generator);
	// 	$this->data = $data;
	// }

	public function next($key = null, $value = null)
	{
		if (count($this->used) == count(ValidAddressData::$address)) $this->reset();

		do {
			switch ($key) {
				case 'region':
					$current = ValidAddressData::$regionCode[$value][$this->generator->randomNumber(0, count(ValidAddressData::$regionCode[$value]) - 1)];
					break;

				case 'departement':
					$current = ValidAddressData::$departementCode[$value][$this->generator->randomNumber(0, count(ValidAddressData::$departementCode[$value]) - 1)];
					break;
				
				default:
					$current = $this->generator->randomNumber(0, count(ValidAddressData::$address) - 1);
					break;
			}
		}
		while(in_array($current, $this->used));

		$this->used[] = $this->current = $current;

		return $this->generator;
	}

	protected function get($key)
	{
		if (null === $this->current) $this->next();

		return ValidAddressData::$address[$this->current][$key];
	}

	public function reset()
	{
		$this->used = array();
		$this->current = null;
	}

	public function vstreet()
	{
		return $this->get('street');
	}

	public function vpostcode()
	{
		return $this->get('zipcode');
	}

	public function vcity()
	{
		return $this->get('city');
	}

	public function vlatitude()
	{
		return $this->get('latitude');
	}

	public function vlongitude()
	{
		return $this->get('longitude');
	}

	public function vdepartement()
	{
		return $this->get('departement');
	}

	public function vdepartementCode()
	{
		return $this->get('departementCode');
	}

	public function vregion()
	{
		return $this->get('region');
	}

	public function vregionCode()
	{
		return $this->get('regionCode');
	}
}