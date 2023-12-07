<?php
require '../../include/db_conn.php';
page_protect();
?>

<!DOCTYPE html>
<html lang="en">
<head>

    <title>SPORTS CLUB | Member per month</title>
     <link rel="stylesheet" href="../../css/style.css"  id="style-resource-5">
    <script type="text/javascript" src="../../js/Script.js"></script>
    <link rel="stylesheet" href="../../css/dashMain.css">
    <link rel="stylesheet" type="text/css" href="../../css/entypo.css">
	<link href="a1style.css" rel="stylesheet" type="text/css">
     <style>
    	.page-container .sidebar-menu #main-menu li#overviewhassubopen > a {
    	background-color: #2b303a;
    	color: #ffffff;
		}

    </style>

</head>
    <body class="page-body  page-fade" onload="collapseSidebar();showMember();">

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
				<a href="#" class="sidebar-collapse-icon with-animation"><!-- add class "with-animation" if you want sidebar to have animation during expanding/collapsing transition -->
					<i class="entypo-menu"></i>
				</a>
			</div>
							
			
		
			</header>
    		<?php include('nav.php'); ?>
    	</div>

    		<div class="main-content">
		
				<div class="row">
					
					<!-- Profile Info and Notifications -->
					<div class="col-md-6 col-sm-8 clearfix">	
							
					</div>
					
					
					<!-- Raw Links -->
					<div class="col-md-6 col-sm-4 clearfix hidden-xs">
						
						<ul class="list-inline links-list pull-right">

							<li>Welcome <?php echo $_SESSION['full_name']; ?> 
							</li>							
						
							<li>
								<a href="logout.php">
									Log Out <i class="entypo-logout right"></i>
								</a>
							</li>
						</ul>
						
					</div>
					
				</div>

		<h2>Member Per Month</h2>

		<hr />

		

<form>
	<?php
	// set start and end year range
	$yearArray = range(2000, date('Y'));
	?>
	<!-- displaying the dropdown list -->
	<select name="year" id="syear">
	    <option value="0">Select Year</option>
	    <?php
	    foreach ($yearArray as $year) {
	        // if you want to select a particular year
	        $selected = ($year == date('Y')) ? 'selected' : '';
	        echo '<option '.$selected.' value="'.$year.'">'.$year.'</option>';
	    }
	    ?>
	</select>

	<?php
	// set the month array
	$formattedMonthArray = array(
	                    "01" => "January", "02" => "February", "03" => "March", "04" => "April",
	                    "05" => "May", "06" => "June", "07" => "July", "08" => "August",
	                    "09" => "September", "10" => "October", "11" => "November", "12" => "December",
	                );

	?>
	<!-- displaying the dropdown list -->
	<select name="month" id="smonth">
	    <option value="0">Select Month</option>
	    <?php

	    foreach ($formattedMonthArray as $month) {
	        // if you want to select a particular month
	        $mm=implode(array_keys($formattedMonthArray,$month));
	        $selected = ($mm == date('m')) ? 'selected' : '';
	        // if you want to add extra 0 before the month uncomment the line below
	        //$month = str_pad($month, 2, "0", STR_PAD_LEFT);
	        echo '<option '.$selected.' value="'.$mm.'">'.$month.'</option>';
	    }
	    ?>
	</select>

	<input type="button" class="a1-btn a1-blue"  style="margin-bottom:5px;" name="search" onclick="showMember();" value="Search">

</form>

<table id="memmonth" border=1>
	
</table>


<script>

function showMember() {
    var year = document.getElementById("syear").value;
    var month = document.getElementById("smonth").value;

    if (month === "0" || year === "0") {
        document.getElementById("memmonth").innerHTML = "";
        return;
    } else {
        fetch(`over_month.php?mm=${month}&yy=${year}&flag=0`)
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
            })
            .then(data => {
                // Assuming "memmonth" is a table body
                var tbody = document.getElementById("memmonth");
                tbody.innerHTML = ""; // Clear previous content

                data.forEach(row => {
                    var newRow = tbody.insertRow();
                    for (var key in row) {
                        var cell = newRow.insertCell();
                        cell.appendChild(document.createTextNode(row[key]));
                    }
                });
            })
            .catch(error => {
                console.error('Error during fetch operation:', error);
            });
    }
}



</script>

			<?php include('footer.php'); ?>

   	</div>

    </body>
</html>


