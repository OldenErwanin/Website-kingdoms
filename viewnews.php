<?php
	session_start();
	$conn = mysqli_connect('localhost', 'root', '', 'kingdoms');
	mysqli_query($conn,"set character set UTF8");


	// writeComment
	if (isset($_POST['writecomment-submit'])) {
	  $toid = $_GET['newsid'];
	  $text = $_POST['editor-Writecomment'];
	  $author = $_SESSION['uName'];
	  $date = date("Y-m-d H:i");
	  $sql = "INSERT INTO comments (toID, cAuthor, cDate, cText) VALUES (?, ?, ?, ?)";
	  $stmt = mysqli_stmt_init($conn);
	  if (!mysqli_stmt_prepare($stmt, $sql)) {
			header("Location: ../index.php?cwriteerror=sqlerror&error=".$stmt->error);
	    exit();
	  }
	  else {
	    mysqli_stmt_bind_param($stmt, "isss", $toid, $author, $date, $text);
	    mysqli_stmt_execute($stmt);
			$secondsWait = 0.2;
			header("Refresh:$secondsWait");
	    exit();
	  }
	}
	// /writeComment

	// editNnews
	if (isset($_POST['editnews-submit'])) {
		$id = $_GET['newsid'];
		$title = $_POST['nEdit-Title'];
	  $category = $_POST['nEdit-Category'];
	  $text = $_POST['editor-Editnews'];
	  $f = $_POST['nEdit-Featured'];
	  $featured = '0';
	  $featuredDate = '0000-00-00';
	  if ($f == true) {
	    $featured = '1';
	    $featuredDate = strtotime($_POST['nEdit-FeaturedDate']);
	  }
	  $newformat = date('Y-m-d',$featuredDate);

		$sql = "UPDATE news SET nTitle = ?, nText = ?, nCategory = ?, nFeatured = ?, nFeaturedDate = ? WHERE nID = ?";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
      echo $stmt->error;
      exit();
    }
    else {
      mysqli_stmt_bind_param($stmt, "sssssi", $title, $text, $category, $featured, $newformat, $id);
      mysqli_stmt_execute($stmt);
			$secondsWait = 0.2;
			header("Refresh:$secondsWait");
      exit();
    }
	}
	// /editNnews
