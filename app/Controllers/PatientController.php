<?php 
namespace App\Controllers;
session_start();
use App\Models\Patient;
use Symfony\Component\Routing\RouteCollection;

class PatientController
{
    // VIEWs
	public function index(RouteCollection $routes)
	{
        $patient = new Patient();
        $result = $patient->selectAll();
        $msg = '';
        require_once APP_ROOT . '/views/Patient/list.php';
	}

	public function list(string $msg, RouteCollection $routes)
	{
        $patient = new Patient();
        $result = $patient->selectAll();
        require_once APP_ROOT . '/views/Patient/list.php';
	}

	public function single(int $id, RouteCollection $routes)
	{
        $patient = new Patient();
        $patient->byId($id);
        require_once APP_ROOT . '/views/Patient/single.php';
	}

	public function view(int $id, RouteCollection $routes)
	{
        $patient = new Patient();
        $patient->byId($id);
        require_once APP_ROOT . '/views/Patient/view.php';
	}

	public function add(RouteCollection $routes)
	{
        require_once APP_ROOT . '/views/Patient/add.php';
	}

	public function save(RouteCollection $routes)
	{
        // read and set data
        $patient = new Patient();
        $patient->id                    = 0;
        $patient->identification        = $_POST['identification'];
        $patient->name                  = $_POST['name'];
        $patient->lastName              = $_POST['lastName'];
        $patient->position              = $_POST['position'];
        $patient->phone                 = $_POST['phone'];
        $patient->dateOfBirth           = date('Y-m-d H:i:s');
        $patient->status                = $_POST['status'];
        $patient->userEmail             = $_POST['userEmail'];
        $patient->userPassword          = md5(trim($_POST['userPassword']));
        // execute
        $result = $patient->save();
        // response
        echo json_encode(['msg' => 'none', 'success' => $result]);
	}

	public function update(RouteCollection $routes)
	{
        // read and set data
        $patient = new Patient();
        $patient->id                    = $_POST['id'];
        $patient->identification        = $_POST['identification'];
        $patient->name                  = $_POST['name'];
        $patient->lastName              = $_POST['lastName'];
        $patient->position              = $_POST['position'];
        $patient->phone                 = $_POST['phone'];
        $patient->dateOfBirth           = date('Y-m-d H:i:s');
        $patient->status                = $_POST['status'];
        $patient->userEmail             = $_POST['userEmail'];
        $patient->userPassword          = md5(trim($_POST['userPassword']));
        // execute
        $result = $patient->update();
        // response
        echo json_encode(['msg' => 'none', 'success' => $result]);
	}

	public function delete(int $id, RouteCollection $routes)
	{
        $patient = new Patient();
        $patient->id = $id;
        $result = $patient->delete();
        if($result) $msg = 'none';
        else $msg = 'No se puede eliminar el registro';
        header("Location: /" . constant("URL_SUBFOLDER") . "/patientList/" . $msg);
        die();
	}
}