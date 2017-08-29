<?php
	if (isset($_POST["submit"])) {
		$target_dir = "/var/www/html/oswald/cdn/mR5Xr8/";
		$num = md5(uniqid(rand(), true));
		$target_file = $target_dir . substr($num, 0, 5) . "-" . basename($_FILES["fileToUpload"]["name"]);
		if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
			echo "<title>Oswald Foundation CDN</title> <style> body { margin: 100px 200px; font-family: sans-serif } input { border: 1px solid #ccc; border-radius: 5px; width: 100%; max-width: 400px; padding: 20px; font: inherit; } ul { line-height: 1.5 } h2 { margin-top: 100px } </style><h2><a href='https://" . $_SERVER["SERVER_NAME"] . "/oswald/cdn/mR5Xr8/" . substr($num, 0, 5) . "-" . basename($_FILES["fileToUpload"]["name"]) . "'>https://" . $_SERVER["SERVER_NAME"] . "/cdn/mR5Xr8/" . substr($num, 0, 5) . "-" . basename($_FILES["fileToUpload"]["name"]) . "</a></h2><h2><a href=upload.php>Upload another</a></h2>";
		} else {
			echo "Sorry, there was an error uploading your file.";
		}
	} else {
?>
<title>Oswald Foundation CDN</title>
<style type="text/css">
	body { margin: 100px 200px; font-family: sans-serif }
	input { border: 1px solid #ccc; border-radius: 5px; width: 100%; max-width: 400px; padding: 20px; font: inherit; }
	ul { line-height: 1.5 } h2 { margin-top: 100px }
</style>
<h1>Oswald Foundation CDN</h1>
<h2>Upload files</h2>
<form method="post" enctype="multipart/form-data">
	<p>
		<input type="file" name="fileToUpload" id="fileToUpload">
	</p>
	<p>
		<input type="submit" value="Submit" name="submit">
	</p>
</form>
<h2>Files</h2>
<ul>
	<?php
		if ($dh = opendir("/var/www/html/oswald/cdn/mR5Xr8")) {
			while (($file = readdir($dh)) !== false) {
				echo "<li><a href='https://" . $_SERVER["SERVER_NAME"] . "/" . $file . "'>" . $file . "</a></li>\n";
			}
		}
	?>
</ul>
<?php
	}
?>