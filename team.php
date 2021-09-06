<?php $title="About Us ";?>



<?php

require 'include/header.php';

require 'include/top-nav.php';

?>


<script>

console.log("This page has been designed by Pranav Dherange");


</script>

<?php

require('config/config.php');

require('config/db.php');

?>



<?php 

$query0 = "SELECT * FROM `TABLE 14` order by ar desc";

$query1 = "SELECT * FROM `TABLE 14` WHERE team='Core' order by ar desc";



$query2 = "SELECT * from `TABLE 14` where team='Documentation' order by ar desc";



$query3 = "SELECT * from `TABLE 14` where team='Finance' order by ar desc";







$query4 = "SELECT * from `TABLE 14` where team='Managerial'  order by ar desc";



$query5 = "SELECT * from `TABLE 14` where team='Social Media' order by ar desc";



$query6 = "SELECT * from `TABLE 14` where team='Technical' order by ar desc";



$query7 = "SELECT * from `TABLE 14` where team='Web Development' order by ar desc";



$query8 = "SELECT * from `TABLE 14` where team='Innovation' order by ar desc";



$result0 = mysqli_query($conn, $query0);

if ($result0 === false) {

	die(mysqli_error($conn));

}

$all = mysqli_fetch_all($result0, MYSQLI_ASSOC);



$result1 = mysqli_query($conn, $query1);

if ($result1 === false) {

	die(mysqli_error($conn));

}

$core = mysqli_fetch_all($result1, MYSQLI_ASSOC);



$result2 = mysqli_query($conn, $query2);

if ($result2 === false) {

	die(mysqli_error($conn));

}

$docs = mysqli_fetch_all($result2, MYSQLI_ASSOC);



$result3 = mysqli_query($conn, $query3);

if ($result3 === false) {

	die(mysqli_error($conn));

}

$finance = mysqli_fetch_all($result3, MYSQLI_ASSOC);



$result4 = mysqli_query($conn, $query4);

if ($result4 === false) {

	die(mysqli_error($conn));

}

$manage = mysqli_fetch_all($result4, MYSQLI_ASSOC);



$result5 = mysqli_query($conn, $query5);

if ($result5 === false) {

	die(mysqli_error($conn));

}

$social = mysqli_fetch_all($result5, MYSQLI_ASSOC);



$result6 = mysqli_query($conn, $query6);

if ($result6 === false) {

	die(mysqli_error($conn));

}

$tech = mysqli_fetch_all($result6, MYSQLI_ASSOC);



$result7 = mysqli_query($conn, $query7);

if ($result7 === false) {

	die(mysqli_error($conn));

}

$web = mysqli_fetch_all($result7, MYSQLI_ASSOC);



$result8 = mysqli_query($conn, $query8);

if ($result8 === false) {

	die(mysqli_error($conn));

}

$innov = mysqli_fetch_all($result8, MYSQLI_ASSOC);









?>







<section id="team">

  <div class="container">

    <div class="ourteam" style="margin-bottom: 10%;">

      <h2>Our Team</h2>

      </div>

      <div class="border" style="margin-bottom: 30px;">

      </div>

    <!--  <div class="wrapper">

        <div class="menu">

          <select id="name">

            <option value="doc">Documentation </option>

            <option value="web">Web Development</option>

            <option value="inov">Innovation</option>

            <option value="gra">Social Media and Content</option>

            <option value="fin">Finance</option>

            <option value="ino">Innovation</option>

          </select>

        </div>

      </div>-->

    <div class="row data justify-content-center" id="doc">

      <div id="doc" class="text-center" style="width: 100%; letter-spacing: 2px;">

        <h2>Core</h2>

        </div>

        <?php foreach ($core as $key => $doc) : ?>

        <div class="col-lg-4 col-md-6 col-sm-6">

          <div class="flip-card">

            <div class="flip-card-inner">

              <div class="flip-card-front">

                <div>

                <img class="image" src="./images/prof2020/<?php echo ($doc['image']); ?>" alt="Avatar" style="width: 100px; height: 100px;"></div>

                <h4 style="color: white;"><?php echo ($doc['name']); ?></h4>
				<p style="color: white; margin-top:10px; margin-bottom:5px;"><?php echo ($doc['post']); ?></p>

              </div>

              <div class="flip-card-back">

                <h3><?php echo ($doc['post']); ?></h3>

                <a href="<?php echo ($doc['social']); ?>" class="fa fa-linkedin"></a>

              </div>

            </div>

          </div>

        </div>

        <?php endforeach; ?>

    </div>

 <div class="row data justify-content-center" id="doc">

      <div id="doc" class="text-center" style="width: 100%; letter-spacing: 2px;">

        <h2>Documentation</h2>

        </div>

        <?php foreach ($docs as $key => $doc) : ?>

        <div class="col-lg-3 col-md-6 col-sm-6">

          <div class="flip-card">

            <div class="flip-card-inner">

              <div class="flip-card-front">

                <div>

                <img class="image" src="./images/prof2020/<?php echo ($doc['image']); ?>" alt="Avatar" style="width: 100px; height: 100px;"></div>

                <h4 style="color: white;"><?php echo ($doc['name']); ?></h4>
				<p style="color: white;"><?php echo ($doc['post']); ?></p>

              </div>

              <div class="flip-card-back">

                <h3><?php echo ($doc['post']); ?></h3>

                <a href="<?php echo ($doc['social']); ?>" class="fa fa-linkedin"></a>

              </div>

            </div>

          </div>

        </div>

        <?php endforeach; ?>

    </div>

