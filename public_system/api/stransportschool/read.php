<?php

// Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

include_once '../../config/Database.php';
include_once '../../controllers/Stransportschool.php';


// Instantiate DB & connect
$database = new Database();
$db = $database->connect();

// Instantiate object
$post = new Stransportschool($db);

// query
$result = $post->read();
// Get row count
$num = $result->rowCount();

// Check if any data
if($num > 0) {
    // Post array
    $posts_arr = array();



    while($row = $result->fetch(PDO::FETCH_ASSOC)) {
        extract($row);

        $post_item = array(
            'ID'            => $ID,
            'TransportID'   => $TransportID,
            'StationID'     => $StationID,
            'author'        => $BranchID,
            'SchoolID'      => $SchoolID,
            'SchoolUUID'    => $SchoolUUID,
            'CreatedAt'    => $CreatedAt,
            'UpdatedAt'    => $UpdatedAt
        );

        // Push to "data"
        array_push($posts_arr, $post_item);

        // array_push($posts_arr['data'], $post_item);
    }

    // Turn to JSON & output
    echo json_encode($posts_arr);

} else {
    // No Posts
    echo 0;
}
