<?php
namespace App\Controllers;

use App\Models\Dentist;
use Symfony\Component\Routing\RouteCollection;

class DentistController
{
    // VIEWs
	public function index(RouteCollection $routes)
	{
        $dentist = new Dentist();
        $result = $dentist->selectAll();
        $msg = '';
        require_once APP_ROOT . '/views/Dentist/list.php';
	}

	public function list(string $msg, RouteCollection $routes)
	{
        $dentist = new Dentist();
        $result = $dentist->selectAll();
        require_once APP_ROOT . '/views/Dentist/list.php';
	}

	public function single(int $id, RouteCollection $routes)
	{
        $dentist = new Dentist();
        $dentist->byId($id);
        require_once APP_ROOT . '/views/Dentist/single.php';
	}

	public function view(int $id, RouteCollection $routes)
	{
        $dentist = new Dentist();
        $dentist->byId($id);
        require_once APP_ROOT . '/views/Dentist/view.php';
	}

	public function add(RouteCollection $routes)
	{
        require_once APP_ROOT . '/views/Dentist/add.php';
	}

	public function save(RouteCollection $routes)
	{
        // read and set data
        $dentist = new Dentist();
        $dentist->id                    = 0;
        $dentist->identification        = $_POST['identification'];
        $dentist->name                  = $_POST['name'];
        $dentist->lastName              = $_POST['lastName'];
        $dentist->position              = $_POST['position'];
        $dentist->phone                 = $_POST['phone'];
        $dentist->dateOfBirth           = date('Y-m-d H:i:s');
        $dentist->status                = $_POST['status'];
        $dentist->userEmail             = $_POST['userEmail'];
        $dentist->userPassword          = md5(trim($_POST['userPassword']));
        // execute
        $result = $dentist->save();
        // response
        echo json_encode(['msg' => 'none', 'success' => $result]);
	}

	public function update(RouteCollection $routes)
	{
        // read and set data
        $dentist = new Dentist();
        $dentist->id                    = $_POST['id'];
        $dentist->identification        = $_POST['identification'];
        $dentist->name                  = $_POST['name'];
        $dentist->lastName              = $_POST['lastName'];
        $dentist->position              = $_POST['position'];
        $dentist->phone                 = $_POST['phone'];
        $dentist->dateOfBirth           = date('Y-m-d H:i:s');
        $dentist->status                = $_POST['status'];
        $dentist->userEmail             = $_POST['userEmail'];
        $dentist->userPassword          = md5(trim($_POST['userPassword']));
        // execute
        $result = $dentist->update();
        // response
        echo json_encode(['msg' => 'none', 'success' => $result]);
	}

	public function delete(int $id, RouteCollection $routes)
	{
        $dentist = new Dentist();
        $dentist->id = $id;
        $result = $dentist->delete();
        if($result) $msg = 'none';
        else $msg = 'No se pude eliminar el registro';
        header("Location: /" . constant("URL_SUBFOLDER") . "/dentistList/" . $msg);
        die();
	}
}