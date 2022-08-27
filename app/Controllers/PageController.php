<?php 
namespace App\Controllers;
session_start();
use Symfony\Component\Routing\RouteCollection;
use App\Models\ConnetionSqlServer;
use App\Models\Event;

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
		$tsql = "select u.userEmail, u.userPassword from (select d.userEmail, d.userPassword from dbo.dentist d union select p.userEmail, p.userPassword from dbo.event p) u where u.userEmail = ? and u.userPassword = ?";
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
		$connSqlServer = new ConnetionSqlServer();
		$tsql = "select * from dbo.schedule_list";
		$sched_res = $connSqlServer->Schedules($tsql);
		//print_r($sched_res);
		require_once APP_ROOT . '/views/home/calendar.php';
	}

	public function eventSave(RouteCollection $routes)
	{
		//print_r($_POST);
        // read and set data
        $event = new Event();
        $event->id				= 0;
        $event->title			= $_POST['title'];
        $event->description		= $_POST['description'];
        $event->start_datetime	= date('Y-m-d H:i:s');
        $event->end_datetime	= date('Y-m-d H:i:s');
        // execute
        $result = $event->save();
        // response
        //echo json_encode(['msg' => 'none', 'success' => $result]);
		require_once APP_ROOT . '/views/home/calendar.php';
	}
}