<?php 
namespace App\Controllers;
session_start();
use Symfony\Component\Routing\RouteCollection;
use App\Models\ConnetionSqlServer;

class PageController
{
    // Homepage action
	public function indexAction(RouteCollection $routes)
	{
		if(isset($_SESSION['login']))
		{
			require_once APP_ROOT . '/views/home/home.php';
		}
		else 
		{
			require_once APP_ROOT . '/views/home/login.php';
		}
	}

	public function login(string $email, string $password, RouteCollection $routes)
	{
		$connSqlServer = new ConnetionSqlServer();
		$tsql = "select u.userEmail, u.userPassword from (select d.userEmail, d.userPassword from dbo.dentist d union select p.userEmail, p.userPassword from dbo.patient p) u where u.userEmail = ? and u.userPassword = ?";
		$params = array($email, md5(trim($password)));	
		$result = $connSqlServer->login($tsql, $params);

        if($result){
			$_SESSION['login'] = $email;
			header("Location: /" . constant("URL_SUBFOLDER"));
		}
		else
		{
			$_SESSION['login'] = null;
			header("Location: /" . constant("URL_SUBFOLDER"));
		}
	}

	public function calendar(RouteCollection $routes)
	{
		require_once APP_ROOT . '/views/home/calendar.php';
	}
}