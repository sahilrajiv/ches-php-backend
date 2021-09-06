<?
$p_title = 'Home | Eureka';
include('./header.php');
require('mysqli_connect.php');
if(isset($_SESSION['id'])){
	header('Location: http://ches.in/eureka/dashboard.php');
}
?>
<!-- About Us And Countdown Area Start -->
<section class="about-us-countdown-area section-padding-100-0" id="about">
    <div class="container">
        <div class="row align-items-center">
            <!-- About Content -->
            <div class="col-12 col-md-6">
                <div class="about-content-text mb-80">
                   <!-- <h6 class="wow fadeInUp text-white" data-wow-delay="300ms">ANNOUNCEMENT</h6>-->
                    <h1 class="wow fadeInUp text-white" data-wow-delay="300ms">EUREKA 3.0</h1>

                    <h4 class="wow fadeInUp text-white" data-wow-delay="300ms">Find your Eureka moment!</h4>

                   <!-- <a href="login.php" class="btn confer-btn mt-50 wow fadeInUp" data-wow-delay="300ms" style="visibility: visible; animation-delay: 300ms; animation-name: fadeInUp;">Register now! <i class="zmdi zmdi-long-arrow-right"></i></a>-->
                </div>
            </div>



            <!-- About Thumb -->
            <div class="col-12 col-md-6">
                <div class="about-thumb mb-80 wow fadeInUp" data-wow-delay="300ms">
                    <img src="img/bg-img/2.png" alt="" height="" width="">
                </div>
            </div>
        </div>
    </div>
</section>


<section class="about-us-countdown-area section-padding-100-0" style="background-color: white;">
    <div class="container">
        <div class="tab-pane fade show active">
<h2 style="text-align: center;">Teams competing in Eureka 3.0</h2>



            <div class="single-tab-content">

                <div class="row">
                    <div class="col-12">

                        <? 

                            $b = mysqli_query($dbc,"SELECT * FROM eureka2020 ORDER BY time ASC");
                


if ($b === false) {
	die(mysqli_error($dbc));
}
$posts = mysqli_fetch_all($b, MYSQLI_ASSOC);
                             ?>


                        <?php foreach ($posts as $key => $post) : ?>

                            <?php if ($key === 0) {
                                continue;
                            }
                            ?>


                            <div class="single-schedule-area single-page d-flex flex-wrap justify-content-between align-items-center wow fadeInUp" data-wow-delay="300ms">



                                <div class="single-schedule-info">

                                    <h6 style="color: blue;">
                                        <? echo $post["team_name"];?>
                                    </h6>

                                    <h5>
                                        <? echo  $post["topic"]; ?>
                                    </h5>
							<h6 style="color:green;"> <? echo $post["score"];?>
</h6>
							<h7 style="     text-transform: capitalize !important; ">By:
                                        <? echo  $post["name1"]; echo "  ".$post["name2"]; echo "  ".$post["name3"] ;  echo "  ".$post["name4"] ;  echo "  ".$post["name5"] ;?>
                                    </h7>
	<br>
                                    <h7 style="     text-transform: capitalize !important; ">Mentored by:
                                        <? echo  $post["name6"]; echo "  ".$post["name7"]; echo "  ".$post["name8"]; ?>
                                    </h7>
                                    <p>
								 <? echo  $post["brief"]; ?>
                                    </p>

                                </div>

                            </div>

                        <?php endforeach ?>


                    </div>

                </div>

            </div>
        </div>
    </div>
</section>

<?
include('footer.php');
?>