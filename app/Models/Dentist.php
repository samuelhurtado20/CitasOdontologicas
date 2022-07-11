<?php 
namespace App\Models;
use App\Models\ConnetionSqlServer;

class Dentist
{
    public $id;
    public $name;
    public $lastName;
    public $position;
    public $phone;    
    public $identification;
    public $dateOfBirth;
    public $status;

    public function __construct() 
    {    }
	
	public function delete()
	{
        try
        {
            $connSqlServer = new ConnetionSqlServer();
            $tsql = "DELETE FROM dbo.dentist WHERE id=?";
            $params = array($this->id);
            
            $result = $connSqlServer->delete($tsql, $params);

            return $result;
        }
        catch(Exception $e)
        {
            echo("Error!" . $e);
        }
	}
	
	public function update()
	{
        try
        {
            $connSqlServer = new ConnetionSqlServer();
            $tsql = "UPDATE dentist set name=?, lastName=?, position=?, phone=?, identification=?, dateOfBirth=?, status=? where id = ?";
            $params = array($this->name, $this->lastName, $this->position, $this->phone, $this->identification, $this->dateOfBirth, $this->status, $this->id);
            
            $result = $connSqlServer->save($tsql, $params);

            return $result;
        }
        catch(Exception $e)
        {
            echo("Error!" . $e);
        }
	}
	
	public function save()
	{
        try
        {
            $connSqlServer = new ConnetionSqlServer();
            $tsql = "INSERT INTO dentist (name, lastName, position, phone, identification, dateOfBirth, status) VALUES (?, ?, ?, ?, ?, ?, ?)";
            $params = array($this->name, $this->lastName, $this->position, $this->phone, $this->identification, $this->dateOfBirth, $this->status);
            
            $result = $connSqlServer->save($tsql, $params);

            return $result;
        }
        catch(Exception $e)
        {
            echo("Error!" . $e);
        }
	}
	
	public function byId(int $id)
	{
        try
        {
            $connSqlServer = new ConnetionSqlServer();
            $tsql = "select * from dentist where id =" . $id;
            $data = $connSqlServer->ReadSingle($tsql);
            $this->id = $data['id'];
            $this->name = $data['name'];
            $this->lastName = $data['lastName'];
            $this->position = $data['position'];
            $this->phone = $data['phone'];
            $this->identification = $data['identification'];
            $this->dateOfBirth = $data['dateOfBirth'];
            $this->status = $data['status'];

            return $this;
        }
        catch(Exception $e)
        {
            echo("Error!" . $e);
        }
	}
	
	public function selectAll()
	{
        try
        {
            $connSqlServer = new ConnetionSqlServer();
            $tsql = "select * from dentist";
            $data = $connSqlServer->ReadMany($tsql);

            $i = 0;
            foreach ($data as $value) {
                $result[$i]['id']       = $data[$i]['id'];
                $result[$i]['identification'] = $data[$i]['identification'];
                $result[$i]['name']     = $data[$i]['name'];
                $result[$i]['lastName'] = $data[$i]['lastName'];
                $result[$i]['position'] = $data[$i]['position'];
                $result[$i]['phone'] = $data[$i]['phone'];
                //$result[$i]['dateOfBirth']  = $data[$i]['dateOfBirth'];
                $result[$i]['dateOfBirth'] = $data[$i]['dateOfBirth']->format('Y-m-d');
                $i++;
              }

            return $result;
        }
        catch(Exception $e)
        {
            echo("Error!" . $e);
        }
	}

    // public function __construct(array $data) 
    // {
    //     $this->Id = $data['Id'];
    //     $this->Email = $data['Email'];
    // }
}