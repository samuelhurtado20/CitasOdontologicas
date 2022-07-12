<?php 

namespace App\Controllers;

use App\Models\Pacient;
use Symfony\Component\Routing\RouteCollection;

class PacientController
{
    // VIEWs
	public function index(RouteCollection $routes)
	{
        require_once APP_ROOT . '/views/Pacient/list.php';
	}
}