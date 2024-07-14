<?php

class PositionsTest extends WebTestCase
{
	public $fixtures=array(
		'positions'=>'Positions',
	);

	public function testShow()
	{
		$this->open('?r=positions/view&id=1');
	}

	public function testCreate()
	{
		$this->open('?r=positions/create');
	}

	public function testUpdate()
	{
		$this->open('?r=positions/update&id=1');
	}

	public function testDelete()
	{
		$this->open('?r=positions/view&id=1');
	}

	public function testList()
	{
		$this->open('?r=positions/index');
	}

	public function testAdmin()
	{
		$this->open('?r=positions/admin');
	}
}
