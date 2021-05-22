<?php 
class DatabaseTable{ //database table class created
	public $table;  //table is created and made public in global	
	public function __construct($table){ //constructor created
		$this->table = $table; //table is created with this operator
	}
	function save($record, $pk = ''){// function save has been created
	    try{ //try block used
	        $this->insert($record); //inserting the record
	    } 
	    catch(Exception $e){ //catch block has been used
	        $this->update($record, $pk); //updating the record and primary key
	    }
	}
	function insert($record) { //inserting the record
	    global $pdo; // pdo is made global
	    $keys = array_keys($record); //keys for array to use records
	    $keysWC = implode(', ', $keys); //imploding
	    $keysWCAC = implode(', :', $keys); // imploding the keys
	    $query = "INSERT INTO $this->table($keysWC) VALUES(:$keysWCAC)"; //inserting the query
	    $stmt = $pdo->prepare($query); //preparing the query
	    $stmt->execute($record); //executing the record
	}
	function update($record, $pk){ //creating the update function 
	    global $pdo; //global for pdo
	    $para = []; //parameter under the big bracket
	    foreach ($record as $key => $value) { //for each is used
	        $para[] = $key . ' = :' . $key; //parameter
	    } 
	    $paraList = implode(', ', $para); //parameter for list
	    $query = "UPDATE $this->table SET $paraList WHERE $pk = :pk"; //primary key update
	    $record['pk'] = $record[$pk]; //recording the pk 
	    $stmt = $pdo->prepare($query); //opreparing query using pdo
	    $stmt->execute($record); //executing the record
	}
	function find($field, $value) { //function find is created
	    global $pdo; //pdo made global
	    $stmt = $pdo->prepare("SELECT * FROM $this->table WHERE $field = :value"); //selecting from table
	    $criteria = [ //criteria array
	            'value' => $value //value 
	    ];
	    $stmt->execute($criteria); //criteria execute
	    return $stmt; //return stme
	} 
	function findAll() { //function made findall 
	    global $pdo; //pdo made global
 	    $stmt = $pdo->prepare("SELECT * FROM $this->table"); //selecting from table
	    $stmt->execute(); //executing the statement
	    return $stmt;
	}
	function delete($field, $value) { //functiion delete has been used
	    global $pdo; //gloabl pdo
	    $stmt = $pdo->prepare("DELETE FROM $this->table WHERE $field = :value"); //deleting form table
	    $criteria = [ //criteria array
	            'value' => $value //value set 
	    ]; 
	    $stmt->execute($criteria); //execute criteria
	    return $stmt; //stmt return
	}
}