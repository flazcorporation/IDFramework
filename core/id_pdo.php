<?php
if(count(get_included_files()) ==1)exit("<meta http-equiv='refresh' content='0;url="."http://".$_SERVER['SERVER_NAME']."'>");
/* ==================================================================================================
   --------------------------------------------------------------------------------------------------
                                              PDO DATABASE
   --------------------------------------------------------------------------------------------------
   ================================================================================================== */

class database
{

	protected $database='';
	public $db;
	
	public function __toString()
	{
	    return (string)$this->database;
	}

	/*
	private $driver 	= driver;
    private $host      	= host;
    private $user      	= userdb;
    private $pass      	= pass;
	private $dbname    	= db;
	*/
    private $dbh;
    public $error;

	public $stmt;

	public function __construct()
	{
		
		require_once "config/id_db.php";
		$this->db 		= new id_db();
		
        $dsn = $this->db->driver.':host=' . $this->db->host . ';dbname=' . $this->db->name;
        $options = array(
            PDO::ATTR_PERSISTENT    => true,
            PDO::ATTR_ERRMODE       => PDO::ERRMODE_EXCEPTION
			//PDO::MYSQL_ATTR_USE_BUFFERED_QUERY => true
        );
		try
		{
            $this->dbh = new PDO($dsn, $this->db->user, $this->db->pass, $options);
        }
		catch(PDOException $e)
		{
            $this->error = $e->getMessage();
        }
    }
    
	public function db()
	{
		$this->db 	= new id_db();  		
  	}

	public function query($query)
	{
	    $this->stmt = $this->dbh->prepare($query);
	}

	public function bind($param, $value, $type = null)
	{
		if (is_null($type))
		{
			switch (true)
			{
	            case is_int($value):
	                $type = PDO::PARAM_INT;
	                break;
	            case is_bool($value):
	                $type = PDO::PARAM_BOOL;
	                break;
	            case is_null($value):
	                $type = PDO::PARAM_NULL;
	                break;
	            default:
	                $type = PDO::PARAM_STR;
	        }
	    }
	    $this->stmt->bindValue($param, $value, $type);
	}

	public function execute()
	{
//		return $this->stmt->execute();
		$hasil =  $this->stmt->execute();
		return $hasil;
	}

	public function closecursor()
	{
		$this->stmt->closeCursor();
	}

	public function resultset()
	{
		$this->closecursor();
	    $this->execute();
	    return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
	}

	public function resultrow()
	{
		$this->closecursor();
		$this->execute();
	    return $this->stmt->fetchAll();
	}

	public function single()
	{
		$this->closecursor();
	    $this->execute();
	    return $this->stmt->fetch(PDO::FETCH_ASSOC);
	}

	public function column()
	{
		$this->closecursor();
	    $this->execute();
	    return $this->stmt->fetchColumn();
	}

	public function count()
	{
	    return $this->stmt->rowCount();
	}
	
	public function lastid()
	{
	    return $this->dbh->lastInsertId();
	}

	public function begin()
	{
		//$this->dbh->setAttribute(PDO::ATTR_AUTOCOMMIT, FALSE);
		return $this->dbh->beginTransaction();
	}

	public function end()
	{
		//$this->dbh->setAttribute(PDO::ATTR_AUTOCOMMIT, TRUE);
	    return $this->dbh->commit();
	}

	public function cancel()
	{
	    return $this->dbh->rollBack();
	}

	public function debug()
	{
	    return $this->stmt->debugDumpParams();
	}	
}

/* ==================================================================================================
   --------------------------------------------------------------------------------------------------
                                              PDO DATABASE
   --------------------------------------------------------------------------------------------------
   ================================================================================================== */

/* ==================================================================================================
   --------------------------------------------------------------------------------------------------
                                              PDO FUNCTION
   --------------------------------------------------------------------------------------------------
   ================================================================================================== */

class id_pdo extends id
{
    
	public function __construct()
	{

    }

	public function array_key($ar)
	{
		foreach($ar as $k => $v)
		{
			if($v!==NULL)
			{
                $key[] = "`".$k."`";
            }
        }
        return $key;
    }

	public function array_prepare($ar)
	{
		foreach($ar as $k => $v)
		{
			if($v!==NULL)
			{
                $key[] = ":".$k;
            }
        }
        return $key;
    }

