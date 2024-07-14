<?php

class StatusesTest extends WebTestCase
{
	public $fixtures=array(
		'statuses'=>'Statuses',
	);

	public function testShow()
	{
		$this->open('?r=statuses/view&id=1');
	}

	public function testCreate()
	{
		$this->open('?r=statuses/create');
	}

	public function testUpdate()
	{
		$this->open('?r=statuses/update&id=1');
	}

	public function testDelete()
	{
		$this->open('?r=statuses/view&id=1');
	}

	public function testList()
	{
		$this->open('?r=statuses/index');
	}

	public function testAdmin()
	{
		$this->open('?r=statuses/admin');
	}
}
