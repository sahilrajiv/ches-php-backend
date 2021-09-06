<?php

require('config/config.php');
require('config/db.php');
?>


<?php
if (isset($_REQUEST['title']) && isset($_REQUEST['summary']) && isset($_REQUEST['content']) && isset($_REQUEST['cat']) && isset($_REQUEST['authors'])) {
	$cats = mysqli_real_escape_string($conn, $_REQUEST['cat']);
	$authors = mysqli_real_escape_string($conn, $_REQUEST['authors']);
	$title = mysqli_real_escape_string($conn, $_REQUEST['title']);
	$summary = mysqli_real_escape_string($conn, $_REQUEST['summary']);
	$content = mysqli_real_escape_string($conn, $_REQUEST['content']);

	$cat = explode(";", $cats);
	$author = explode(";", $authors);

	$query1 = "SELECT blog_id FROM blog_data ORDER BY posted_on DESC LIMIT 1";
	$is = mysqli_query($conn, $query1);
	if ($is === FALSE) {
		die(mysqli_error($conn));
	}

	$row = mysqli_fetch_assoc($is);
	$prev_blog_id = $row["blog_id"];
	global $current_id;
	$current_id = $prev_blog_id + 1;
	echo $current_id;


	//Category Insertion if new

	foreach ((array) $cat as $single) {
		$query2 = "INSERT into tags (tag)
Select '$single' Where not exists(select * from tags where tag='$single')";
		if (mysqli_query($conn, $query2)) {
			echo "Added Cat Successfully";
		} else {
			echo "ERROR: Could not able to execute $query2. " . mysqli_error($conn);
		}
	}

	//Post Blog data to the table
	$sql1 = "INSERT INTO blog_data (blog_title, blog_summary , blog_content) VALUES ('$title', '$summary', '$content')";
	if (mysqli_query($conn, $sql1)) {
		echo '<script language="javascript">';
		echo 'alert("Added Successfully")';
		echo '</script>';
	} else {
		echo "ERROR: Could not able to execute $sql1. " . mysqli_error($conn);
	}

	//Add blog id and tag_id
	foreach ((array) $cat as $single) {
		$sql2 = " INSERT into blog_tag (tag_id, blog_id) VALUES ( (SELECT tag_id from tags WHERE tag='$single' ), '$current_id')";

		if (mysqli_query($conn, $sql2)) {
			echo "TAG is set now Successfully";
		} else {
			echo "ERROR: Could not able to execute $sql2. " . mysqli_error($conn);
		}
	}

	//author insertion
	foreach ((array) $author as $single) {
		$query3 = "INSERT into blog_author (blog_id, author_name) values ($current_id, '$single')";
		if (mysqli_query($conn, $query3)) {
			echo "Added Author Successfully";
		} else {
			echo "ERROR: Could not able to execute $query3. " . mysqli_error($conn);
		}
	}
}

if(isset($_POST['upload-cover'])){
 $query1 = "SELECT blog_id FROM blog_data ORDER BY posted_on DESC LIMIT 1";
	$is = mysqli_query($conn, $query1);
	if ($is === FALSE) {
		die(mysqli_error($conn));
	}

	$row = mysqli_fetch_assoc($is);
	$prev_blog_id = $row["blog_id"];
	global $current_id;
	$current_id = $prev_blog_id;
	echo $current_id;

 
	
  $target_dir = "uploads/";
  $target_file = $target_dir . basename($_FILES["file"]["name"]);

  // Select file type
  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

  // Valid file extensions
  $extensions_arr = array("jpg","jpeg","png","gif");

  // Check extension
  if( in_array($imageFileType,$extensions_arr) ){
		 $temp = explode(".", $_FILES["file"]["name"]);
		$newname=$current_id."_cover.".end($temp);
 
     // Insert record
     $query = "insert into blog_image(blog_id, img) values($current_id, '$newname')";
if (mysqli_query($conn, $query)) {
			echo "TAG is set now Successfully";
		} else {
			echo "ERROR: Could not able to execute $query. " . mysqli_error($conn);
		}
	
		
  
     // Upload file
     move_uploaded_file($_FILES['file']['tmp_name'],$target_dir.$newname);
		echo $newname;

  }
}
 


?>
<?php $title = "Add A Post "; ?>

<?php
require 'include/header.php';
require 'include/top-nav.php';
?>



<main class="container px-md-5 single-blog mt-5">
	<div class="m-lg-5">
<!--

	<form action="upload.php" method="post" enctype="multipart/form-data">
    Select Cover Image File to Upload:
    <input type="file" name="file">
    <input type="submit" name="cover" value="Upload">
</form>
-->


		
		<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
			
			<p><textarea class="container-fluid text-center" type="text" name="cat" placeholder=" Categories here"></textarea></p>

			<p> Published by <textarea type="text" name="authors" placeholder="Author Names here" class="container-fluid text-center"></textarea></p>
			<p class="text_small text-danger te">NOTE: Seperate Authors and Categories by semi-colons</p>
			<hr>
			<h1 class="text-left">
				<textarea class="container-fluid" name="title" id="title" placeholder=" Put the title here"></textarea>
			</h1>
			<p>
				<textarea class="container-fluid " name="summary" id="summary" placeholder="  Put the summary here"></textarea>
			</p>
			<textarea name="content" id="editor" placeholder=" Post Content Here.">


      </textarea>
			<p>
				<br>
				<input type="submit" value="Submit" class="btn btn-primary mt-1">
			</p>
		</form>

				<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype='multipart/form-data'>
			<div class="container border rounded p-3 my-2">
			<p class="text_small">Add cover image first. also, if cover not available upload the first image of the article here.</p>
			<input type='file' name='file' class="btn" />
			<input type='submit' value='Upload Cover' name='upload-cover' class="btn btn-info">
				<div class="container">
			<img src="uploads/<?php echo $newname;?>" class="img-fluid" alt="" height="50%" width="50%">
			</div>

				</div>
		</form>
		
	</div>
	
	
</main>
<script src="ckeditor/ckeditor.js"></script>
<script>
    CKEDITOR.replace('editor', {
        filebrowserUploadUrl: 'ck_upload.php',
        filebrowserUploadMethod: 'form'
    });
</script>

<!-- <script>
	ClassicEditor
		.create(document.querySelector('#editor'))
		.catch(error => {
			console.error(error);
		});
</script> -->





</body>

</html>