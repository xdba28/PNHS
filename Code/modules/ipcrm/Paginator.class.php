<?php
 
public function __construct( $conn, $query ) {
     
    $this->_conn = $conn;
    $this->_query = $query;
 
    $rs= $this->_conn->query( $this->_query );
    $this->_total = $rs->num_rows;
     
}
