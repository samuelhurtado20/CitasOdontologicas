<?php 

namespace App\Controllers;

use App\Models\Product;
use Symfony\Component\Routing\RouteCollection;

class ProductController
{
    // Show the product attributes based on the id.
	public function list(RouteCollection $routes)
	{
        //$product = new Product();
        //$product->read($id);

        require_once APP_ROOT . '/views/product/list.php';
	}
    
    // Show the product attributes based on the id.
	public function byId(int $id, RouteCollection $routes)
	{
        $product = new Product();
        $product->read($id);

        require_once APP_ROOT . '/views/product/single.php';
	}
}