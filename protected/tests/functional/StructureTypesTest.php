<?php

class StructureTypesTest extends WebTestCase
{
	public $fixtures=array(
		'structureTypes'=>'StructureTypes',
	);

	public function testShow()
	{
		$this->open('?r=structureTypes/view&id=1');
	}

	public function testCreate()
	{
		$this->open('?r=structureTypes/create');
	}

	public function testUpdate()
	{
		$this->open('?r=structureTypes/update&id=1');
	}

	public function testDelete()
	{
		$this->open('?r=structureTypes/view&id=1');
	}

	public function testList()
	{
		$this->open('?r=structureTypes/index');
	}

	public function testAdmin()
	{
		$this->open('?r=structureTypes/admin');
	}
}
