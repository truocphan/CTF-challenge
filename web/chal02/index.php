<?php
    if(isset($_GET['debug']))
        highlight_file(__FILE__);
    else
    {
        echo "<center><img src=\"./images/horse.jpg\"><hr>";

    	if(isset($_GET["file"]))
    	{
            if(file_exists(__DIR__ . $_GET["file"] . ".php"))
            {
                include __DIR__ . $_GET["file"] . ".php";
            }
            else {
                echo "<h1>The file \"" . __DIR__ . htmlspecialchars($_GET["file"]) . ".php\" does not exist.</h1>";
            }
            echo "<hr>";
    	}

    	if(isset($_POST["submit"])) {
            if(!is_dir("uploads"))
                mkdir("uploads", 0777, true);
    		$target_dir = "uploads/";
    		$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    		$uploadOk = 1;
    		$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    		// Check if image file is a actual image or fake image
    	
     	   $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        	if($check !== false) {
            	echo "File is an image - " . $check["mime"] . ".";
            	$uploadOk = 1;
        	} else {
            	echo "File is not an image.";
            	$uploadOk = 0;
        	}
    	
    		// Check if file already exists
    		if (file_exists($target_file)) {
    		    echo "Sorry, file already exists.";
    		    $uploadOk = 0;
    		}
    		// Check file size
    		if ($_FILES["fileToUpload"]["size"] > 500000) {
    		    echo "Sorry, your file is too large.";
    		    $uploadOk = 0;
    		}
    		// Allow certain file formats
    		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    		&& $imageFileType != "gif" ) {
    		    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    		    $uploadOk = 0;
    		}
    		// Check if $uploadOk is set to 0 by an error
    		if ($uploadOk == 0) {
    		    echo "Sorry, your file was not uploaded.";
    		// if everything is ok, try to upload file
    		} else {
    		    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    		        echo "The file " . htmlspecialchars(basename( $_FILES["fileToUpload"]["name"])) . " has been uploaded.";

                    unlink($target_file);
                    echo "The file " . htmlspecialchars(basename( $_FILES["fileToUpload"]["name"])) . " has been deleted.";
    		    } else {
    		        echo "Sorry, there was an error uploading your file.";
    		    }
    		}
    	}
?>
    <div>
        <form action="index.php" method="post" enctype="multipart/form-data">
            Select image to upload:
        	<input type="file" name="fileToUpload" id="fileToUpload">
        	<input type="submit" value="Upload Image" name="submit">
        </form>
    </div>
</center>
<!-- /?debug -->
<?php } ?>