	public function data_update($ar)
	{
		foreach($ar as $k => $v)
		{
			if($v!==NULL)
			{
                $val[] = "`".$k."`"."="." :".$k."";
            }
        }
        return $val;
	}
	
	public function array_field($ar)
	{
		$before 	= 	"(";
		$after 		= 	")";
		$key 		= 	array();
		foreach($ar as $val)
		{
			if($val!==NULL)
			{
				if(strpos($val,"(") !== false && strpos($val,")") !== false)
				{
					$fun 	= strbefore($val,$before);
					$fun1	= trim($fun);
						if($fun1 !==NULL)
						{
							$str 	= "";
							$fnc 		= 	"";
							$alias 		= 	"";
							if($fun1=='min' || $fun1=='MIN' || $fun1=='Min')
							{
								$as 		= strafter($val,$after);
								if($as !="")
								{
									$as1 	= trim($as);
									$as2 	= substr($as1,0,2);
									$as3	= trim($as2);
									if($as3!="")
									{
										$alias 	= $as3;
									}else{
										$alias 	= "min";
									}
									$fnc 	= "min";
								}
							}elseif($fun1=='max' || $fun1=='MAX' || $fun1=='Max'){
								$as 		= strafter($val,$after);
								if($as !="")
								{
									$as1 	= trim($as);
									$as2 	= substr($as1,0,2);
									$as3	= trim($as2);
									if($as3!="")
									{
										$alias 	= $as3;
									}else{
										$alias 	= "max";
									}
									$fnc 	= "max";
								}
							}elseif($fun1=='avg' || $fun1=='AVG' || $fun1=='Avg'){
								$as 		= strafter($val,$after);
								if($as !="")
								{
									$as1 	= trim($as);
									$as2 	= substr($as1,0,2);
									$as3	= trim($as2);
									if($as3!="")
									{
										$alias 	= $as3;
									}else{
										$alias 	= "avg";
									}
									$fnc 	= "avg";
								}
							}elseif($fun1=='sum' || $fun1=='SUM' || $fun1=='Sum'){
								$as 		= strafter($val,$after);
								if($as !="")
								{
									$as1 	= trim($as);
									$as2 	= substr($as1,0,2);
									$as3	= trim($as2);
									if($as3!="")
									{
										$alias 	= $as3;
									}else{
										$alias 	= "sum";
									}
									$fnc 	= "sum";
								}
							}elseif($fun1=='count' || $fun1=='COUNT' || $fun1=='Count'){
								$as 		= strafter($val,$after);
								if($as !="")
								{
									$as1 	= trim($as);
									$as2 	= substr($as1,0,2);
									$as3	= trim($as2);
									if($as3!="")
									{
											$alias 	= $as3;
									}else{
										$alias 	= "count";
									}
									$fnc 	= "count";
								}
							}else{
					               $key[] = "`".$val."`";
							}
							$str   	= strbetween($val,$before,$after);
				            $key[] 	= $fnc."(`".$str."`) AS ".$alias;
				            return $key;
						}
				}else{
				    $key[] 	= "`".$val."`";
				}
            }
        }
        return $key;
    }

	public function connect()
	{
		$database = new database();
		return $database;    	
    }

	public function close()
	{
		$database = null;
		return $database;
    }

	public function create($table,$var)
	{
		$database = $this->connect();
	    $key		= $this->array_key($var);
	    $prepare	= $this->array_prepare($var);
		$table1 	= "`".$table."`";
		$field1		= implode(",",$key);
		$prepare1	= implode(",",$prepare);
		$sql 		= "INSERT INTO $table1 ($field1) VALUES($prepare1)";
		$database->begin();
		try{
			$database->query($sql);
			foreach ($var as $key => $value)
			{
				$field 	= ":".$key;
				$val 	= $value;
				$database->bind($field,$val);
			}
			$status = $database->execute();
			if($status)
			{
				$id =  $database->lastid();
				$database->end();
				return $id;
			}else{
				return FALSE;
			}
		}catch(PDOException $e)
		{
			$database->cancel();
	        $database->error = $e->getMessage();
	        return FALSE;
		}
		$this->close();
	}


	public function create_transaction($database,$table,$var)
	{
	    $key		= $this->array_key($var);
	    $prepare	= $this->array_prepare($var);
		$table1 	= "`".$table."`";
		$field1		= implode(",",$key);
		$prepare1	= implode(",",$prepare);
		$sql 		= "INSERT INTO $table1 ($field1) VALUES($prepare1)";
		$database->query($sql);
		foreach ($var as $key => $value)
		{
			$field 	= ":".$key;
			$val 	= $value;
			$database->bind($field,$val);
		}
		$status = $database->execute();
		if($status)
		{
			return $database->lastid();
		}else{
			return FALSE;
		}
	}

