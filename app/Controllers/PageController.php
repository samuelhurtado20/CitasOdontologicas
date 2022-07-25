<?php 
namespace App\Controllers;
session_start();

//use App\Models\Product;
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

		//$routeToProduct = str_replace('{id}', 1, $routes->get('product')->getPath());

        //require_once APP_ROOT . '/views/home/home.php';

		if(isset($_SESSION['login']))
		{
			require_once APP_ROOT . '/views/home/home.php';
			//die();
		}
		else 
		{
			require_once APP_ROOT . '/views/home/login.php';
			//header("Location: /" . constant("URL_SUBFOLDER"));
			//die();
		}
	}

	public function login(string $email, string $password, RouteCollection $routes)
	{
		$connSqlServer = new ConnetionSqlServer();
		$tsql = "select u.userEmail, u.userPassword from (select d.userEmail, d.userPassword from dbo.dentist d union select p.userEmail, p.userPassword from dbo.patient p) u where u.userEmail = ? and u.userPassword = ?";
		$params = array($email, $password);
		
		$result = $connSqlServer->login($tsql, $params);

        if($result){
			$_SESSION['login'] = $email;
			//require_once APP_ROOT . '/views/home/home.php';
			header("Location: /" . constant("URL_SUBFOLDER"));
		}
		else
		{
			$_SESSION['login'] = null;
			//require_once APP_ROOT . '/views/home/login.php';
			header("Location: /" . constant("URL_SUBFOLDER"));
		}
	}

	public function logout(RouteCollection $routes)
	{
		$_SESSION['login'] = null;
		require_once APP_ROOT . '/views/home/login.php';
	}
}