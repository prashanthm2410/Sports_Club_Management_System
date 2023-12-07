<?php
require '../../include/db_conn.php';
page_protect();
$etid = $_GET['etid'];
$pid = $_GET['pid'];
$uid = $_GET['id'];
$sql = "SELECT * FROM enrolls_to e
        INNER JOIN plan p ON p.pid = e.pid
        WHERE e.uid = '$uid' AND e.et_id = '$etid'";
$res = mysqli_query($con, $sql);
$userInfo = mysqli_query($con, "SELECT userid,username, gender, mobile, email, dob, joining_date FROM users WHERE userid = '$uid'");
$userInfos = mysqli_query($con, "SELECT planName, validity, amount FROM plan WHERE pid = (SELECT pid FROM enrolls_to WHERE uid='$uid' LIMIT 1)");
$userData = mysqli_fetch_assoc($userInfo);
$userDatas = mysqli_fetch_assoc($userInfos);
$row = [];

if ($res) {
    $row = mysqli_fetch_assoc($res);
}
?>
<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>SPORTS CLUB</title>
    <style>
        #space {
            line-height: 0.5cm;
        }

        body {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: space-between;
            min-height: 100vh;
            margin: 0;
        }

        #print {
            margin-bottom: 50px; /* Adjust margin as needed */
        }
    </style>
    <script>
        function myFunction() {
            var prt = document.getElementById("print");
            var WinPrint = window.open('', '', 'left=0,top=0,width=800,height=900,tollbar=0,scrollbars=0,status=0');
            WinPrint.document.write(prt.innerHTML);
            WinPrint.document.close();
            WinPrint.focus();
            WinPrint.print();
            WinPrint.close();
            setPageHeight("297mm");
            setPageWidth("210mm");
            setHtmlZoom(100);
        }
    </script>
</head>

<body>
    <div id="print">
    <div id="logo">
            <img src="logo1.png" alt="SQUAD GYM Logo" />
        </div>
        <table id="space" width="760" height="397" border="0" align="center">
            <tr>
                <td height="118" colspan="3">
                    <p>USER ID: <?php echo $userData['userid']; ?></p>
                    <p>USERNAME: <?php echo $userData['username']; ?></p>
                    <p>GENDER: <?php echo $userData['gender'] ?></p>
                    <p>MOBILE: <?php echo $userData['mobile'] ?></p>
                    <p>EMAIL: <?php echo $userData['email'] ?></p>
                    <p>DOB: <?php echo $userData['dob'] ?></p>
                    <p>JOINING DATE: <?php echo $userData['joining_date'] ?></p>
                    <p>PLAN NAME: <?php echo $userDatas['planName'] ?></p>
                    <p>VALIDITY: <?php echo $userDatas['validity'] ?></p>
                    <p>AMOUNT: <?php echo $userDatas['amount'] ?></p>
                </td>
            </tr>

            <tr>
            </tr>
        </table>
    </div>

    <br><input type="button" class="a1-btn a1-green" value="PRINT INVOICE" onclick="myFunction()">
</body>

</html>
