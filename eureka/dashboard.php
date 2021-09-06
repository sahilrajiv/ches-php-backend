<?

$p_title = 'Dashboard | Eureka';

include('./header.php');



require('../../mysqli_connect.php');

if(isset($_SESSION['id'])){

	$id = $_SESSION['id'];

    $team_id = $_SESSION['team_id'];

    

    $q1="SELECT * from eureka2020 where id='$id'";

    $result1 = mysqli_query($dbc, $q1);

    if ($result1 === false) {

	die(mysqli_error($dbc));

}

$data1 = mysqli_fetch_assoc($result1);

$q2 = mysqli_query($dbc,"SELECT * FROM eureka2020_posts WHERE team_id='$team_id'  order by time DESC");

$b = mysqli_query($dbc,"SELECT * FROM eureka2020 ORDER BY score DESC");

// $teamid=$data1["team_id"];

// if($_SERVER['REQUEST_METHOD'] == 'POST'){

//     if(!empty($_POST['post'])){

//         $post = $_POST['post'];

        

//         $q = "INSERT INTO eurekaw2020_posts (team_id, content) VALUES ('$teamid', '$post')";

//         $query = mysqli_query($dbc, $q);

//     }  else {

//         echo"<script>alert('Failed to send Empty Post')</script>";

//     }

// }







?>

<?php	





// if($_SERVER['REQUEST_METHOD'] == 'POST'){

//     if(!empty($_POST['editor'])){

//         $post = $_POST['editor'];

      

        

//         $q = "INSERT INTO eureka2020_posts (team_id, content) VALUES ('$team_id1', '$post')";

//         $query = mysqli_query($dbc, $q);

//     }  else {

//         echo"<script>alert('Failed to send Empty Post')</script>";

//     }

// }

	

if(isset($_REQUEST['editor'])){

    $team_id1=$data1["team_id"];

			$post=mysqli_real_escape_string($dbc, $_REQUEST['editor']);

			$q = "INSERT INTO eureka2020_posts (team_id, content) VALUES ( '$team_id', '$post')";

			if(mysqli_query($dbc, $q)){

                echo 'posted!';

            }

            else{

                echo 'error in execution, contact web team.';

            }

		}  else {

			echo"<script>alert('Failed to send Empty Post')</script>";

		}

	



?>

<script src="https://cdn.ckeditor.com/ckeditor5/23.0.0/classic/ckeditor.js"></script>

<!-- Breadcrumb Area Start -->

<section class="breadcrumb-area bg-img bg-gradient-overlay jarallax" style="background-image: url(img/bg-img/37.jpg);">

    <div class="container h-100">

        <div class="row h-100 align-items-center">

            <div class="col-12">

                <div class="breadcrumb-content">

                    <h2 class="page-title">Team Dashboard</h2>

                    <nav aria-label="breadcrumb">

                        <ol class="breadcrumb">

                            <li class="breadcrumb-item"><a href="index.php">Home</a></li>

                            <li class="breadcrumb-item active"><a href="dashboard.php">Login</a></li>

                            <li class="breadcrumb-item active"><a href="dashboard.php">Team Dashboard</a></li>

                        </ol>

                    </nav>

                </div>

            </div>

        </div>

    </div>

</section>



<section class="container">

    <div class="single-widget-area">

        <div class="post-author-widget">

            <div class="post-author-content">

                <h5>

                    <? echo $data1["team_name"]; ?>

                </h5>

                <h5>Score:

                    <? echo $data1["score"]; ?>

                </h5>

                <span>Team id:

                    <? echo $data1["team_id"];?></span>

                <h6>Topic:

                    <? echo $data1["topic"];?>

                </h6>
			
                <h7>

                    <font color="Blue"><?php echo "By " . $data1['name1'] . ", " . $data1['name2'] . ", " .  $data1['name3'] . ", " . $data1['name4'] . ", " .  $data1['name5'];

                                        ?></font>

                </h7><br>

                <h7>

                    <font color="Blue">

                        <? echo "Mentored By ". $data1['name6'].", ". $data1['name7'].", ". $data1['name8'];?>

                    </font>

                </h7>

                <p>

                    <? echo $data1['brief'];?>

                </p>

            </div>

        </div>

    </div>



    <div class="single-schedule-area single-page d-flex flex-wrap justify-content-between align-items-center wow " data-wow-delay="300ms">

        <div class="confer-leave-a-reply-form clearfix">

            <h4 class="mb-30">Update your progress</h4>

            <div class="contact_form">

                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">

                    <div class="contact_input_area">

                        <div class="row">

                            <div class="col-12">

                                <div class="form-group">

                                    <textarea name="editor" class="form-control col-12" id="editor" placeholder="Your Content Here"></textarea>

                                    <br>

                                    <p>At the end of your update text, skip to the next paragraph and then type the title of your citation link. Then select the citation title text and paste your link through the link button from the toolbar. </p>

                                    <script>

                                        ClassicEditor

                                            .create(document.querySelector('#editor'), {

                                                toolbar: ['bold', 'italic', 'link'],

                                            })

                                            .then(editor => {

                                                console.log(editor);

                                            })

                                            .catch(error => {

                                                console.error(error);

                                            });

                                    </script>

                                </div>

                            </div>

                            <div class="col-12">

                                <button type="submit" class="btn confer-btn">Post</button>

                            </div>

                        </div>

                    </div>

                    

                </form>

            </div>

        </div>

    </div>

</section>





<!-- <section class="our-schedule-area bg-white section-padding-100">

    <div class="container">

        <div class="row">

            <div class="col-12">

                <div class="schedule-tab">

           

             <ul class="nav nav-tabs wow fadeInUp" data-wow-delay="300ms" id="conferScheduleTab" role="tablist"> 

                         <? //for($i=1; $i<4; $i++){

									//$data3=mysqli_fetch_row($b); ?>

                        <li class="nav-item">

                            <a class="nav-link" id="monday-tab" href="#" download>

                                <?// echo $i.'<br>'.$data3[4]; ?> <br> <span>

                                    <? //echo $data3[3]; ?> Points</span></a>

                        </li>

                        <? 

									//	} ?>

                    </ul>

                </div>

            </div>

        </div>

    </div>

</section>  -->





<section class="container">

    <div class="tab-content" id="conferScheduleTabContent">

        <div class="tab-pane fade show active">

            <div class="single-tab-content">

                <div class="row">

                    <div class="col-12">

                        <? while($data2 = mysqli_fetch_assoc($q2)){

										 ?>

                        <div class="single-schedule-area single-page d-flex flex-wrap justify-content-between align-items-center wow fadeInUp" data-wow-delay="300ms">

                            <div class="single-schedule-info">







                                <h7>

                                    <? echo $data2['time']; ?>

                                </h7>

                                <p>

                                    <? echo $data2['content']; ?>

                                </p>

                            </div>

                        </div>

                        <? }

										?>



                    </div>

                </div>

            </div>

        </div>

    </div>

</section>





<?

	}else{

		header('Location: https://eureka.ches.in/login.php');

	}

include('./footer.php');

?>