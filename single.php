<?php

require('config/config.php');
require('config/db.php');
?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css" />
<?php
$id = mysqli_real_escape_string($conn, $_GET['blog_id']);
$query1 = "SELECT * from blog_data where blog_id='$id'";
$query2 = "SELECT tags.tag from tags INNER JOIN blog_tag on tags.tag_id=blog_tag.tag_id AND blog_tag.blog_id=$id";
$query3 = "SELECT author_name from blog_author where blog_id='$id'";
$query4 = "SELECT img from blog_image where blog_id='$id'";

$result1 = mysqli_query($conn, $query1);
if ($result1 === FALSE) {
	die(mysqli_error($conn));
}
$post = mysqli_fetch_assoc($result1);
//var_dump($post);

$result2 = mysqli_query($conn, $query2);
if ($result2 === FALSE) {
	die(mysqli_error($conn));
}
$tags = mysqli_fetch_all($result2, MYSQLI_ASSOC);
//var_dump($tags);

$result3 = mysqli_query($conn, $query3);
if ($result3 === FALSE) {
	die(mysqli_error($conn));
}
$authors = mysqli_fetch_all($result3, MYSQLI_ASSOC);
//var_dump($authors);
$result4 = mysqli_query($conn, $query4);
if ($result4 === FALSE) {
	die(mysqli_error($conn));
}
$image = mysqli_fetch_all($result4, MYSQLI_ASSOC);
//var_dump( $image );


$content = $post['blog_content'];
//echo $content;

function estimate_reading_time($content)
{
	$word_count = str_word_count(strip_tags($content));

	$minutes = floor($word_count / 200);
	$seconds = floor($word_count % 200 / (200 / 60));

	$str_minutes = ($minutes == 1) ? "minute" : "minutes";
	$str_seconds = ($seconds == 1) ? "second" : "seconds";

	if ($minutes == 0) {
		return "{$seconds} {$str_seconds}";
	} else {
		return "{$minutes} {$str_minutes}, {$seconds} {$str_seconds}";
	}
}
$actual_link = "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$word_count = str_word_count(strip_tags($content));
?>

<?php $title = $post['blog_title']; ?>

<?php
require 'include/header.php';
require 'include/top-nav.php';
?>





<div class="share-btn-container">
	<a><i class="fa fa-share-alt"></i></a>
	<a href="#" class="facebook-btn">
		<i class="fab fa-facebook"></i>
	</a>

	<a href="#" class="twitter-btn">
		<i class="fab fa-twitter"></i>
	</a>



	<a href="#" class="linkedin-btn">
		<i class="fab fa-linkedin"></i>
	</a>

	<a href="#" class="whatsapp-btn">
		<i class="fab fa-whatsapp"></i>
	</a>
</div>


<main class="container px-md-5 single-blog mt-5">

	<div class="m-lg-5">
		<div class="m-lg-5">
			<p class="chapter text-center">
				<a href="">
					<?php foreach ((array) $tags as $tag) {
						echo $tag['tag'];
					} ?>
				</a>
			</p>
			<p class="by-line text-center text_small">Published by
				<a href="#" class="text_small">
					<?php foreach ((array) $authors as $author) {
						echo ($author['author_name']);
					} ?>
				</a>,
				<?php
				$time = $post['posted_on'];
				$timestamp = strtotime($time);
				echo date("d-m-Y", $timestamp);
				?>
			</p>
			<hr>
			<h1 class="title text-center">
				<?php echo $post['blog_title']; ?>
			</h1>
			<div class="p-2"><img src="uploads/<?php foreach ((array) $image as $img) {
																						echo ($img['img']);
																					} ?>" alt="" srcset="" class="img-fluid">
			</div>
			<hr>
			<p class="text-left article-summary font-italic ">
				<?php echo $post['blog_summary']; ?>
			</p>

			<hr>

			<div class="d-flex justify-content-between rounded my-2">
				<div class="p-3">
					<p class="d-flex flex-row justify-content-between">
						<div> Reading Time :
							<?php echo estimate_reading_time($content); ?> </div>
						<div> Word Count :
							<?php echo $word_count; ?> Words </div>

					</p>
				</div>

			</div>
			<hr>

			<?php echo $post['blog_content']; ?>