<div class="row data justify-content-center" id="doc">

      <div id="doc" class="text-center" style="width: 100%; letter-spacing: 2px;">

        <h2>Finance</h2>

        </div>

        <?php foreach ($finance as $key => $doc) : ?>

        <div class="col-lg-3 col-md-6 col-sm-6">

          <div class="flip-card">

            <div class="flip-card-inner">

              <div class="flip-card-front">

                <div>

                <img class="image" src="./images/prof2020/<?php echo ($doc['image']); ?>" alt="Avatar" style="width: 100px; height: 100px;"></div>

                <h4 style="color: white;"><?php echo ($doc['name']); ?></h4>
				<p style="color: white;"><?php echo ($doc['post']); ?></p>

              </div>

              <div class="flip-card-back">

                <h3><?php echo ($doc['post']); ?></h3>

                <a href="<?php echo ($doc['social']); ?>" class="fa fa-linkedin"></a>

              </div>

            </div>

          </div>

        </div>

        <?php endforeach; ?>

    </div>


<div class="row data justify-content-center" id="doc">

      <div id="doc" class="text-center" style="width: 100%; letter-spacing: 2px;">

        <h2>Innovation</h2>

        </div>

        <?php foreach ($innov as $key => $doc) : ?>

        <div class="col-lg-3 col-md-6 col-sm-6">

          <div class="flip-card">

            <div class="flip-card-inner">

              <div class="flip-card-front">

                <div>

                <img class="image" src="./images/prof2020/<?php echo ($doc['image']); ?>" alt="Avatar" style="width: 100px; height: 100px;"></div>

                <h4 style="color: white;"><?php echo ($doc['name']); ?></h4>
				<p style="color: white;"><?php echo ($doc['post']); ?></p>

              </div>

              <div class="flip-card-back">

                <h3><?php echo ($doc['post']); ?></h3>

                <a href="<?php echo ($doc['social']); ?>" class="fa fa-linkedin"></a>

              </div>

            </div>

          </div>

        </div>

        <?php endforeach; ?>

    </div>

<div class="row data justify-content-center" id="doc">

      <div id="doc" class="text-center" style="width: 100%; letter-spacing: 2px;">

        <h2>Managerial</h2>

        </div>

        <?php foreach ($manage as $key => $doc) : ?>

        <div class="col-lg-3 col-md-6 col-sm-6">

          <div class="flip-card">

            <div class="flip-card-inner">

              <div class="flip-card-front">

                <div>

                <img class="image" src="./images/prof2020/<?php echo ($doc['image']); ?>" alt="Avatar" style="width: 100px; height: 100px;"></div>

                <h4 style="color: white;"><?php echo ($doc['name']); ?></h4>
				<p style="color: white;"><?php echo ($doc['post']); ?></p>

              </div>

              <div class="flip-card-back">

                <h3><?php echo ($doc['post']); ?></h3>

                <a href="<?php echo ($doc['social']); ?>" class="fa fa-linkedin"></a>

              </div>

            </div>

          </div>

        </div>

        <?php endforeach; ?>

    </div>
<div class="row data justify-content-center" id="doc">

      <div id="doc" class="text-center" style="width: 100%; letter-spacing: 2px;">

        <h2>Technical</h2>

        </div>

        <?php foreach ($tech as $key => $doc) : ?>

        <div class="col-lg-3 col-md-6 col-sm-6">

          <div class="flip-card">

            <div class="flip-card-inner">

              <div class="flip-card-front">

                <div>

                <img class="image" src="./images/prof2020/<?php echo ($doc['image']); ?>" alt="Avatar" style="width: 100px; height: 100px;"></div>

                <h4 style="color: white;"><?php echo ($doc['name']); ?></h4>
				<p style="color: white;"><?php echo ($doc['post']); ?></p>

              </div>

              <div class="flip-card-back">

                <h3><?php echo ($doc['post']); ?></h3>

                <a href="<?php echo ($doc['social']); ?>" class="fa fa-linkedin"></a>

              </div>

            </div>

          </div>

        </div>

        <?php endforeach; ?>

    </div>
<div class="row data justify-content-center" id="doc">

      <div id="doc" class="text-center" style="width: 100%; letter-spacing: 2px;">

        <h2>Web Development</h2>

        </div>

        <?php foreach ($web as $key => $doc) : ?>

        <div class="col-lg-3 col-md-6 col-sm-6">

          <div class="flip-card">

            <div class="flip-card-inner">

              <div class="flip-card-front">

                <div>

                <img class="image" src="./images/prof2020/<?php echo ($doc['image']); ?>" alt="Avatar" style="width: 100px; height: 100px;"></div>

                <h4 style="color: white;"><?php echo ($doc['name']); ?></h4>
				<p style="color: white;"><?php echo ($doc['post']); ?></p>

              </div>

              <div class="flip-card-back">

                <h3><?php echo ($doc['post']); ?></h3>

                <a href="<?php echo ($doc['social']); ?>" class="fa fa-linkedin"></a>

              </div>

            </div>

          </div>

        </div>

        <?php endforeach; ?>

    </div>








   <div class="border" style="margin-bottom: 30px;">

  </div>

  </div>

</section>



<?php 

require 'include/footer.php';

?>