	public function update($table, $var, $cond, $val)
	{
		$database = $this->connect();
	    $data		= $this->data_update($var);
		$table1 	= "`".$table."`";
		$cond1 		= "`".$cond."`";
		$prepare 	= ":".$cond;
		$val1 		= $val;
		$field		= implode(",",$data);
		$sql		= "UPDATE $table1 SET $field WHERE $cond1 = $prepare";
		//var_dump($sql);
		$database->begin();
		try{
			$database->query($sql);
			foreach ($var as $key => $value)
			{
				$field 	= ":".$key;
				$val 	= $value;
				$database->bind($field,$val);
				//echo "<br />".$field." => ".$val;
			}
			$database->bind($prepare,$val1);
			//echo "<br />".$prepare." => ".$val1;
			$status = $database->execute();
			if($status)
			{
				$database->end();
				return TRUE;
			}else{
				return FALSE;
			}
		}catch(PDOException $e){
			$database->cancel();
	        $database->error = $e->getMessage();
	        //echo $database->error;
	        return FALSE;
		}
		$this->close();
	}

	public function update_transaction($database, $table, $var, $cond, $val)
	{
	    $data		= $this->data_update($var);
		$table1 	= "`".$table."`";
		$cond1 		= "`".$cond."`";
		$prepare 	= ":".$cond;
		$val1 		= $val;
		$field		= implode(",",$data);
		$sql		= "UPDATE $table1 SET $field WHERE $cond1 = $prepare";
		$database->query($sql);
		foreach ($var as $key => $value)
		{
			$field 	= ":".$key;
			$val 	= $value;
			$database->bind($field,$val);
		}
		$database->bind($prepare,$val1);
		$status = $database->execute();
		if($status)
		{
			return TRUE;
		}else{
			return FALSE;
		}
	}

	public function delete($table,$cond,$val)
	{
		$database = $this->connect();
		$table1 	= "`".$table."`";
		$cond1 		= "`".$cond."`";
		$prepare 	= ":".$cond;
		$val 		= $val;
		$sql		= "DELETE FROM $table1 WHERE $cond1 = $prepare";
		$database->begin();
		try{
			$database->query($sql);
			$database->bind($prepare,$val);
			$status = $database->execute();
			if($status)
			{
				$database->end();
				return TRUE;
			}else{
				return FALSE;
			}
		}catch(PDOException $e){
			$database->cancel();
	        $database->error = $e->getMessage();
	        echo $database->error;
	        return FALSE;
		}
		$this->close();		
	}

	public function delete_transaction($database,$table,$cond,$val)
	{
		$table1 	= "`".$table."`";
		$cond1 		= "`".$cond."`";
		$prepare 	= ":".$cond;
		$val 		= $val;
		$sql		= "DELETE FROM $table1 WHERE $cond1 = $prepare";
		$database->query($sql);
		$database->bind($prepare,$val);
		$result = $database->execute();
		if($status)
		{
			return TRUE;
		}else{
			return FALSE;
		}
	}

	public function select_query($query,$attr)
	{
		$database = $this->connect();
		$sql		= $query;
		$database->begin();
		try{
			$database->query($sql);
			foreach ($attr as $key => $value)
			{
				$field 	= ":".$key;
				$val 	= $value;
				$database->bind($field,$val);
			}
			$status = $database->execute();
			if($status)
			{
				$exe = $database->resultset();
				$database->end();
				return $exe;
			}else{
				return FALSE;
			}
		}catch(PDOException $e){
			$database->cancel();
	        $database->error = $e->getMessage();
	        //echo $database->error;
	        return FALSE;
		}
		$this->close();
	}

	public function select_query_transaction($database,$query,$attr)
	{
		$sql		= $query;
		$database->query($sql);
		foreach ($attr as $key => $value)
		{
			$field 	= ":".$key;
			$val 	= $value;
			$database->bind($field,$val);
		}
		$status = $database->execute();
		$exe = $database->resultset();
		if($status)
		{
			return $exe;
		}else{
			return FALSE;
		}
	}

