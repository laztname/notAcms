<?php
error_reporting(0);
if (!isset($_FILES['files'])) {
	echo "";
} else {
	$target_dir = "/var/www/abogoboga/uploads/"; # change this
	$target_file = $target_dir . basename($_FILES["files"]["name"]);
	$uploadOk = 1;
	$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

	if (file_exists($target_file)) {
	    echo "Sorry, file already exists.\n";
	    $uploadOk = 0;
	    die();
	}
	if ($_FILES["files"]["size"] > 500) {
	    echo "Sorry, your file is too large.\n";
	    $uploadOk = 0;
	    die();
	}
	if($imageFileType != "txt" ) {
	    echo "Sorry, file type not allowed.\n";
	    $uploadOk = 0;
	    die();
	}
	$data = file_get_contents($_FILES['files']['tmp_name']);
	if (preg_match("/exec|php|passthru|shell_exec|system|proc_open|popen|curl_exec|curl_multi_exec|parse_ini_file|show_source/", strtolower($data), $match)) {
	    echo "Sorry, your file detected as virus/malware";
	    $uploadOk = 0;
	    die();
	} else {
	    $uploadOk = 1;
	}


	if ($uploadOk == 0) {
	    echo "Sorry, your file was not uploaded.\n";
	    die();
	} else {
	    if (move_uploaded_file($_FILES["files"]["tmp_name"], $target_file)) {
	        echo "The file ". basename( $_FILES["files"]["name"]). " has been uploaded.\n";
	    } else {
	        echo "Sorry, there was an error uploading your file.\n";
	        die();
	    }
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Upload Your File</title>
</head>
<body>
	<h1>Simple Uploader</h1>
	<form method="post" enctype="multipart/form-data">
	    Select file to upload:
	    <input type="file" name="files" id="files">
	    <input type="submit" value="Upload Image" name="submit">
	</form>
</body>
</html>