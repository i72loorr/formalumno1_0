<?php

require('includes/config.php');

class DBConnection {

	private $connection;
	private $actual_result;
	
	function __construct() {
		if (!isset($this->connection) || is_null($this->connection)){
			$this->connection = new mysqli(DB_HOST,DB_USER,DB_PASS,DB_NAME);
			if ($this->connection->connect_errno) {
				die("No se pudo conectar a " . DB_HOST);
			}
		}
	}
	
	function query($sql) {
		$this->actual_result = $this->connection->query($sql);
	}
	
	function getActualResult() {
		return $this->actual_result;
	}
	
	function getError() {
		return $this->connection->error;
	}
	
	function getNumRows() {
		if (isset($this->actual_result) || is_null($this->actual_result)) {
			return $this->actual_result->num_rows;
		}
		return 0;
	}
	
	function getRowAssoc($row_no) {
		if (isset($this->actual_result) || is_null($this->actual_result)) {
			$this->actual_result->data_seek($row_no);
			return $this->actual_result->fetch_assoc();
		}
		return NULL;
	}
}

?>