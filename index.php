<?php
require('config/config.php');
require('config/db.php');
?>

<?php

$query1 = "SELECT * from blog_data order by posted_on DESC LIMIT 4";

$result1 = mysqli_query($conn, $query1);
if ($result1 === false) {
	die(mysqli_error($conn));
}
$posts = mysqli_fetch_all($result1, MYSQLI_ASSOC);




$e_q = "SELECT * from events order by posted_on DESC LIMIT 1";
$e_r = mysqli_query($conn, $e_q);
if ($e_r === FALSE) {
	die(mysqli_error($conn));
}
$event = mysqli_fetch_assoc($e_r);

?>





<?php $title = "Home"; ?>

<?php
require 'include/header.php';
require 'include/top-nav.php';
?>


<section>
	<div class="jumbotron-fluid relative home-banner ">
		<div class="container">
			<h1 class="text-center text-white"> <span class="highlight">We are Chemical Engineering Society.</span></h1>
			<div class="d-flex justify-content-center p-1"> <a href="about.php" class="btn btn-primary borderbtn">About Us </a> </div>
		</div>
	</div>
</section>
<section class="container-fluid p-3 p-md-5 latest-section">
	<div class="d-flex justify-content-between align-items-center">
		<h1 class="ml-md-3">Latest Articles</h1>
		<button type="button" class="btn btn-link">
		<i class="fa fa-arrow-right arrow-size-2 text-primary">	<a href="blog.php"></a></i>
		</button>
	</div>


	<div class="row row-cols-1 row-cols-md-4 justify-content-center">
		<?php foreach ($posts as $key => $post) : ?>
			<div class="col-lg-4 mb-4 px-md-3 col-12">
				<div class="card h-100"> <img src="uploads/
					<?php
					
					$query4 = "SELECT img from blog_image where blog_id={$post['blog_id']}";
					$result4 = mysqli_query( $conn, $query4 );
if ( $result4 === FALSE ) {
	die( mysqli_error( $conn ) );
}
$image = mysqli_fetch_all( $result4, MYSQLI_ASSOC );
					foreach ((array) $image as $img) {
						echo ($img['img']);
					} ?>" class="card-img-top" alt="...">
					<div class="card-body">
						<p class="chapter by-line d-none d-sm-block">
							<?php $query2 = "SELECT tags.tag from tags INNER JOIN blog_tag on tags.tag_id=blog_tag.tag_id where blog_id={$post['blog_id']} Limit 2";

							$result2 = mysqli_query($conn, $query2);
							if ($result2 === false) {
								die(mysqli_error($conn));
							}
							$tags = mysqli_fetch_all($result2, MYSQLI_ASSOC);
							foreach ((array) $tags as $tag) {
								echo $tag["tag"] . "";
							}

							$query3 = "SELECT blog_author.author_name from blog_author where blog_id={$post['blog_id']} limit 2";
							echo "<br>";
							$result3 = mysqli_query($conn, $query3);
							if ($result3 === false) {
								die(mysqli_error($conn));
							}
							$authors = mysqli_fetch_all($result3, MYSQLI_ASSOC);
							foreach ((array) $authors as $author) {
								echo '<span class="text-info">' . $author["author_name"] . "" . '</span>';
							}
							?>
						</p>
						<h5 class="card-title"><a href="<?php echo ROOT_URL; ?>single.php?blog_id=<?php echo $post['blog_id']; ?>"><?php echo $post["blog_title"] ?></a></h5>
						<p class="card-text 	d-none d-sm-block  blog-summary"><?php echo $post['blog_summary']; ?></p>
					</div>
				</div>
			</div>
		<?php endforeach; ?>
</section>
<section class="event-banner border-bottom">
	<div class="container-fluid">
		<div class="row p-5">
			<div class="col-sm-12 col-md-5 d-flex flex-column justify-content-center">
				<h1 class="text-left display-3"><a href="https://eureka.ches.in/" target="_blank" class="text-left display-3">Visit Eureka </a></h1>
				<p class="text-left diplay-5">Our research competition is live. Check out the <a href="https://eureka.ches.in/feed.php" target="_blank">feed</a> for latest happenings!</p>

							</div>
			<div class=" col-sm-12 col-md-7 ">
				<div class="embed-responsive embed-responsive-16by9 container"><iframe src="https://www.youtube.com/embed/vCz78AQycck" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></div>
			</div>
		</div>
	</div>
</section><!--
<section class="explore container">
	<div class="row">
		<div class="col-md-4 col-12">
			<div class="card  text-white">
				<div class="img-overlay"><img class="card-img" src="images/ev.jpg" alt="Card image"></div>
				<div class="card-img-overlay text-center">
					<h5 class="card-title">Eureka!</h5>
					<button type="button" class="btn btn-info"><a href="eureka.php">Go</a></button>
				</div>
			</div>
		</div>
		<div class="col-md-4 col-12">

			<div class="card text-white">
				<div class="img-overlay"><img class="card-img" src="images/ev.jpg" alt="Card image"></div>
				<div class="card-img-overlay text-center">
					<h5 class="card-title">Siphon</h5>
					<button type="button" class="btn btn-info"><a href="siphon.php">Go</a></button>
				</div>
			</div>
		</div>
		<div class="col-md-4 col-12">
			<div class="card text-white">
				<div class="img-overlay"><img class="card-img" src="images/ev.jpg" alt="Card image"></div>
				<div class="card-img-overlay text-center">
					<h5 class="card-title">Chem-E-Car</h5>
					<button type="button" class="btn btn-info"><a href="chemcar.php">Go</a></button>
				</div>
			</div>
		</div>
	</div>
</section>
-->
<section class="upcoming border-top mb-4 mt-4">
	<h1 class="text-center mt-2 ">Past Events</h1>
	<div class="container mt-4 ">
		<div class="list-group">

			<a href="https://www.instagram.com/p/CE6gikhJ45m/" class="list-group-item list-group-item-action flex-column align-items-start bg-light text-serif">
				<div class="d-flex w-100 justify-content-between">
					<h4 class="mb-1">Flowsheet Design Competiton</h4>
					<small class="text-sans text-primary">12-14 September, 2020</small>
				</div>
					</a>

			<a href="https://www.instagram.com/p/CEYeYf6pZ2Z/" class="list-group-item list-group-item-action flex-column align-items-start">
				<div class="d-flex w-100 justify-content-between">
					<h5 class="mb-1">DWSIM Workshop</h5>
					<small class="text-muted">29-30th August, 2020</small>
				</div>
					</a>

			<a href="https://www.instagram.com/p/CEBWoY2pGoF/" class="list-group-item list-group-item-action flex-column align-items-start">
				<div class="d-flex w-100 justify-content-between">
					<h5 class="mb-1">Orientation</h5>
					<small class="text-muted">19th August, 2020</small>
				</div>
						</a>


		</div>
	</div>
</section>
<section class="contact"> </section>
<?php
require 'include/footer.php';
?>