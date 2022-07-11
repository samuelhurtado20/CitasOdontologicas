<?php 
namespace App\Models;

class Product
{
	public $Id;
	public $Title;
	public $Description;
	public $Price;
	public $Sku;
	public $Image;

    // CRUD OPERATIONS
	public function create(array $data)
	{
		
	}
	
	public function read(int $id)
	{
		$this->Title = 'My first Product';
		$this->Description = 'Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum ';
		$this->Price = 2.56;
		$this->Sku = 'MVC-SP-PHP-01';
		$this->Image = 'https://via.placeholder.com/150';

		return $this;
	}
	
	public function update(int $id, array $data)
	{
		
	}
	
	public function delete(int $id)
	{
		
	}
}