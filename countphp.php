
<?php

    //print_r("<pre>");
    //print_r($_COOKIE['ci_session']);
    //print_r("<pre>");
    $usercookie=$_COOKIE['cpsession'];
    //print_r($_ser);
   // print_r("<pre>");
    //print_r($_SERVER);
    //print_r("<pre>"); 
    //print_r("<pre>");
    //print_r($_SERVER);
    //print_r("<pre>");
    $host = $_SERVER['REMOTE_ADDR'];
    $userip= $_SERVER['REMOTE_ADDR'];
    
    $count=1;
    
    date_default_timezone_set('Asia/Calcutta'); 
    $time = date('H:i:s');
    $date = date('d-m-Y');

    if($host){
    $conn = mysqli_connect("localhost","viswatec_mano","Manop@#2019","viswatec_LoginSystem");
    $user = mysqli_query($conn, "SELECT * FROM usercount WHERE userip='$userip'");
    $users = mysqli_num_rows($user);
    $count=1;
    if($users>=1){
        $user1 = mysqli_query($conn,"SELECT * FROM usercount WHERE userip='$userip'");
        $result = mysqli_fetch_assoc($user1);
        $results = ($result["count"]);
        $results1 = $results+$count;
        //echo($results1);
        $query1 = "UPDATE usercount SET count='$results1' where userip='$userip'";
        mysqli_query($conn,$query1);
        //echo("updated successfully");
        
        $query2 ="UPDATE usercount SET lastvisiteddate ='$date' where userip='$userip' ";
        mysqli_query($conn,$query2);
        $query3 = "UPDATE usercount SET lastvisitedtime = '$time' where userip='$userip '";
        mysqli_query($conn,$query3);

    }

    else{
        $query = "INSERT INTO usercount VALUES ($count,'$userip','$date','$time')";
        mysqli_query($conn,$query);
        echo "Register Successfully";

    }
    
}

?> 





    
