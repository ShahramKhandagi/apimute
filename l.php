<?php
$serverName = "server_name_or_ip"; 
$connectionOptions = array(
    "Database" => "your_database_name",
    "Uid" => "your_sql_server_username", 
    "PWD" => "your_sql_server_password"
);

// Establishes the connection
$conn = sqlsrv_connect( $serverName, $connectionOptions );

// Check the connection
if( !$conn ) {
    die( print_r(sqlsrv_errors(), true));
}

// Example query: select data
$query = "SELECT * FROM mahsol";
$stmt = sqlsrv_query( $conn, $query );

// Fetch the data and return as JSON
$results = array();
while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC ) ) {
    $results[] = $row;
}

echo json_encode($results);

// Close connection
sqlsrv_close( $conn );
?>
