<?php 
namespace App\Controllers;
session_start();
use Symfony\Component\Routing\RouteCollection;
use App\Models\ConnetionSqlServer;
use App\Models\Event;
//use App\Models\Event;

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

	public function logout(RouteCollection $routes)
	{
		$_SESSION['login'] = null;
		require_once APP_ROOT . '/views/home/login.php';
		//require_once APP_ROOT . '/views/home/calendar.php';
	}

	public function calendar(RouteCollection $routes)
	{
		$connSqlServer = new ConnetionSqlServer();
		$tsql = "select * from dbo.schedule_list";
		$sched_res = $connSqlServer->Schedules($tsql);
		//print_r($sched_res);
		//$inst = new Event();
		//$event->start_datetime = date("Y/m/d h:i:sa");
		//$event = $inst->byId(25);
		require_once APP_ROOT . '/views/home/calendar.php';
	}

	public function eventSave(RouteCollection $routes)
	{
		//print_r($_POST);
        // read and set data
        $event = new Event();
        $event->title			= $_POST['title'];
        $event->description		= $_POST['description'];
        //$event->start_datetime	= $_POST['start_datetime'];//date('Y-m-d H:i:s');
        //$event->end_datetime	= $_POST['end_datetime'];//date('Y-m-d H:i:s');

		$event->start_datetime	= date("F d, Y h:i A",strtotime($_POST['start_datetime']));
		$event->end_datetime	= date("F d, Y h:i A",strtotime ( '+1 hour' , strtotime ($_POST['start_datetime']) )) ;//date("F d, Y h:i A",strtotime($_POST['end_datetime']));

        // execute
		if(isset($_POST['id']) && $_POST['id']== "")
		{
			$event->id				=  0;
			$result = $event->save();
		}
		else
		{
			
			$event->id				= $_POST['id'] ;
			$result = $event->update();
		}
        // response
        //echo json_encode(['msg' => 'none', 'success' => $result]);
		//require_once APP_ROOT . '/views/home/calendar';
		header("Location: /" . constant("URL_SUBFOLDER") . "/calendar");
	}

	public function eventDelete(int $id, RouteCollection $routes)
	{
        $event = new Event();
        $event->id = $id;
        // execute
        $result = $event->delete();
		header("Location: /" . constant("URL_SUBFOLDER") . "/calendar");
	}

	public function eventUpdate(int $id, RouteCollection $routes)
	{
		$connSqlServer = new ConnetionSqlServer();
		//$tsql = "select * from dbo.schedule_list";
		//$sched_res = $connSqlServer->Schedules($tsql);
		//print_r($sched_res);
		$inst = new Event();
		//$event->start_datetime = date("Y/m/d h:i:sa");
		$event = $inst->byId(25);
		header("Location: /" . constant("URL_SUBFOLDER") . "/eventUpdate");
	}
}