	public function select_query_row($query,$attr)
	{
		$database = $this->connect();
		$sql		= $query;
		$database->begin();
		try{
			$database->query($sql);
			foreach ($attr as $key => $value)
			{
				$field 	= ":".$key;
				$val 	= $value;
				$database->bind($field,$val);
			}
			$status = $database->execute();
			if($status)
			{
				$exe = $database->resultrow();
				$database->end();
				return $exe;
			}else{
				return FALSE;
			}
		}catch(PDOException $e){
			$database->cancel();
	        $database->error = $e->getMessage();
	        return FALSE;
		}
		$this->close();		
	}

	public function select_query_row_transaction($database,$query,$attr)
	{
		$sql		= $query;
		$database->query($sql);
		foreach ($attr as $key => $value)
		{
			$field 	= ":".$key;
			$val 	= $value;
			$database->bind($field,$val);
		}
		$status = $database->execute();
		$exe = $database->resultrow();
		if($status)
		{
			return $exe;
		}else{
			return FALSE;
		}
	}

	public function select_query_result($query,$attr)
	{
		$database = $this->connect();
		$sql		= $query;
		$database->begin();
		try{
			$database->query($sql);
			foreach ($attr as $key => $value)
			{
				$field 	= ":".$key;
				$val 	= $value;
				$database->bind($field,$val);
			}
			$status = $database->execute();
			if($status)
			{
				$exe = $database->single();
				$database->end();
				return $exe;
			}else{
				return FALSE;
			}
		}catch(PDOException $e){
			$database->cancel();
	        $database->error = $e->getMessage();
	        return $database->error;
	        //return FALSE;
		}
		$this->close();		
	}

	public function select_query_result_transaction($database,$query,$attr)
	{
		$sql		= $query;
		$database->query($sql);
		foreach ($attr as $key => $value)
		{
			$field 	= ":".$key;
			$val 	= $value;
			$database->bind($field,$val);
		}
		$status = $database->execute();
		$exe = $database->single();
		if($status)
		{
			return $exe;
		}else{
			return FALSE;
		}
	}

	public function select_query_field_string_where($query,$attr)
	{
		$database = $this->connect();
		$sql		= $query;
		$database->begin();
		try{
			$database->query($sql);
			foreach ($attr as $key => $value)
			{
				$field 	= ":".$key;
				$val 	= $value;
				$database->bind($field,$val);
			}
			$status = $database->execute();
			if($status)
			{
				$exe = $database->column();
				$database->end();
				return $exe[0];
			}else{
				return FALSE;
			}
		}catch(PDOException $e){
			$database->cancel();
	        $database->error = $e->getMessage();
	        return FALSE;
		}
		$this->close();		
	}

	public function select_query_field_string_where_transaction($database,$query,$attr)
	{
		$sql		= $query;
		$database->query($sql);
		foreach ($attr as $key => $value)
		{
			$field 	= ":".$key;
			$val 	= $value;
			$database->bind($field,$val);
		}
		$status 	= $database->execute();
		$exe 		= $database->column();
		if($status)
		{
			return $exe[0];
		}else{
			return FALSE;
		}
	}

	public function select_all($table)
	{
		$database = $this->connect();
		$sql		= "SELECT * FROM $table";
		$database->query($sql);
		$database->begin();
		try{
			$database->query($sql);
			$status = $database->execute();
			if($status)
			{
				$exe = $database->resultset();
				$database->end();
				return $exe;
			}else{
				return FALSE;
			}
		}catch(PDOException $e){
			$database->cancel();
	        $database->error = $e->getMessage();
	        return FALSE;
		}
		$this->close();		
	}   

	public function select_all_transaction($database,$table)
	{
		$sql		= "SELECT * FROM $table";
		$database->query($sql);
		$status = $database->execute();
		$exe = $database->resultset();
		if($status)
		{
			return $exe;
		}else{
			return FALSE;
		}
	}   

	public function select_query_result_json($query,$attr)
	{
		$database 	= $this->connect();
		$sql		= $query;
		$database->begin();
		$database->query($sql);
		try{
			$database->query($sql);
			foreach ($attr as $key => $value)
			{
				$field 	= ":".$key;
				$val 	= $value;
				$database->bind($field,$val);
			}
			$status = $database->execute();
			if($status)
			{
				$exe = $database->single();
				$database->end();
				return $exe;
			}else{
				return FALSE;
			}
		}catch(PDOException $e){
			$database->cancel();
	        $database->error = $e->getMessage();
	        return FALSE;
		}
		$this->close();
	}

