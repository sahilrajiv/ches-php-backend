<?

$p_title = 'Feed | Eureka';

include('./header.php');

include('../../mysqli_connect.php');



if($_SERVER['REQUEST_METHOD']=='POST'){

	$text = $_POST['message'];

	

	$q = mysqli_query($dbc, "INSERT INTO eureka_feedback (feedback) VALUES ('$text')");

	if($q==TRUE){

		echo "<script>alert('Sent Successfully');</script>";

	}else{

		echo "<script>alert('Failed, contact administrator');</script>";

	}

}

	$q1 = mysqli_query($dbc,"SELECT * FROM eureka_posts ORDER BY time DESC");

	$b = mysqli_query($dbc, "SELECT * FROM eureka ORDER BY score DESC");

?>

   

    <section class="breadcrumb-area bg-img bg-gradient-overlay jarallax" style="background-image: url(img/bg-img/37.jpg);">

        <div class="container h-100">

            <div class="row h-100 align-items-center">

                <div class="col-12">

                    <div class="breadcrumb-content">

                        <h2 class="page-title">Public Feed</h2>

                        <nav aria-label="breadcrumb">

                            <ol class="breadcrumb">

                                <li class="breadcrumb-item"><a href="index.php">Home</a></li>

                                <li class="breadcrumb-item active"><a href="feed.php">Public Feed</a></li>

                                

                            </ol>

                        </nav>

                    </div>

                </div>

            </div>

        </div>

    </section>

    

	





	<section class="our-schedule-area bg-white section-padding-100">

        <div class="container">

            <div class="row">

                <div class="col-12">

                    <div class="schedule-tab">

                        <!-- Nav Tabs -->

                        <ul class="nav nav-tabs wow fadeInUp" data-wow-delay="300ms" id="conferScheduleTab" role="tablist">

                            <? for($i=1; $i<4; $i++){

									$data3=mysqli_fetch_row($b); ?>

									<li class="nav-item">

                                <a class="nav-link" id="monday-tab"  href="#" download><? echo $i.'<br>'.$data3[4]; ?> <br> <span><? echo $data3[3]; ?> Points</span></a>

                            </li>

                            <? 

										} ?>

                        </ul>

                    </div>

					</div>

			  </div>

		</div>

</section>

	



<section class="container">

 	<div class="tab-content" id="conferScheduleTabContent">

        <div class="tab-pane fade show active" >

            <div class="single-tab-content">

                <div class="row">

                    <div class="col-12">

                      <? while($data1 = mysqli_fetch_row($q1)){

									$q2 = mysqli_query($dbc,"SELECT * FROM eureka WHERE team_id='$data1[1]'");

									$data2 = mysqli_fetch_row($q2);

										 ?>

                      <div class="single-schedule-area single-page d-flex flex-wrap justify-content-between align-items-center wow fadeInUp" data-wow-delay="300ms" >                                  

                          	<div class="single-schedule-info">

										

                              <h6><? echo $data2[4]; ?></h6>

                              <h5><? echo $data2[5]; ?></h5>

						    			<h7><? echo $data1[4]; ?> </h7>

					            	<p><? echo $data1[2]; ?></p>

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

	

<section class="container">

	<div class="single-schedule-area single-page d-flex flex-wrap justify-content-between align-items-center wow " data-wow-delay="300ms" >

   	<div class="confer-leave-a-reply-form clearfix">

      	<h4 class="mb-30">Leave A Comment about Eureka</h4>

            <div class="contact_form">

              	<form action="#" method="post">

                  <div class="contact_input_area">

                   	<div class="row">

                       <div class="col-12">

                          <div class="form-group">

                              <textarea name="message" class="form-control mb-30" id="message" cols="30" rows="6" placeholder="Message" required></textarea>

                          </div>

                      </div>

                                            <!-- Button -->

                      <div class="col-12">

                          <button type="submit" class="btn confer-btn">Send Message <i class="zmdi zmdi-long-arrow-right"></i></button>

                      </div>

                  </div>

              </div>

          </form>

      </div>

  </div>                 

 </div>

</section>



<?

include('footer.php');

?>  