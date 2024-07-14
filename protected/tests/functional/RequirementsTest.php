<?php

class RequirementsTest extends WebTestCase
{
	public $fixtures=array(
		'requirements'=>'Requirements',
	);

	public function testShow()
	{
		$this->open('?r=requirements/view&id=1');
	}

	public function testCreate()
	{
		$this->open('?r=requirements/create');
	}

	public function testUpdate()
	{
		$this->open('?r=requirements/update&id=1');
	}

	public function testDelete()
	{
		$this->open('?r=requirements/view&id=1');
	}

	public function testList()
	{
		$this->open('?r=requirements/index');
	}

	public function testAdmin()
	{
		$this->open('?r=requirements/admin');
	}
}