	public function select_query_result_json_transaction($database,$query,$attr)
	{
		$sql		= $query;
		$database->query($sql);
		foreach ($attr as $key => $value)
		{
			$field 	= ":".$key;
			$val 	= $value;
			$database->bind($field,$val);
		}
		$status = $database->execute();
		$exe = $database->single();
		if($status)
		{
			return $exe;
		}else{
			return FALSE;
		}
	}

	public function select_all_where_array_result($table,$cond,$val)
	{
		$database = $this->connect();
		$table1 	= "`".$table."`";
		$cond1 		= "`".$cond."`";
		$prepare 	= ":".$cond;
		$val1 		= $val;
		$sql		= "SELECT * FROM $table1 WHERE $cond1 = $prepare";
		$database->begin();
		try{
			$database->query($sql);
			$database->bind($prepare,$val1);
			$status = $database->execute();
			if($status)
			{
				$exe = $database->single();
				$database->end();
				return $exe;
			}else{
				return FALSE;
			}
		}catch(PDOException $e){
			$database->cancel();
	        $database->error = $e->getMessage();
	        return FALSE;
		}
		$this->close();		
	}

	public function select_all_where_array_result_transaction($database,$table,$cond,$val)
	{
		$table1 	= "`".$table."`";
		$cond1 		= "`".$cond."`";
		$prepare 	= ":".$cond;
		$val1 		= $val;
		$sql		= "SELECT * FROM $table1 WHERE $cond1 = $prepare";
		$database->query($sql);
		$database->bind($prepare,$val1);
		$status = $database->execute();
		$exe = $database->single();
		if($status)
		{
			return $exe;
		}else{
			return FALSE;
		}
	}

	public function select_all_where_result($table,$cond,$val)
	{
		$database = $this->connect();
		$table1 	= "`".$table."`";
		$cond1 		= "`".$cond."`";
		$prepare 	= ":".$cond;
		$val1 		= $val;
		$sql		= "SELECT * FROM $table1 WHERE $cond1 = $prepare";
		$database->begin();
		try{
			$database->query($sql);
			$database->bind($prepare,$val1);
			$status = $database->execute();
			if($status)
			{
				$exe = $database->single();
				$database->end();
				return $exe;
			}else{
				return FALSE;
			}
		}catch(PDOException $e){
			$database->cancel();
	        $database->error = $e->getMessage();
	        return FALSE;
		}
		$this->close();
	}

	public function select_all_where_result_transaction($database,$table,$cond,$val)
	{
		$table1 	= "`".$table."`";
		$cond1 		= "`".$cond."`";
		$prepare 	= ":".$cond;
		$val1 		= $val;
		$sql		= "SELECT * FROM $table1 WHERE $cond1 = $prepare";
		$database->query($sql);
		$database->bind($prepare,$val1);
		$status = $database->execute();
		$exe = $database->single();
		if($status)
		{
			return $exe;
		}else{
			return FALSE;
		}
	}

	public function select_field_where_result($table,$field,$cond,$val)
	{
		$database = $this->connect();
		$table1 	= "`".$table."`";
		$field1 	= "`".$field."`";
		$cond1 		= "`".$cond."`";
		$prepare 	= ":".$cond;
		$val1 		= $val;
		$sql		= "SELECT $field1 FROM $table1 WHERE $cond1 = $prepare";
//		var_dump($sql);
		$database->begin();
		try{
			$database->query($sql);
			$database->bind($prepare,$val1);
			$status = $database->execute();
			if($status)
			{
				$exe = $database->single();
				$database->end();
//				var_dump($exe);
				return $exe;
			}else{
				return FALSE;
			}
		}catch(PDOException $e){
			$database->cancel();
	        $database->error = $e->getMessage();
	        return FALSE;
		}
		$this->close();		
	}

	public function select_field_where_result_transaction($database,$table,$field,$cond,$val)
	{
		$field1 	= "`".$field."`";
		$cond1 		= "`".$cond."`";
		$prepare 	= ":".$cond;
		$val1 		= $val;
		$sql		= "SELECT $field1 FROM $table1 WHERE $cond1 = $prepare";
		$database->query($sql);
		$database->bind($prepare,$val1);
		$status = $database->execute();
		$exe = $database->single();
		if($status)
		{
			return $exe;
		}else{
			return FALSE;
		}
	}