<?php 
$id = mysqli_real_escape_string($conn, $_GET['blog_id']);
if (isset($_REQUEST['add-name']) && isset($_REQUEST['add-email']) && isset($_REQUEST['add-comment'])){
	$com_name=mysqli_real_escape_string($conn, $_REQUEST['add-name']);
	$com_email=mysqli_real_escape_string($conn, $_REQUEST['add-email']);
	$com_content=mysqli_real_escape_string($conn, $_REQUEST['add-comment']);

	$stmt="INSERT INTO `blog_com`(`blog_id`, `com_name`, `com_email`, `com_content`) VALUES ($id,'$com_name','$com_email','$com_content' )";
	if (mysqli_query($conn, $stmt)) {
	echo "";
	} else {
		echo "ERROR: Could not able to execute $stmt. " . mysqli_error($conn);
	}

}

?>
			<!-- <div class="card-header">Share your thoughts on the article!</div>
			<div class="container">
				<div class="card card-comment card-body">


					<form id="comment-form">
						<div class="form-group">
							<label for="add-name">Name</label>
							<input type="text" class="form-control" id="add-name" placeholder="Agent P">
						</div>
						<div class="form-group">
							<label for="add-email">Email</label>
							<input type="email" class="form-control" id="add-email" placeholder="perry@platypus.com">
						</div>
						<div class="form-group">
							<label for="add-comment">Share your thoughts!</label>
							<textarea class="form-control" id="add-comment">
							</textarea>
						</div>
						<button type="submit" class="comment-btn btn btn-default">Post Comment</button>
					</form>

				</div>

				<ul id="comment-set"></ul>

			</div> -->
		</div>
</main>



<?php
require 'include/footer.php';
?>

<script>
	const facebookBtn = document.querySelector(".facebook-btn");
	const twitterBtn = document.querySelector(".twitter-btn");
	const linkedinBtn = document.querySelector(".linkedin-btn");
	const whatsappBtn = document.querySelector(".whatsapp-btn");

	function init() {

		let postUrl = encodeURI(document.location.href);
		let postTitle = encodeURI("Hey everyone,do check this article out: ");


		facebookBtn.setAttribute(
			"href",
			`https://www.facebook.com/sharer.php?u=${postUrl}`
		);

		twitterBtn.setAttribute(
			"href",
			`https://twitter.com/share?url=${postUrl}&text=${postTitle}`
		);



		linkedinBtn.setAttribute(
			"href",
			`https://www.linkedin.com/shareArticle?url=${postUrl}&title=${postTitle}`
		);

		whatsappBtn.setAttribute(
			"href",
			`https://wa.me/?text=${postTitle} ${postUrl}`
		);
	}

	init();
</script>

<script>
	const name = document.getElementById('add-name'),
		comment = document.getElementById('add-comment'),
		email = document.getElementById('add-email'),
		newComment = document.querySelector('#comment-set');
	class UI {
		addComment(e) {
			const li = document.createElement('li');
			li.className = 'comment-item';
			li.innerHTML = `
<hr>
<div class="row">
	<div class="col col-md-8">
		    <h4 class="ml-0 mt-3 mb-0 pb-0";>${name.value}</h4>
		
			<p>${comment.value}</p>
			
	</div>
</div>
`;

			newComment.appendChild(li);
			e.preventDefault();
		}
		clearFields() {
			name.value = '';
			comment.value = '';
			email.value = '';
		}
		showAlert(message, className) {
			const div = document.createElement('div');
			div.className = `alert ${className}`;
			div.appendChild(document.createTextNode(message));

			const container = document.querySelector('.card-body');

			const form = document.querySelector('#comment-form');
			container.insertBefore(div, form);
			setTimeout(function() {
				document.querySelector('.alert').remove();
			}, 2000);
		}
	}

	document.getElementById('comment-form').addEventListener('submit', function(e) {


		const ui = new UI();

		if (name.value === '' || comment.value === '') {
			ui.showAlert('Please fill all the fields', 'error')
		} else {
			ui.addComment(e);
			ui.showAlert('Comment added', 'success');
			ui.clearFields();
		}

	})
	document.getElementById('comment-set').addEventListener('click', function(e) {
		const ui = new UI();

	})
</script>