<?php
	session_start();
	$conn = mysqli_connect('localhost', 'root', '', 'kingdoms');
	mysqli_query($conn,"set character set UTF8");
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Kingdoms Roleplay</title>
	<meta name="description" content="Kingdoms Roleplay MTA:SA server website">
	<meta name=viewport content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="lib/ckeditor/ckeditor.js"></script>
	<script src="https://cdn.ckeditor.com/ckeditor5/12.0.0/classic/ckeditor.js"></script>
	<script src="js/scripts.js" type="text/javascript"></script>
  <style>
		body {
		  background-color: #5d482b;
		}
	</style>
</head>
<body>
	<!-- forms-above -->
	<div id="writenews-Page">
		<button onclick="return writenewsForm()" class="button regClose">Close</button>
		<form class="form-Writenews" action="includes/writenews.inc.php" method="post">
			<label for="nWrite-Title">News title:</label><br>
			<div class="input input-effect">
				<input class="inputEffect" type="text" name="nWrite-Title" placeholder="News title">
				<span class="focus-border">
					<i></i>
				</span>
			</div><br>
			<label for="nWrite-Category">News category:</label><br>
			<select name="nWrite-Category">
			  <option value="1">Server</option>
			  <option value="2">Website</option>
			  <option value="3">Blog</option>
			</select><br>
			<label for="editor-Writenews">News text:</label><br>
			<div class="editor-Writenews">
				<textarea name="editor-Writenews" id="editor-Writenews"></textarea>
			</div><br>
			<span id="nWriteCKtext">Featured news: </span><input type="checkbox" class="custom-Checkbox" id="newsFC" name="nWrite-Featured" value="Featured" onclick="return newsFeaturedDate()"><br>
			<input type="date" id="newsFD" min="<?php $date = date('Y-m-d', strtotime("+1 day")); echo $date; ?>" name="nWrite-FeaturedDate" ><br>
			<button class="button" type="submit" name="writenews-submit"><span class='glyphicon glyphicon-log-in'></span> Done</button>
		</form>
	</div>
	<!-- /forms-above -->

	<!-- header -->
	<?php require "header.php"; ?>
	<!-- /header -->

	<!-- body-container -->
	<div id='body-container'>
		<div id='body-left'>
			<!-- nWrite-button -->
			<?php
				if (isset($_SESSION['uID']) && ($_SESSION['uAdmin'] > 0)) {
					echo '
						<div class="create-news">
								<button class="button" type="button" onclick="return writenewsForm()"><i class="fa fa-plus"></i></button>
						</div>
					';
				}
			?>
			<!-- /nWrite-button -->
			<div class='title'><h1>News</h1></div>
			<!-- sort-news -->
			<div class="news-sort">
				<ul>
					<li><a class='sortAll active' href="#" onclick="newssortChange('All')">All</a></li>
					<li><a class='sortServer' href="#" onclick="newssortChange('Server')">Server</a></li>
					<li><a class='sortWebsite' href="#" onclick="newssortChange('Website')">Website</a></li>
					<li><a class='sortBlog' href="#" onclick="newssortChange('Blog')">Blog</a></li>
				</ul>
				<input type="hidden" id="hiddenSort" name="hiddenAll"/>
			</div>
			<!-- /sort-news -->

			<!-- news -->
			<?php
				$sqlFeatured = "SELECT * FROM news WHERE nFeatured = 1 AND nFeaturedDate > NOW() ORDER BY nID DESC";
				$sqlSimple = "SELECT * FROM news WHERE nFeaturedDate < NOW() ORDER BY nID DESC";
				$resultFeatured = mysqli_query($conn, $sqlFeatured);
				$resultSimple = mysqli_query($conn, $sqlSimple);
				$now = time();
				// featured-news
				while($rowFeatured = mysqli_fetch_assoc($resultFeatured)) {
					echo '
						<div class="news-bodyStr">
							<div class="news-title">
								<h4>
									';
									 if ($rowFeatured["nCategory"] == 1) {echo '<i class="fas fa-server"></i> ';}
									 if ($rowFeatured["nCategory"] == 2) {echo '<i class="fas fa-globe"></i> ';}
									 if ($rowFeatured["nCategory"] == 3) {echo '<i class="fab fa-blogger-b"></i> ';}
									echo '
									'.$rowFeatured["nTitle"].'
								</h4>
							</div>
							<div class="news-text">
								<p>'.$rowFeatured["nText"].'</p>
							</div>
							<div class="news-border"></div>
							<div class="news-data">
								<p><span class="newsData-icon"><i class="fas fa-pen-nib"></i></span> '.$rowFeatured["nAuthor"].'
								<br><span class="newsData-icon"><i class="fas fa-calendar-alt"></i></span> '.$rowFeatured["nDate"].'</p>
							</div>
							<div class="news-buttongroup">
								<form method="post" action="../viewnews.php?newsid='.$rowFeatured["nID"].'">
									<button class="news-buttonC button" type="submit" name="nComments-submit"><i class="far fa-comments"></i></button>
								</form>
							</div>

						</div>
					';
				}
				// /featured-news

				// simple-news
				while($rowSimple = mysqli_fetch_assoc($resultSimple)) {
					echo '
						<div class="news-body">
							<div class="news-title">
								<h4>
									';
									 if ($rowSimple["nCategory"] == 1) {echo '<i class="fas fa-server"></i> ';}
									 if ($rowSimple["nCategory"] == 2) {echo '<i class="fas fa-globe"></i> ';}
									 if ($rowSimple["nCategory"] == 3) {echo '<i class="fab fa-blogger-b"></i> ';}
									echo '
									'.$rowSimple["nTitle"].'
								</h4>
							</div>
							<div class="news-text">
								<p>'.$rowSimple["nText"].'</p>
							</div>
							<div class="news-border"></div>
							<div class="news-data">
								<p><span class="newsData-icon"><i class="fas fa-pen-nib"></i></span> '.$rowSimple["nAuthor"].'
								<br><span class="newsData-icon"><i class="fas fa-calendar-alt"></i></span> '.$rowSimple["nDate"].'</p>
							</div>
							<div class="news-buttongroup">
								<form method="post" action="../viewnews.php?newsid='.$rowSimple["nID"].'">
									<button class="news-buttonC button" type="submit" name="nComments-submit"><i class="far fa-comments"></i></button>
								</form>
							</div>

						</div>
					';
				}
				// /simple-news
			?>
		</div>
		<!-- /news -->

		<!-- right-body -->
		<div id='body-right'>
			<div class='title'><h1>Monitor</h1></div>
		</div>
		<!-- /right-body -->
	</div>
	<!-- /body-container -->

	<!-- scripts -->
	<script src="js/scripts.js"></script>
	<script>
		CKEDITOR.replace( 'editor-Writenews', {
		});
		CKEDITOR.replace( 'editor-Editnews', {
		});

		function newssortChange(sortID) {
			var activeClass = document.getElementsByClassName("active")[0];
			activeClass.classList.remove("active");

		  var selectSort = document.getElementsByClassName("sort"+ sortID)[0];
			selectSort.classList.add("active");
		}
  </script>
	<!-- /scripts -->
</body>
</html>