	public function select_fields_where($table,$field,$cond,$val)
	{
		$database = $this->connect();
		$table1 	= "`".$table."`";
		$field1 	= $this->array_field($field);
		$field2		= implode(",",$field1);
		$cond1 		= "`".$cond."`";
		$prepare 	= ":".$cond;
		$val1 		= $val;
		$sql		= "SELECT $field2 FROM $table1 WHERE $cond1 = $prepare";
		$database->begin();
		try{
			$database->query($sql);
			$database->bind($prepare,$val1);
			$status = $database->execute();
			if($status)
			{
				$exe = $database->resultset();
				$database->end();
				return $exe;
			}else{
				return FALSE;
			}
		}catch(PDOException $e){
			$database->cancel();
	        $database->error = $e->getMessage();
	        return FALSE;
		}
		$this->close();		
	}

	public function select_fields_where_transaction($database,$table,$field,$cond,$val)
	{
		$table1 	= "`".$table."`";
		$field1 	= $this->array_field($field);
		$field2		= implode(",",$field1);
		$cond1 		= "`".$cond."`";
		$prepare 	= ":".$cond;
		$val1 		= $val;
		$sql		= "SELECT $field2 FROM $table1 WHERE $cond1 = $prepare";
		$database->query($sql);
		$database->bind($prepare,$val1);
		$status = $database->execute();
		$exe = $database->resultset();
		if($status)
		{
			return $exe;
		}else{
			return FALSE;
		}
	}

	public function select_field_table($table,$field)
	{
		$database = $this->connect();
		$table1 	= "`".$table."`";
		$field1 	= $this->array_field($field);
		$field2		= implode(",",$field1);
		$sql		= "SELECT $field2 FROM $table1";
		$database->begin();
		try{
			$database->query($sql);
			$status = $database->execute();
			if($status)
			{
				$exe = $database->resultset();
				$database->end();
				return $exe;
			}else{
				return FALSE;
			}
		}catch(PDOException $e){
			$database->cancel();
	        $database->error = $e->getMessage();
	        return FALSE;
		}
		$this->close();		
	}

	public function select_field_table_transaction($database,$table,$field)
	{
		$table1 	= "`".$table."`";
		$field1 	= $this->array_field($field);
		$field2		= implode(",",$field1);
		$sql		= "SELECT $field2 FROM $table1";
		$database->query($sql);
		$status = $database->execute();
		$exe = $database->resultset();
		if($status)
		{
			return $exe;
		}else{
			return FALSE;
		}
	}

	public function select_field_where_string($table,$field,$cond,$val)
	{
		$database = $this->connect();
		$table1 	= "`".$table."`";
		$field1 	= "`".$field."`";
		$cond1 		= "`".$cond."`";
		$prepare 	= ":".$cond;
		$val1 		= $val;
		$sql		= "SELECT $field1 FROM $table1 WHERE $cond1 = $prepare";
		$database->begin();
		try{
			$database->query($sql);
			$database->bind($prepare,$val1);
			$status = $database->execute();
			if($status)
			{
				$exe = $database->single();
				$database->end();
				return $exe[$field];
			}else{
				return FALSE;
			}
		}catch(PDOException $e){
			$database->cancel();
	        $database->error = $e->getMessage();
	        return FALSE;
		}
		$this->close();
	}

	public function select_field_where_string_transaction($database,$table,$field,$cond,$val)
	{
		$table1 	= "`".$table."`";
		$field1 	= "`".$field."`";
		$cond1 		= "`".$cond."`";
		$prepare 	= ":".$cond;
		$val1 		= $val;
		$sql		= "SELECT $field1 FROM $table1 WHERE $cond1 = $prepare";
		$database->query($sql);
		$database->bind($prepare,$val1);
		$status = $database->execute();
		$exe = $database->single();
		if($status)
		{
			return $exe[$field];
		}else{
			return FALSE;
		}
	}

	public function select_all_where($table,$cond,$val)
	{
		$database = $this->connect();
		$table1 	= "`".$table."`";
		$cond1 		= "`".$cond."`";
		$prepare 	= ":".$cond;
		$val1 		= $val;		
		$sql		= "SELECT * FROM $table1 WHERE $cond1 = $prepare";
		$database->begin();
		try{
			$database->query($sql);
			$database->bind($prepare,$val1);
			$status = $database->execute();
			if($status)
			{
				$exe = $database->resultset();
				$database->end();
				return $exe;
			}else{
				return FALSE;
			}
		}catch(PDOException $e){
			$database->cancel();
	        $database->error = $e->getMessage();
	        return FALSE;
		}
		$this->close();
	}
	
