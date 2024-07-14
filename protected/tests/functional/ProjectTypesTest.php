<?php

class ProjectTypesTest extends WebTestCase
{
	public $fixtures=array(
		'projectTypes'=>'ProjectTypes',
	);

	public function testShow()
	{
		$this->open('?r=projectTypes/view&id=1');
	}

	public function testCreate()
	{
		$this->open('?r=projectTypes/create');
	}

	public function testUpdate()
	{
		$this->open('?r=projectTypes/update&id=1');
	}

	public function testDelete()
	{
		$this->open('?r=projectTypes/view&id=1');
	}

	public function testList()
	{
		$this->open('?r=projectTypes/index');
	}

	public function testAdmin()
	{
		$this->open('?r=projectTypes/admin');
	}
}
