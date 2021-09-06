<?

$p_title = 'Eureka 2.0 | Eureka';

include('./header.php');

require('mysqli_connect.php');

?>



    <!-- Breadcrumb Area Start -->

    <section class="breadcrumb-area bg-img bg-gradient-overlay jarallax" style="background-image: url(img/bg-img/37.jpg);">

        <div class="container h-100">

            <div class="row h-100 align-items-center">

                <div class="col-12">

                    <div class="breadcrumb-content">

                        <h2 class="page-title">Eureka 2.0 Archive</h2>

                       

                    </div>

                </div>

            </div>

        </div>

    </section>

    <!-- Breadcrumb Area End -->

	





	<section class="our-schedule-area bg-white section-padding-100">

        <div class="container">

            <div class="row">

                <div class="col-12">

                   

	





 <div class="tab-content" id="conferScheduleTabContent">

                        <div class="tab-pane fade show active" >

                       

                            <div class="single-tab-content">

                                <div class="row">

                                    <div class="col-12">

													<? 

													$b = mysqli_query($dbc,"SELECT * FROM eureka ORDER BY score DESC");

													for($i=1; $i<12; $i++){

														$data3=mysqli_fetch_row($b); ?>

                                        <div class="single-schedule-area single-page d-flex flex-wrap justify-content-between align-items-center wow fadeInUp" data-wow-delay="300ms" >                                  

                                                <div class="single-schedule-info">

                                                    <h6 style="color: blue;">Team: <? echo $i.' - '.$data3[4]; ?></h6>

                                                    <h5><? echo  $data3[5] ?></h5>

						                            		 <h6 style="color: green;"><? echo $data3[3]; ?> Points </h6>

																	<h7><? echo $data3[6]; ?></h7>

                                                </div>

                                        </div>

													<? 

														} ?>

				        					</div>

                    			</div>

              </div>

        </div> 

  </div>









    </div>

            </div>

        </div>

    </section>



                         

<?

include('footer.php');

?>