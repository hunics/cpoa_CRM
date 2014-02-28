<?php
require_once("../Config/cfg.php");
/*
 *	Mysqli.php
 *	Extension of php's mysqli
 * 	PHP version 5
 */    

class Mysqli_model extends mysqli{

	function __construct(){                
            
            $conn =  new connectionData();
            parent::__construct($conn->DB_HOST, $conn->DB_user, $conn->DB_password, $conn->DB_Name);
            $this->set_charset("utf8");
                
            if (mysqli_error($this)){
			throw new Exception(mysqli_error($this), mysqli_errno($this));
            }
	}

        
        
        
	/*	run
	 *	Runs a query that returns no results (INSERT, UPDATE, etc...)
	 *
	 *	@param	string	Query to be executed
	 *
         * 	@return	boolean	True on success, false on failure
         */
	public function run($query){
		$result = parent::query($query);
		if (mysqli_error($this))
		{
			throw new Exception(mysqli_error($this), mysqli_errno($this));
		}
		return $result;
	}

	/*	getArray
	 *	Runs a query and returns the result as an array
	 *
	 *	@param	string	Query to be executed.
	 *
         * 	@return	array	Array with the results (Empty if no results).
         */
	public function getArray($query){
		$result = array();
		$rs = parent::query($query, MYSQLI_STORE_RESULT);
		if (mysqli_error($this))
		{
			throw new Exception(mysqli_error($this), mysqli_errno($this));
		}
		if (true == $rs)
		{
			while($row = $rs->fetch_assoc())
			{
				$result[] = $row;
			}
			$rs->free_result();
		}
		return $result;
	}

	/*	getRow
	 *	Runs a query and returns the first result row
	 *
	 *	@param	string	Query to be executed.
	 *
         * 	@return	array	Row with the results (Empty if no results).
         */
	public function getRow($query){
		$result = array();
		$rs = parent::query($query, MYSQLI_STORE_RESULT);
		if (mysqli_error($this))
		{
			throw new Exception(mysqli_error($this), mysqli_errno($this));
		}
		if (true == $rs)
		{
			$result = $rs->fetch_assoc();
			$rs->free_result();
		}
		return $result;
	}
	
	/*	getValue
	 *	Runs a query and returns the first result row
	 *
	 *	@param	string	Query to be executed.
	 *
         * 	@return	string	First value of the result query (Empty if no result).
         */
	public function getValue($query){
		$result = array();
		$rs = parent::query($query, MYSQLI_STORE_RESULT);
		if (mysqli_error($this))
		{
			throw new Exception(mysqli_error($this), mysqli_errno($this));
		}
		if (true == $rs)
		{
			$result = $rs->fetch_array(MYSQLI_NUM);
			$rs->free_result();
		}
		return $result[0];
	}
	
	public function freeResult($result){
		mysqli_free_result($result);
	}
}
