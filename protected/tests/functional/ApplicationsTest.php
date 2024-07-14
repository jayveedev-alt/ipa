<?php

class ApplicationsTest extends WebTestCase
{
	public $fixtures=array(
		'applications'=>'Applications',
	);

	public function testShow()
	{
		$this->open('?r=applications/view&id=1');
	}

	public function testCreate()
	{
		$this->open('?r=applications/create');
	}

	public function testUpdate()
	{
		$this->open('?r=applications/update&id=1');
	}

	public function testDelete()
	{
		$this->open('?r=applications/view&id=1');
	}

	public function testList()
	{
		$this->open('?r=applications/index');
	}

	public function testAdmin()
	{
		$this->open('?r=applications/admin');
	}
}
