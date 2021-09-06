<?
$p_title = 'Login | Eureka';
include('./header.php');
if(isset($_SESSION['id'])){
	header('Location: https://eureka.ches.in/dashboard.php');
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	require('../../mysqli_connect.php');
	
	// Validate the email address:
	if (!empty($_POST['tid'])) {
		$e = mysqli_real_escape_string ($dbc, $_POST['tid']);
	} else {
		$e = FALSE;
		echo '<p class="error">You forgot to enter your team id</p>';
	}
	
	// Validate the password:
	if (!empty($_POST['tpass'])) {
		$p = mysqli_real_escape_string ($dbc, $_POST['tpass']);
	} else {
		$p = FALSE;
		echo '<p class="error">You forgot to enter your password!</p>';
	}
	
	if ($e && $p) { // If everything's OK.

		// Query the database:
		$q = "SELECT id, team_id, team_name FROM eureka2020 WHERE (team_id='$e' AND password='$p')";		
		$r = mysqli_query ($dbc, $q) or trigger_error("Query: $q\n<br />MySQL Error: " . mysqli_error($dbc));
		
		if (@mysqli_num_rows($r) == 1) { // A match was made.
			
			// Register the values:
            $_SESSION = mysqli_fetch_array ($r, MYSQLI_ASSOC); 
           
			mysqli_free_result($r);
			mysqli_close($dbc);
							
			// Redirect the user:
			$url = ('https://eureka.ches.in/dashboard.php'); // Define the URL.
			ob_end_clean(); // Delete the buffer.
			header("Location: $url");
			exit(); // Quit the script.
				
		} else { // No match was made.
			echo '<p class="error">Either the email address and password entered do not match those on file or you have not yet activated your account.</p>';
		}
		
	} else { // If everything wasn't OK.
		echo '<p class="error">Please try again.</p>';
	}
	
	mysqli_close($dbc);

} // End of SUBMIT conditional.
?>
<!-- Breadcrumb Area Start -->
<section class="breadcrumb-area bg-img bg-gradient-overlay jarallax" style="background-image: url(img/bg-img/37.jpg);">
    <div class="container h-100">
        <div class="row h-100 align-items-center">
            <div class="col-12">
                <div class="breadcrumb-content">
                    <h2 class="page-title">Login to Eureka</h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Login</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Area End -->

<!-- Contact Us Area Start -->
<section class="contact--us-area section-padding-100-0">
    <div class="container">
        <div class="row">



            <div class="col-12 col-lg-6">
                <div class="contact_from_area mb-100 clearfix">

                    <div class="contact_form">
                        <form action="login.php" method="post">
                            <div class="contact_input_area">
                                <div class="row">
                                    <!-- Form Group -->
                                    <div class="col-12 col-lg-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control mb-30" name="tid" id="tid" placeholder="Team ID" required>
                                        </div>
                                    </div>
                                    <!-- Form Group -->
                                    <div class="col-12 col-lg-6">
                                        <div class="form-group">
                                            <input type="password" class="form-control mb-30" name="tpass" id="tpass" placeholder="Password" required>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <button type="submit" class="btn confer-btn">Login <i class="zmdi zmdi-long-arrow-right"></i></button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Contact Us Area End -->
<?
include('footer.php');
?>