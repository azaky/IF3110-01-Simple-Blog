<?php
	require_once(dirname(__FILE__).'/db_controller.php');
	
	$db = new DB();
	$post = null;
	if (isset($_GET["id"])) {
		$id = $_GET["id"];
		$post = $db->getPost($id);
	}
	if (!$post) {
		header("location: index.php");
	}
?>

<!DOCTYPE html>
<html>
<head>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta name="description" content="Deskripsi Blog">
<meta name="author" content="Judul Blog">

<!-- Twitter Card -->
<meta name="twitter:card" content="summary">
<meta name="twitter:site" content="omfgitsasalmon">
<meta name="twitter:title" content="Simple Blog">
<meta name="twitter:description" content="Deskripsi Blog">
<meta name="twitter:creator" content="Simple Blog">
<meta name="twitter:image:src" content="{{! TODO: ADD GRAVATAR URL HERE }}">

<meta property="og:type" content="article">
<meta property="og:title" content="Simple Blog">
<meta property="og:description" content="Deskripsi Blog">
<meta property="og:image" content="{{! TODO: ADD GRAVATAR URL HERE }}">
<meta property="og:site_name" content="Simple Blog">

<link rel="stylesheet" type="text/css" href="assets/css/screen.css" />
<link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">

<!--[if lt IE 9]>
	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->

<title>Azaky Blog | <?php echo htmlentities($post["judul"]); ?></title>


</head>

<body class="default">
<div class="wrapper">

<nav class="nav">
	<a style="border:none;" id="logo" href="index.php"><h1>Azaky<span>-</span>Blog</h1></a>
	<ul class="nav-primary">
		<li><a href="new_post.php">+ Tambah Post</a></li>
	</ul>
</nav>

<article class="art simple post">
	
	<header class="art-header">
		<div class="art-header-inner" style="margin-top: 0px; opacity: 1;">
			<time class="art-time"><?php echo $post["tanggal"]; ?></time>
			<h2 class="art-title"><?php echo htmlentities($post["judul"]); ?></h2>
			<p class="art-subtitle"></p>
		</div>
	</header>

	<div class="art-body">
		<div class="art-body-inner">
			<hr class="featured-article" />
			<div><?php echo htmlentities($post["konten"]); ?></div>

			<hr />
			
			<h2>Komentar</h2>

			<div id="contact-area">
				<form method="post" id="form-komentar">
					<input name="post_id" value="<?php echo $post["id"]; ?>" id="_post_id" hidden>

					<label for="_nama">Nama:</label>
					<input type="text" name="nama" id="_nama" required>

					<label for="_email">Email:</label>
					<input type="text" name="email" id="_email" required>

					<label for="_komentar">Komentar:</label><br>
					<textarea name="komentar" rows="20" cols="20" id="_komentar"></textarea>

					<input type="submit" name="submit" value="Kirim" class="submit-button">
				</form>
			</div>

			<ul class="art-list-body" id="list-komentar">
			</ul>
		</div>
	</div>

</article>

<footer class="footer">
		<div class="back-to-top"><a href="#">Back to top</a></div>
		<div class="psi">&Psi;</div>
		<aside class="offsite-links">
			Ahmad Zaky | <a href="mailto:13512076@std.stei.itb.ac.id">13512076</a></br>
			<a class="twitter-link" href="http://github.com/azaky">GitHub</a>
		</aside>
</footer>

</div>

<script type="text/javascript" src="assets/js/comment.js"></script>
</body>
</html>