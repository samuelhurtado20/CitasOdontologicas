<?php  
namespace App\Models;

class ConnetionSqlServer
{
    function OpenConnection()  
    {  
        try  
        {  
            $serverName = constant('DB_HOST'); 
            $connectionOptions = array("Database"=>constant('DB_NAME'),  "Uid"=>constant('DB_USER'), "PWD"=>constant('DB_PASS')); 
            $conn = sqlsrv_connect($serverName, $connectionOptions);  

            //if($conn == false) die(var_dump(sqlsrv_errors()));
            if($conn == false) die(print_r(sqlsrv_errors(), true));

            return $conn;        
        }  
        catch(Exception $e)  
        {  
            echo("Error!");  
        }  
    } 
     
    function delete($tsql, $params)  
    {  
        try  
        {
            $conn = self::OpenConnection();  
            $tsql;  
            $result = sqlsrv_query($conn, $tsql, $params);
            if ($result == FALSE) die(print_r(sqlsrv_errors(), true)); // return false;            
            sqlsrv_free_stmt($result);  
            sqlsrv_close($conn); 
            return true;
        }  
        catch(Exception $e)  
        {  
            echo("Error!");  
        }  
    }
     
    function login($tsql, $params)  
    {  
        try  
        {
            $conn = self::OpenConnection();  
            $tsql;  
            $query = sqlsrv_query($conn, $tsql, $params);  

            if ($query == FALSE) die(print_r(sqlsrv_errors(), true));
            
            $result = Array();
            $i = 0;
            while( $row = sqlsrv_fetch_array( $query, SQLSRV_FETCH_ASSOC )) 
            {
                $result[$i] = $row;
                $i++;
            }
            
            sqlsrv_free_stmt($query);  
            sqlsrv_close($conn); 
            return $i > 0;
        }  
        catch(Exception $e)  
        {  
            echo("Error!");  
        }  
    }
     
    function save($tsql, $params)  
    {  
        try  
        {
            $conn = self::OpenConnection();  
            $tsql;  
            $result = sqlsrv_query($conn, $tsql, $params);
            if ($result == FALSE) die(print_r(sqlsrv_errors(), true)); // return false;
            //$result = sqlsrv_fetch_array($getNames, SQLSRV_FETCH_ASSOC);             
            sqlsrv_free_stmt($result);  
            sqlsrv_close($conn); 
            return true;
        }  
        catch(Exception $e)  
        {  
            echo("Error!");  
        }  
    }
     
    function ReadSingle($tsql)  
    {  
        try  
        {
            $conn = self::OpenConnection();  
            $tsql;  
            $getNames = sqlsrv_query($conn, $tsql);  

            if ($getNames == FALSE) die(print_r(sqlsrv_errors(), true));
            $result = sqlsrv_fetch_array($getNames, SQLSRV_FETCH_ASSOC);
            sqlsrv_free_stmt($getNames);  
            sqlsrv_close($conn); 
            return $result;
        }  
        catch(Exception $e)  
        {  
            echo("Error!");  
        }  
    }
     
    function ReadMany($tsql)  
    {  
        try  
        {
            $conn = self::OpenConnection();  
            $tsql;  
            $query = sqlsrv_query($conn, $tsql);  

            if ($query == FALSE) die(print_r(sqlsrv_errors(), true));
            
            $result = Array();
            $i = 0;
            while( $row = sqlsrv_fetch_array( $query, SQLSRV_FETCH_ASSOC )) 
            {
                $result[$i] = $row;
                $i++;
            }
            
            sqlsrv_free_stmt($query);  
            sqlsrv_close($conn); 
            return $result;
        }  
        catch(Exception $e)  
        {  
            echo("Error!");  
        }  
    } 
     
    function Schedules($tsql)  
    {  
        try  
        {
            $conn = self::OpenConnection();  
            $tsql;  
            $query = sqlsrv_query($conn, $tsql);  

            if ($query == FALSE) die(print_r(sqlsrv_errors(), true));
            
            $sched_res = Array();
            //$i = 0;
            while( $row = sqlsrv_fetch_array( $query, SQLSRV_FETCH_ASSOC )) 
            {
                $row['sdate'] = date("F d, Y h:i A",strtotime($row['start_datetime']->format('Y-m-d H:i:s')));
                $row['edate'] = date("F d, Y h:i A",strtotime($row['end_datetime']->format('Y-m-d H:i:s')));
                $sched_res[$row['id']] = $row;
                //$result[$i] = $row;
                //$i++;
            }
            
            sqlsrv_free_stmt($query);  
            sqlsrv_close($conn); 
            return $sched_res;
        }  
        catch(Exception $e)  
        {  
            echo("Error!");  
        }  
    } 
}
?>