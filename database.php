<?php
    $db_server = "localhost";
    $db_user = "root";
    $db_pass = "";
    $db_name = "software_engineer_test";
    $conn = "";

    
            
    try{
        $conn = mysqli_connect($db_server, 
                           $db_user, 
                           $db_pass, 
                           $db_name);
    }
    catch(mysqli_sql_exception){
        //echo "Could not connect <br>";
    }
    
    if($conn){
        //echo "You are connected. <br>";
    }


    // $sql = "SELECT * FROM course WHERE department = 1";

	// $result = mysqli_query($conn, $sql);

	// if(mysqli_num_rows($result) > 0){
	// 	while($row = mysqli_fetch_assoc($result)){
	// 		echo $row["course_name"] . "<br>";
	// 		echo $row["teacher"] . "<br><br>";
	// 	}
		
	// }
    
?>