<?php include 'header.php'; ?>
<?php
  include 'conn.php';
	session_start();
	
	if (isset($_SESSION['id'])){
		$query=mysqli_query($conn,"select * from user where userid='".$_SESSION['id']."'");
		$row=mysqli_fetch_array($query);
		
		if ($row['access']==1){
			header('location:admin/');
		}
		else{
			header('location:user/');
		}
  }

  if(isset($_POST['submit'])) {
    $name=$_POST['name'];
    $address=$_POST['address'];
    $contact=$_POST['contact'];
    $username=$_POST['username'];
    $password=md5($_POST['password']);
    
    mysqli_query($conn,"insert into user (username, password, access) values ('$username', '$password', '2')");
    $userid=mysqli_insert_id($conn);
    
    mysqli_query($conn,"insert into customer (userid, customer_name, address, contact) values ('$userid', '$name', '$address', '$contact')");
  }
  
?>
<body>
<div class="container">
	<div id="signup_form" class="well">
		<h2 style="text-align: center;">Sign Up</h2>
		<hr>
		<form role="form" method="POST">
    Name: <input type="text" name="name" class="form-control" required>
		<div style="height: 10px;"></div>		
		Address: <input type="text" name="address" class="form-control" required> 
		<div style="height: 10px;"></div>
		Contact Info: <input type="text" name="contact" class="form-control" required> 
		<div style="height: 10px;"></div>
		Username: <input type="text" name="username" class="form-control" required>
		<div style="height: 10px;"></div>		
		Password: <input type="password" name="password" class="form-control" required> 
		<div style="height: 10px;"></div>
		<button type="submit" name="submit" class="btn btn-primary">Create Account</button>
		</form>
    <p style="text-align: center;">
      Already have an account?
  		<a href="index.php" style="text-align: center;">Sign In</a>
    </p>
		<div style="height: 15px;"></div>
		<div style="color: red; font-size: 15px;">
			<center>
			<?php
				
				if(isset($_SESSION['msg'])){
					echo $_SESSION['msg'];
					unset($_SESSION['msg']);
				}
			?>
			</center>
		</div>
	</div>
</div>
<?php include('script.php'); ?>
</body>
</html>