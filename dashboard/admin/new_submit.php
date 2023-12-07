<?php
require '../../include/db_conn.php';
page_protect();

$memID = $_POST['m_id'];
$uname = $_POST['u_name'];
$stname = $_POST['street_name'];
$city = $_POST['city'];
$zipcode = $_POST['zipcode'];
$state = $_POST['state'];
$gender = $_POST['gender'];
$dob = $_POST['dob'];
$phn = $_POST['mobile'];
$email = $_POST['email'];
$jdate = $_POST['jdate'];
$plan = $_POST['plan'];

// Inserting into users table
$query = "INSERT INTO users (userid, username, gender, mobile, email, dob, joining_date) VALUES ('$memID','$uname', '$gender', '$phn', '$email', '$dob', '$jdate')";
$cdate = date("Y-m-d"); // Current date
        
        $query1 = "SELECT * FROM plan WHERE pid='$plan'";
        $result = mysqli_query($con, $query1);
        $value = mysqli_fetch_assoc($result);
        date_default_timezone_set("Asia/Calcutta");
        $d = strtotime("+" . $value['validity'] . " Months");
        $cdate = date("Y-m-d"); // Current date
        $expiredate = date("Y-m-d", $d);
$query2 = "INSERT INTO enrolls_to  VALUES ('NULL','$plan', '$memID', '$cdate', '$expiredate', 'yes')";

if (mysqli_query($con, $query)) {
    $userID = mysqli_insert_id($con); // Get the last inserted ID

    // Retrieve information of the plan selected by the user
    $query1 = "SELECT * FROM plan WHERE pid='$plan'";
    $result = mysqli_query($con, $query1);

    if ($result && mysqli_num_rows($result) > 0) {
        $value = mysqli_fetch_assoc($result);
        date_default_timezone_set("Asia/Calcutta");
        $d = strtotime("+" . $value['validity'] . " Months");
        $cdate = date("Y-m-d"); // Current date
        $expiredate = date("Y-m-d", $d); // Adding validity retrieved from plan to the current date

        // Inserting into enrolls_to table of corresponding userid
       // $query2 = "INSERT INTO enrolls_to (pid, uid, paid_date, expire, renewal) VALUES ('$plan', '$userID', '$cdate', '$expiredate', 'yes')";

        try {
            if (mysqli_query($con, $query2)) {
                $query4 = "INSERT INTO health_status (uid) VALUES ('$userID')";
                if (mysqli_query($con, $query4)) {
                    $query5 = "INSERT INTO address (userid, streetName, state, city, zipcode) VALUES ('$userID', '$stname', '$state', '$city', '$zipcode')";
                    if (mysqli_query($con, $query5)) {
                        echo "<head><script>alert('Member Added Successfully');</script></head></html>";
                    } else {
                        
                    }
                } else {
                   
                }
            } else {
                
            }
        } catch (Exception $e) {
           
            // Deleting record of users if any of the queries failed to execute
            $query3 = "DELETE FROM users WHERE userid='$userID'";
            mysqli_query($con, $query3);
        }
    } else {
        
        // Deleting record of users if retrieving information of the plan failed
        $query3 = "DELETE FROM users WHERE userid='$userID'";
        mysqli_query($con, $query3);
    }
} else {
    
}
header("refresh:2; url=new_entry.php");
?>
