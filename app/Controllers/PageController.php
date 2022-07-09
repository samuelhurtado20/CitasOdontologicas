<?php 

namespace App\Controllers;

use App\Models\Product;
use Symfony\Component\Routing\RouteCollection;
use App\Models\ConnetionSqlServer;

class PageController
{
    // Homepage action
	public function indexAction(RouteCollection $routes)
	{
		//$conn = new ConnetionSqlServer();
		//$conn->ReadData("select * from users");
		//ConnetionSqlServer::OpenConnection();

		$routeToProduct = str_replace('{id}', 1, $routes->get('product')->getPath());

        require_once APP_ROOT . '/views/home/home.php';
	}
}