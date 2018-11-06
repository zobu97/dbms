<?php
    include("connection.php");

    $query = 'SELECT * FROM salesperson';
    $result = mysqli_query($conn, $query);
    
    $data = array();
    while($row = mysqli_fetch_assoc($result)){
        $data[] = $row;
    }
    
    // $posts = mysqli_fetch_all($result, MYSQLI_ASSOC);
    // var_dump($posts);
    
    echo json_encode($data);
    
	mysqli_free_result($result);
	mysqli_close($conn);

?>