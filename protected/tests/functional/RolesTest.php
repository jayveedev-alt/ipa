<?php

class RolesTest extends WebTestCase
{
	public $fixtures=array(
		'roles'=>'Roles',
	);

	public function testShow()
	{
		$this->open('?r=roles/view&id=1');
	}

	public function testCreate()
	{
		$this->open('?r=roles/create');
	}

	public function testUpdate()
	{
		$this->open('?r=roles/update&id=1');
	}

	public function testDelete()
	{
		$this->open('?r=roles/view&id=1');
	}

	public function testList()
	{
		$this->open('?r=roles/index');
	}

	public function testAdmin()
	{
		$this->open('?r=roles/admin');
	}
}
