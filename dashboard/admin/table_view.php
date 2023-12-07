<?php
require '../../include/db_conn.php';
page_protect();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>SPORTS CLUB | View Member</title>
    <link rel="stylesheet" href="../../css/style.css"  id="style-resource-5">
    <script type="text/javascript" src="../../js/Script.js"></script>
    <link rel="stylesheet" href="../../css/dashMain.css">
    <link rel="stylesheet" type="text/css" href="../../css/entypo.css">
    <link href="a1style.css" rel="stylesheet" type="text/css">
    <style>
        #button1 {
            width: 126px;
        }

        .page-container .sidebar-menu #main-menu li#hassubopen > a {
            background-color: #2b303a;
            color: #ffffff;
        }
    </style>
</head>
<body class="page-body page-fade" onload="collapseSidebar()">
    <div class="page-container sidebar-collapsed" id="navbarcollapse">
        <div class="sidebar-menu">
            <header class="logo-env">
                <!-- logo -->
                <div class="logo">
                    <a href="main.php">
                        <img src="logo1.png" alt="" width="192" height="80" />
                    </a>
                </div>
                <!-- logo collapse icon -->
                <div class="sidebar-collapse" onclick="collapseSidebar()">
                    <a href="#" class="sidebar-collapse-icon with-animation">
                        <i class="entypo-menu"></i>
                    </a>
                </div>
            </header>
            <?php include('nav.php'); ?>
        </div>

        <div class="main-content">
            <div class="row">
                <div class="col-md-6 col-sm-8 clearfix">    
                </div>
                <div class="col-md-6 col-sm-4 clearfix hidden-xs">
                    <ul class="list-inline links-list pull-right">
                        <li>Welcome <?php echo $_SESSION['full_name']; ?> </li>
                        <li>
                            <a href="logout.php">
                                Log Out <i class="entypo-logout right"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

            <h3>Member Detail</h3>
            <hr />

            <table class="table table-bordered datatable" id="table-1" border=1>
                <thead>
                    <tr>
                        <th>Sl.No</th>
                        <th>Membership Expiry</th>
                        <th>Member ID</th>
                        <th>Name</th>
                        <th>Contact</th>
                        <th>E-Mail</th>
                        <th>Gender</th>
                        <th>Joining Date</th>
                        <th>Action</th> <!-- New column for Print Button -->
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $query  = "select * from users";
                    $result = mysqli_query($con, $query);
                    $sno    = 1;

                    if (mysqli_affected_rows($con) != 0) {
                        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                            $uid   = $row['userid'];
                            $query1  = "select * from enrolls_to WHERE uid='$uid' AND renewal='yes'";
                            $result1 = mysqli_query($con, $query1);
                            if (mysqli_affected_rows($con) == 1) {
                                while ($row1 = mysqli_fetch_array($result1, MYSQLI_ASSOC)) {
                                    echo "<tr><td>".$sno."</td>";
                                    echo "<td>" . $row1['expire'] . "</td>";
                                    echo "<td>" . $row['userid'] . "</td>";
                                    echo "<td>" . $row['username'] . "</td>";
                                    echo "<td>" . $row['mobile'] . "</td>";
                                    echo "<td>" . $row['email'] . "</td>";
                                    echo "<td>" . $row['gender'] . "</td>";
                                    echo "<td>" . $row['joining_date'] ."</td>";

                                    // Add the Print Button
                                    echo "<td><a href='details.php?etid=123&pid=456&id=".$row['userid']."' class='a1-btn a1-green'>Print</a></td>";
                                    $sno++;

                                }
                            }
                        }
                    }
                    $res = mysqli_query($con,"CALL `countGender`();") or die("query fail:" .mysqli_error($con));
                    echo"<table ><tr><th>gender</th><th>count</th></tr>";
                    while($row = mysqli_fetch_array($res)){
                        echo"<td>". $row['gender']. "</td>";
                         echo"<td>". $row['COUNT(*)']. "</td>";
                        echo"<br/>";
                        echo"</table>";     
                    }
                    
                    ?>
                </tbody>
            </table>
            
            <script>
                function ConfirmDelete(name){
                    var r = confirm("Are you sure! You want to Delete this User?");
                    if (r == true) {
                        return true;
                    } else {
                        return false;
                    }
                }
            </script>

            <?php include('footer.php'); ?>
        </div>
    </div>
</body>
</html>
