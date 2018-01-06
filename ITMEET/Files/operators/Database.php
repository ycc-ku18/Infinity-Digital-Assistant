<?php

//BASE CLASS
abstract class database_operations {
    public $database;

    public $error_message='';
    public $sql_statement='';
    public $last_id='';

    function __construct() {
        $this->ConnectDatabase();
    }

    abstract function ConnectDatabase();

    abstract function DisconnectDatabase();

    public function Execute_Query() {
        $bool_if_exec = strpos(strtoupper($this->sql_statement), strtoupper('Select'));
        try{
            if ($bool_if_exec === false){
                $tabledata = $this->database->exec($this->sql_statement);
            } else {
                $tabledata = $this->database->query($this->sql_statement);
            }
        } catch (PDOException $e){
                        $this->ErrorHandle(1);
                        $this->ErrorHandle($e->getMessage());
                        return false;
        }
        $this->sql_statement="";
        return $tabledata;
	}

    public function SELECT_STMT($TABLE_NAME, $CONDITION = "", $FIELD_NAME=array()){
        if (!isset($TABLE_NAME)){
            $this->ErrorHandle(3);
            return false;
        }

        $no_of_field = count($FIELD_NAME);
        $field = ($no_of_field<1)?"*":"";
        for ($count = 0; $count < $no_of_field; $count++){
            $field.=($count==($no_of_field-1))?$FIELD_NAME[$count]:($FIELD_NAME[$count].", ");
        }

        $this->SetSql("SELECT " . $field . " FROM " . $TABLE_NAME ." ". $CONDITION .";");
        return $this->Execute_Query();
    }

    public function INSERT_STMT($TABLE_NAME, $FIELD_VALUES=false){
        if (!isset($TABLE_NAME)){
            $this->ErrorHandle(3);
            return false;
        }
        //check if the $FIELD_NAME array is multidimensional or not if not throws error
        if (count($FIELD_VALUES) === count($FIELD_VALUES, COUNT_RECURSIVE)){
            $this->ErrorHandle(4);
            return false;
        }
        $this->sql_statement="";
        $FIELD_NAME = array();
        foreach ($FIELD_VALUES as $array){
                $field = "(";
                $bindfield = "(";
                $no = 0;
                foreach ($array as $key=>$value){
                    $FIELD_NAME[$no] = $key;
                    $no += 1;
                }
                $no_of_field = count($FIELD_NAME);
                for ($count = 0; $count < $no_of_field; $count++){
                    $field.=($count==($no_of_field-1))?$FIELD_NAME[$count].")":($FIELD_NAME[$count].", ");
                    $bindfield.=($count==($no_of_field-1))?":".$FIELD_NAME[$count].")":(":".$FIELD_NAME[$count].", ");
                }
            break;
        }
        $this->SetSql("INSERT INTO " . $TABLE_NAME . " " . $field. " VALUES " . $bindfield . ";");
        try{
            $stmt = $this->database->prepare($this->sql_statement);
            $VALUES_ARRAY=array();
            $no = 0;
            foreach ($FIELD_NAME as $bindparam){
                $bindparam=":".$bindparam;
                $stmt->bindParam($bindparam,$VALUES_ARRAY[$no]);
                $no +=1;
                $bindparam="";
            }
            foreach ($FIELD_VALUES as $array){
                $no = 0;
                foreach ($array as $key=>$value){
                    $VALUES_ARRAY[$no]=$value;
                    $no+=1;
                }
                $stmt->execute();
            }
        }
        catch(PDOException $e){
                        $this->ErrorHandle(1);
                        $this->ErrorHandle($e->getMessage());
                        return false;
        }
        $this->last_id = $this->database->lastInsertId();
        return true;
    }

    public function START_TRANSCTIION(){
        $this->database->beginTransaction();
    }
    public function COMMIT_TRANSCTIION(){
        $this->database->commit();
    }
    public function UPDATE_STMT($TABLE_NAME="", $SET, $CONDITION){
        if (!isset($TABLE_NAME)){
            $this->ErrorHandle(3);
            return false;
        }
        if (!isset($CONDITION)){
            $this->ErrorHandle(5);
            return false;
        }
        $this->SetSql("UPDATE ".$TABLE_NAME." SET ".$SET." WHERE ".$CONDITION);
        $this->Execute_Query();
        return true;

    }

    public function SetSql($SQL=''){
        $this->sql_statement = $SQL;
    }


    function __destruct(){
        $this->DisconnectDatabase();
    }

//Errors Start---------------------------------------
	function error_message(){
        	if(empty($this->error_message)){
            		return '';
        	} else {
        		$error_message = nl2br(htmlentities($this->error_message));
        		return $error_message;
		}
    	}


    function error_no($error_nos){
        $error [0] = "Database loading failed!";
        $error [1] = "Error in executing Query!";
        $error [2] = "Error in selecting Database!";
        $error [3] = "Error in SQL Query";
        $error [4] = "Field and values in Insert Statement is invalid (Field and values must be multidimensional)";
        $error [5] = "WHERE condition in UPDATE is invalid";
        return $error [$error_nos];
    }

    function ErrorHandle($error){
        if(is_int($error))
            $this->error_message .= $this->error_no($error)."\r\n";
        else
            $this->error_message .= $error."\r\n";
    }
//Errors Ends---------------------------------------

}



class sql_database extends database_operations{

    public function ConnectDatabase() {
	//Connects Database
        try{
            $this->database = new PDO("mysql:host=".SQL_HOST.";dbname=".SQL_DATABASE, SQL_USERNAME, SQL_PASSWORD);
            $this->database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->database->setAttribute(PDO::ATTR_CASE, PDO::CASE_UPPER);
            $this->database->setAttribute(PDO::ATTR_ORACLE_NULLS, PDO::NULL_TO_STRING);
        } catch (PDOException $e) {
            $this->ErrorHandle(0);
            $this->ErrorHandle($e->getMessage());
        }
		return $this->database;
	}


	public function DisconnectDatabase(){
	     $this->database=null;
	}


}


function database (){
    switch ($GLOBALS['database_system']){
        case 1:
            $database= new sqlite3_database;
            break;
        case 2:
            $database= new sqlite_database;
            break;
        case 3:
            $database= new sql_database;
            break;
       /* case 12:
            $database= new sqlite3_database;
            break;
            */
        default:
            $database = new sqlite3_database;
            break;
    }
    return $database;
}
?>
