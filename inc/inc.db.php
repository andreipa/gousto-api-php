<?php

class DB extends SQLite3{

    private $results;
    
    function __construct(){
        $this->open('db/gousto.db');
    }

    function __destruct(){
        $this->close();
    }

    function createTable($sql){
        $this->query($sql);
    }

    function insert($sql){
        $this->exec('BEGIN');
        $this->query($sql);
        $this->exec('COMMIT');
    }

    function update($sql){
        $this->query($sql);
    }
    
    function select($sql){
        $this->results = $this->query($sql);
        $arrData = null;
        while($row = $this->results->fetchArray(SQLITE3_ASSOC)){
            $arrData[] = $row;
        }
        return $arrData;
    }

}

?>