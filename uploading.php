<?php
	print("<html>\n\t<head>\n\t\t<title>Uploading file...</title></head><body>");

	$target_dir = "img/"; # test commend 
	$target_file = $target_dir . basename($_FILES["add"]["name"]);
	print("<h1>Uploading $target_file</h1>");

	$uploadOk = 1;
	$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
	
	// Check if image file is a actual image or fake image
	if(isset($_POST["submit"])) {
    	$check = getimagesize($_FILES["add"]["tmp_name"]);
    	if($check !== false) {
        	echo "<p>File is an image of type " . $check["mime"] . ".</p>";
        	$uploadOk = 1;
    	} 
    	else {
        	echo "<p>File is not an image.</p>";
        	$uploadOk = 0;
   		}}

	// Check if $uploadOk is set to 0 by an error
	if ($uploadOk == 0) {
    	echo "<p>Sorry, your file was not uploaded.</p>";
	// if everything is ok, try to upload file
	} else {
    if (move_uploaded_file($_FILES["add"]["tmp_name"], $target_file)) {
        echo "<p>The file ". basename( $_FILES["add"]["name"]). " has been uploaded.<p>";
    } else {
        echo "<p>Sorry, there was an error uploading your file.</p>";
    }
	}

	echo '<p><a href="upload_portal.html">Upload another</a><p>';
	echo '<form action="read_images_and_print_html.cgi">Click the button to <input type="submit" value="view images">';
	echo '</form>';
	echo '</body></html>';

?>
