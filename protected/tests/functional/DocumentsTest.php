<?php

class DocumentsTest extends WebTestCase
{
	public $fixtures=array(
		'documents'=>'Documents',
	);

	public function testShow()
	{
		$this->open('?r=documents/view&id=1');
	}

	public function testCreate()
	{
		$this->open('?r=documents/create');
	}

	public function testUpdate()
	{
		$this->open('?r=documents/update&id=1');
	}

	public function testDelete()
	{
		$this->open('?r=documents/view&id=1');
	}

	public function testList()
	{
		$this->open('?r=documents/index');
	}

	public function testAdmin()
	{
		$this->open('?r=documents/admin');
	}
}
