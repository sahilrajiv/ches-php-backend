<?php
require 'config/config.php';
require 'config/db.php';
?>

<?php
$query1 = "SELECT * from blog_data order by posted_on DESC";

$result1 = mysqli_query($conn, $query1);
if ($result1 === false) {
	die(mysqli_error($conn));
}
$posts = mysqli_fetch_all($result1, MYSQLI_ASSOC);

$latest = "SELECT * from blog_data order by posted_on DESC LIMIT 1";

$result2 = mysqli_query($conn, $latest);
if ($result2 === false) {
	die(mysqli_error($conn));
}
$post_latest = mysqli_fetch_assoc($result2);
?>

<?php $title = "Articles "; ?>

<?php
require 'include/header.php';
require 'include/top-nav.php';
?>

<main class="blog-main">
	<article class="featured-article container mt-4">
		<div class="row">
			<div class="feature-image col-md-5 col-12"> <a href=""> <img src="uploads/
					<?php
					
					$query4 = "SELECT img from blog_image where blog_id={$post_latest['blog_id']}";
					$result4 = mysqli_query( $conn, $query4 );
if ( $result4 === FALSE ) {
	die( mysqli_error( $conn ) );
}
$image = mysqli_fetch_all( $result4, MYSQLI_ASSOC );
					foreach ((array) $image as $img) {
						echo ($img['img']);
					} ?>" class="img-fluid" alt="" /> </a> </div>
			<div class="col-md-7 col-12">
				<p class="chapter by-line">
					<?php $query4 = "SELECT tags.tag from tags INNER JOIN blog_tag on tags.tag_id=blog_tag.tag_id where blog_id={$post_latest['blog_id']}";

					$result2 = mysqli_query($conn, $query4);
					if ($result2 === false) {
						die(mysqli_error($conn));
					}
					$tags = mysqli_fetch_all($result2, MYSQLI_ASSOC);
					foreach ((array) $tags as $tag) {
						echo $tag["tag"];
					}

					$query3 = "SELECT blog_author.author_name from blog_author where blog_id={$post_latest['blog_id']}";

					$result3 = mysqli_query($conn, $query3);
					if ($result3 === false) {
						die(mysqli_error($conn));
					}
					$authors = mysqli_fetch_all($result3, MYSQLI_ASSOC);
					foreach ((array) $authors as $author) {
						echo $author["author_name"] . " ";
					}
					?>

				</p>
				<h2 class="title"><a href="<?php echo ROOT_URL; ?>single.php?blog_id=<?php echo $post_latest['blog_id']; ?>"><?php echo $post_latest['blog_title']; ?></a>
				</h2>
				<p class="blog-summary" style="padding-top:10px;">
					<?php echo $post_latest['blog_summary']; ?>
				</p>
			</div>
		</div>
	</article>
	<div class="article-group container mt-4 pt-2">
		<div class="row">

			<?php foreach ($posts as $key => $post) : ?>
				<?php if ($key === 0) {
					continue;
				}
				?>


				<article class="col-md-4 col-sm-6">
					<div class="meta-img"><img src="uploads/
					<?php
					
					$query4 = "SELECT img from blog_image where blog_id={$post['blog_id']}";
					$result4 = mysqli_query( $conn, $query4 );
if ( $result4 === FALSE ) {
	die( mysqli_error( $conn ) );
}
$image = mysqli_fetch_all( $result4, MYSQLI_ASSOC );
					foreach ((array) $image as $img) {
						echo ($img['img']);
					} ?>" alt="" class="img-fluid">
					</div>
					<div class="meta-text ">
						<p class="chapter by-line text-sans">
							<?php $query2 = "SELECT tags.tag from tags INNER JOIN blog_tag on tags.tag_id=blog_tag.tag_id where blog_id={$post['blog_id']}";

							$result2 = mysqli_query($conn, $query2);
							if ($result2 === false) {
								die(mysqli_error($conn));
							}
							$tags = mysqli_fetch_all($result2, MYSQLI_ASSOC);
							foreach ((array) $tags as $tag) {
								echo $tag["tag"];
							}

							$query3 = "SELECT blog_author.author_name from blog_author where blog_id={$post['blog_id']}";

							$result3 = mysqli_query($conn, $query3);
							if ($result3 === false) {
								die(mysqli_error($conn));
							}
							$authors = mysqli_fetch_all($result3, MYSQLI_ASSOC);
							foreach ((array) $authors as $author) {
								echo $author["author_name"] . " ";
							}
							?>

						</p>
						<h2 class="title"><a href="<?php echo ROOT_URL; ?>single.php?blog_id=<?php echo $post['blog_id']; ?>"><?php echo $post["blog_title"] ?></a>
						</h2>
						<p class="blog-summary">
							<?php echo $post['blog_summary']; ?>
						</p>
					</div>
				</article>

			<?php endforeach; ?>





		</div>

	</div>


</main>


<?php
require 'include/footer.php';
?>