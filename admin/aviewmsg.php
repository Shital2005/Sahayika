<?php
session_start();// Starting Session
require('../sql.php'); // Includes Login Script

// Storing Session
$user = $_SESSION['admin_login_user'];

if(!isset($_SESSION['admin_login_user'])){
header("location: ../index.php");} // Redirecting To Home Page
$query4 = "SELECT * from admin where admin_name ='$user'";
              $ses_sq4 = mysqli_query($conn, $query4);
              $row4 = mysqli_fetch_assoc($ses_sq4);
              $para1 = $row4['admin_id'];
              $para2 = $row4['admin_name'];
			  $para3 = $row4['admin_password'];
			  
?>

<!DOCTYPE html>
<html>
<?php require ('aheader.php');  ?>

  <body class="bg-white" id="top">
  
<?php require ('anav.php');  ?>
 	
  <section class="section section-shaped section-lg">
  <!--  <div class="shape shape-style-1 shape-primary">
      <span></span>
      <span></span>
      <span></span>
      <span></span>
      <span></span>
      <span></span>
      <span></span>
      <span></span>
      <span></span>
      <span></span>
    </div>-->
	<head>
		<style>
			 body {
      background: url('../assets/img/farm-bg18.jpg');
      background-size: cover;
      background-repeat: no-repeat;
    }
	.login-container {
      background: rgba(255, 255, 255, 0.9);
      padding: 30px;
      border-radius: 20px;
      box-shadow: 0 10px 8px rgba(0, 0, 0, 0.9);
	  opacity: 0.95;
    }
			</style>
	</head>
<!-- ======================================================================================================================================== -->



<div class="container ">
    
    	 <div class="row">
          <div class="col-md-8 mx-auto text-center">
            <span class="badge badge-success badge-pill mb-3">Contact</span>
          </div>
        </div>
		
          <div class="row row-content">
            <div class="col-md-12 mb-3">

				<div class="card text-white bg-gradient-white mb-3 login-container">
				  <div class="card-header">
				  <span class="display-3" style="color:limegreen;font-family:'Times New Roman', Times, serif;font-weight:bold;text-decoration:underline;"> Contact Queries  </span>
				  
					
				  </div>
				  
				  <div class="card-body text-white">
				<table class="table table-striped table-hover table-bordered bg-gradient-white text-center display" id="myTable">
				
				<thead>
						<tr class="font-weight-bold text-default text-center">
						
								<th class=" text-center"> ID </th>
								 <th class=" text-center"> Name </th>
								 <th class=" text-center"> Mobile No. </th>
								 <th class=" text-center"> Email </th>
								 <th class=" text-center"> Address </th>
								 <th class=" text-center"> Message </th>
								 <th class=" text-center"> Delete </th>
						</tr>
				</thead>		
	
							  
				<tbody>			  
						<?php 
					$q = "select * from contactus";

								$query = mysqli_query($conn,$q);

								while($res = mysqli_fetch_array($query)){	
				 ?>		  
						  
		 <tr class="text-center">
							 <td> <?php echo $res['c_id'];  ?> </td>
							 <td> <?php echo $res['c_name'];  ?> </td>
							 <td> <?php echo $res['c_mobile'];  ?> </td>
							 <td> <?php echo $res['c_email'];  ?> </td>
							 <td> <?php echo $res['c_address'];  ?> </td>
							 <td> <?php echo $res['c_message'];  ?> </td>
						<td > <button class="btn btn-sm" style="background-color:limegreen;color:white;"> <a href="amsgdelete.php?id=<?php echo $res['c_id']; ?>"  class=" nav-link text-white">Delete</a> </button> </td>

</tr>

							 <?php 
							 }
							  ?>
				</tbody>
				  </table>			
				  </div>
				</div>
				
					 		  
            </div>
          </div>
        </div>
		 
</section>

    <?php require("footer.php");?>
	   <script>
				$(document).ready( function () {
    $('#myTable').DataTable();
} );
</script>
</body>

</html>