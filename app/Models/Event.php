<?php 
namespace App\Models;
use App\Models\ConnetionSqlServer;

class Event
{
    public $id;
    public $title;
    public $description;
    public $start_datetime;
    public $end_datetime;

    public function __construct() 
    {    }
	
	public function delete()
	{
        try
        {
            $connSqlServer = new ConnetionSqlServer();
            $tsql = "DELETE FROM dbo.schedule_list WHERE id=?";
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
            $tsql = "UPDATE dbo.schedule_list set title=?, description=?, start_datetime=?, end_datetime=? where id = ?";
            $params = array($this->title, $this->description, $this->start_datetime, $this->end_datetime, $this->id);
            
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
            $tsql = "INSERT INTO dbo.schedule_list (title, description, start_datetime, end_datetime) VALUES (?, ?, ?, ?)";
            $params = array($this->title, $this->description, $this->start_datetime, $this->end_datetime);
            
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
            $tsql = "select * from dbo.schedule_list where id =" . $id;
            $data = $connSqlServer->ReadSingle($tsql);
            $this->id               = $data['id'];
            $this->title             = $data['title'];
            $this->description         = $data['description'];
            $this->start_datetime         = $data['start_datetime'];
            $this->end_datetime            = $data['end_datetime'];

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
            $tsql = "select * from dbo.schedule_list";
            $data = $connSqlServer->ReadMany($tsql);

            $result = Array();
            $i = 0;
            foreach ($data as $value) {
                $result[$i]['id']               = $data[$i]['id'];
                $result[$i]['title']            = $data[$i]['title'];
                $result[$i]['description']      = $data[$i]['description'];
                $result[$i]['start_datetime']   = $data[$i]['start_datetime']->format('Y-m-d');
                $result[$i]['end_datetime']     = $data[$i]['end_datetime']->format('Y-m-d');
                $i++;
              }

            return $result;
        }
        catch(Exception $e)
        {
            echo("Error!" . $e);
        }
	}
}