?>
<!DOCTYPE html>
<html lang="hu">
  <head>
    <meta charset="utf-8">
    <title>Kingdoms Roleplay</title>
    <meta name=viewport content="width=device-width, initial-scale=1">
  	<link rel="stylesheet" type="text/css" href="css/style.css">
    <script src="lib/ckeditor/ckeditor.js"></script>
  	<script src="https://cdn.ckeditor.com/ckeditor5/12.0.0/classic/ckeditor.js"></script>
  </head>
  <body>

		<!-- edit-NewsPage -->
    <div id="editnews-Page">
  		<button onclick="return editnewsForm()" class="button regClose">Close</button>
  		<form class="form-Writenews" action="" method="post">
  			<label for="nEdit-Title">News title:</label>
  			<div class="input input-effect">
					<input class="inputEffect" type="text" name="nEdit-Title" placeholder="News title">
  				<span class="focus-border">
  					<i></i>
  				</span>
  			</div>
  			<select name="nEdit-Category">
  			  <option value="1">Server</option>
  			  <option value="2">Website</option>
  			  <option value="3">Blog</option>
  			</select>
  			<div class="editor-Editnews">
  				<textarea name="editor-Editnews" id="editor-Editnews"></textarea>
  			</div>
  			Featured news: <input type="checkbox" class="custom-Checkbox" id="newsFC" name="nEdit-Featured" value="Featured" onclick="return newsFeaturedDate()"><br>
  			<input type="date" id="newsFD" name="nEdit-FeaturedDate" >
  			<button class="button" type="submit" name="editnews-submit"><span class='glyphicon glyphicon-log-in'></span> Done</button>
  		</form>
  	</div>
		<!-- /edit-NewsPage -->

		<!-- write-CommentPage -->
    <div id="writecomment-Page">
      <button onclick="return writecommForm()" class="button regClose">Close</button>
      <form class="form-Writecomment" action="" method="post">
  			<label for="cWrite-Text">Comment text:</label>
  			<div class="editor-Writecomment">
  				<textarea name="editor-Writecomment" id="editor-Writecomment"></textarea>
  			</div>
  			<button class="button" type="submit" name="writecomment-submit"><span class='glyphicon glyphicon-log-in'></span> Done</button>
  		</form>
    </div>
		<!-- /write-CommentPage-->

    <!-- header -->
  	<?php require "header.php"; ?>
  	<!-- /header -->

  	<!-- body-container -->
  	<div id='body-container'>
  		<div id='body-left'>
        <form class="create-news" action="../index.php">
            <button class="button" type="submit" onclick="return writenewsForm()"><i class="fa fa-arrow-left"></i></button>
        </form>
  			<div class='title'><h1>News</h1></div>

				<!-- viewNews -->
  			<?php
  				$sqlNews = "SELECT * FROM news WHERE nID=".$_GET["newsid"];
  				$resultNews = mysqli_query($conn, $sqlNews);
  				while($row = mysqli_fetch_assoc($resultNews)) {
            echo '
              <div class="news-body">
                <div class="news-title">
                  <h4>'.$row["nTitle"].'</h4>
                </div>
                <div class="news-text">
                  <p>'.$row["nText"].'</p>
                </div>

                <div class="news-border"></div>
                <div class="news-data">
                  <p><span class="newsData-icon"><i class="fas fa-pen-nib"></i></span> '.$row["nAuthor"].'
                  <br><span class="newsData-icon"><i class="fas fa-calendar-alt"></i></span> '.$row["nDate"].'</p>
                </div>
                <div class="news-buttongroup">
            ';
        		if (isset($_SESSION['uID'])) {
        			echo '
                  <button onclick="return writecommForm()" class="news-buttonA button"><i class="far fa-comment-dots"></i> Comment</button><br>
                </div>
								';
						}
						if (isset($_SESSION['uID']) && ($_SESSION['uAdmin'] > 0)) {
		        	echo '
                <div class="news-buttongroup">
        					<button onclick="return editnewsForm()" class="news-buttonA button"><i class="far fa-edit"></i> Edit</button><br>
                </div>
                <div class="news-buttongroup">
        					<form method="post" action="includes/deletenews.inc.php">
        						<button class="news-buttonA button" type="submit" name="nDelete-submit" value="'.$row["nID"].'"><i class="glyphicon glyphicon-floppy-remove"></i> Delete</button>
        					</form>
        		';
        		}
        		echo '
                </div>
              </div>
            ';
  				  }
						// /viewNews

					// comments
          $sqlComm = "SELECT * FROM comments WHERE toID=".$_GET['newsid'];

  				$resultComm = mysqli_query($conn, $sqlComm);
  				while($row = mysqli_fetch_assoc($resultComm)) {
            echo '<div class="nComments-Body">
							<div class="nComments-Author">
                <h4><i class="fas fa-pen"></i> '.$row["cAuthor"].'</h4>
							</div>
              <div class="nComments-Data">
                '.date("Y-m-d", strtotime($row["cDate"])).'
								<span class="commentsData-icon"><i class="fas fa-calendar-alt"></i></span>
								<br>
								'.date("H:i", strtotime($row["cDate"])).'
								<span class="commentsData-icon"><i class="far fa-clock"></i></span>
              </div>
							<div class="nComments-Text">
								'.$row["cText"].'
							</div>
						</div>';
          }
					// /comments
  			?>
  		</div>
			<!-- /body-left -->

			<!-- body-right -->
  		<div id='body-right'>
  			<div class='title'><h1>Monitor</h1></div>
  		</div>
			<!-- /body-right -->
  	</div>
		<!-- body-container -->

		<!-- scripts -->
    <script>
  		CKEDITOR.replace( 'editor-Writecomment', {
  		});
			CKEDITOR.replace( 'editor-Editnews', {
  		});
    </script>
		<!-- /scripts -->
  </body>
</html>
