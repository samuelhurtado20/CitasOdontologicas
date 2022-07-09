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

     
    function ReadData($tsql)  
    {  
        try  
        {
            $conn = self::OpenConnection();  
            $tsql;  
            $getNames = sqlsrv_query($conn, $tsql);  

            if ($getNames == FALSE) die(print_r(sqlsrv_errors(), true));

            $productCount = 0;  
            while($row = sqlsrv_fetch_array($getNames, SQLSRV_FETCH_ASSOC))  
            {  
                echo($row['nombre']);  
                echo("<br/>");  
                $productCount++;  
            }  
            sqlsrv_free_stmt($getNames);  
            sqlsrv_close($conn); 

        }  
        catch(Exception $e)  
        {  
            echo("Error!");  
        }  
    } 
}
?>