	public function select_all_where_transaction($database,$table,$cond,$val)
	{
		$table1 	= "`".$table."`";
		$cond1 		= "`".$cond."`";
		$prepare 	= ":".$cond;
		$val1 		= $val;		
		$sql		= "SELECT * FROM $table1 WHERE $cond1 = $prepare";
		$database->query($sql);
		$database->bind($prepare,$val1);
		$status = $database->execute();
		$exe = $database->resultset();
		if($status)
		{
			return $exe;
		}else{
			return FALSE;
		}
	}

	public function query($query)
	{
		$database 	= $this->connect();
		$sql 		= $query;
		$database->begin();
		try{
			$database->query($sql);
			$status = $database->execute();
			if($status)
			{
				$exe = $database->resultrow();
				$database->end();
				return $exe;
			}else{
				return FALSE;
			}
		}catch(PDOException $e){
			$database->cancel();
	        $database->error = $e->getMessage();
	        return FALSE;
		}
		$this->close();
	}

	public function query_result($query)
	{
		$database = $this->connect();
		$sql		= $query;
		$database->begin();
		try{
			$database->query($sql);
			$status = $database->execute();
			if($status)
			{
				$exe = $database->single();
				$database->end();
				return $exe;
			}else{
				return FALSE;
			}
		}catch(PDOException $e){
			$database->cancel();
	        $database->error = $e->getMessage();
	        echo $database->error;
	        return FALSE;
		}
		$this->close();		
	}

	public function query_result_prepare($query,$attr)
	{
		$database = $this->connect();
		$sql		= $query;
		$database->begin();
		try{
			$database->query($sql);
			foreach ($attr as $key => $value) {
				$field 	= ":".$key;
				$val 	= $value;
				$database->bind($field,$val);
			}
			$status = $database->execute();
			if($status)
			{
				$exe = $database->single();
				$database->end();
				return $exe;
			}else{
				return FALSE;
			}
		}catch(PDOException $e){
			$database->cancel();
	        $database->error = $e->getMessage();
	        echo $database->error;
	        return FALSE;
		}
		$this->close();		
	}

	public function query_array($query)
	{
		$database 	= $this->connect();
		$sql 		= $query;
		$database->begin();
		try{
			$database->query($sql);
			$status = $database->execute();
			if($status)
			{
				$exe = $database->resultset();
				$database->end();
				return $exe;
			}else{
				return FALSE;
			}
		}catch(PDOException $e){
			$database->cancel();
	        $database->error = $e->getMessage();
	        return FALSE;
		}
		$this->close();
	}

	public function query_array_prepare($query,$attr)
	{
		$database = $this->connect();
		$sql		= $query;
		$database->begin();
		try{
			$database->query($sql);
			foreach ($attr as $key => $value) {
				$field 	= ":".$key;
				$val 	= $value;
				$database->bind($field,$val);
			}
			$status = $database->execute();
			if($status)
			{
				$exe = $database->resultset();
				$database->end();
				return $exe;
			}else{
				return FALSE;
			}
		}catch(PDOException $e){
			$database->cancel();
	        $database->error = $e->getMessage();
	        return FALSE;
		}
		$this->close();		
	}

	public function query_transaction($database,$query)
	{
		$database->query($query);
		$status = $database->execute();
		$exe = $database->resultrow();
		if($status)
		{
			return $exe;
		}else{
			return FALSE;
		}
	}

	public function install_table($query)
	{
		$database = $this->connect();
		$sql 		= $query;
		$database->begin();
		try{
			$database->query($sql);
			$status = $database->execute();
			if($status)
			{
				$database->end();
				return TRUE;
			}else{
				return FALSE;
			}
		}catch(PDOException $e){
			$database->cancel();
	        $database->error = $e->getMessage();
	        return FALSE;
		}
		$this->close();
	}

	public function install_table_transaction($database,$query)
	{
		$sql 		= $query;
		try{
			$database->begin();
			$database->query($sql);
			$status = $database->execute();
			if($status)
			{
				$database->end();
				return TRUE;
			}else{
				return FALSE;
			}
		}catch(PDOException $e){
			$database->cancel();
	        $this->error = $e->getMessage();
	        return FALSE;
		}
	}
}
?>