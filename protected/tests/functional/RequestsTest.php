<?php

class RequestsTest extends WebTestCase
{
	public $fixtures=array(
		'requests'=>'Requests',
	);

	public function testShow()
	{
		$this->open('?r=requests/view&id=1');
	}

	public function testCreate()
	{
		$this->open('?r=requests/create');
	}

	public function testUpdate()
	{
		$this->open('?r=requests/update&id=1');
	}

	public function testDelete()
	{
		$this->open('?r=requests/view&id=1');
	}

	public function testList()
	{
		$this->open('?r=requests/index');
	}

	public function testAdmin()
	{
		$this->open('?r=requests/admin');
	}
}
