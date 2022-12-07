<?php
$target_dir = "nmon_upload/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;

// Check if file already exists
if (file_exists($target_file)) {
  echo "<li>Sorry, file already exists<br>";
  $uploadOk = 0;
}

// Check file size
if ($_FILES["fileToUpload"]["size"] > 10000000) {
  echo "<li>Sorry, your file is too large<br>";
  echo "<li>The file size limit is 10 MB<br>";
  echo "<li>This fIle Size : ".$_FILES["fileToUpload"]["size"]." byte";
  $uploadOk = 0;
}

// .nmon file check
$orig_file_name = $_FILES["fileToUpload"]["name"];
$exploded_file = explode(".", $orig_file_name);
$file_extension = array_pop($exploded_file);
//echo "Result : $file_extension";
if ($file_extension != "nmon"){
        echo "<li>Sorry, Change the file extension to .nmon, <br>";
        echo "<li>The system only supports nmon analysis files <br>";
        $uploadOk = 0;
}



// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "<li>your file was not uploaded.";
    echo "<script>setTimeout(function(){window.close()}, 5000);</script>";
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    echo "<li>The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded<br>";
    echo "<li>The screen will end after 5 seconds.";
    echo "<script>setTimeout(function(){window.close()}, 5000);</script>";
  } else {
    echo "<li>there was an error uploading your file.";
    echo "<script>setTimeout(function(){window.close()}, 5000);</script>";
  }
}
?>
