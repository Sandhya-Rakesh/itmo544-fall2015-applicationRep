<?php
  // Start the session
  session_start();
  require 'vendor/autoload.php';
  // In PHP versions earlier than 4.1.0, $HTTP_POST_FILES should be used instead
  // of $_FILES.
  echo $_POST['useremail'];
  $uploaddir = '/tmp/';
  $uploadfile = $uploaddir . basename($_FILES['userfile']['name']);
  echo '<pre>';
  if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) {
      echo "File is valid, and was successfully uploaded.\n";
  } else {
      echo "Possible file upload attack!\n";
  }
  echo 'Here is some more debugging info:';
  print_r($_FILES);
  print "</pre>";

  #use Aws\S3\S3Client;
  $s3 = new Aws\S3\S3Client([
      'version' => 'latest',
      'region'  => 'us-west-2'
  ]);

  $bucket="nankurunaisa"

  # AWS PHP SDK version 3 create bucket
  $result = $s3->createBucket([
      'ACL' => 'public-read',
      'Bucket' => $bucket
  ]);
  
  $s3->waitUntil('BucketExists', array('Bucket' => $bucket));
  
  try 
  {
    // Upload data.
    $result = $s3->putObject([
      'ACL' => 'public-read',
      'Bucket' => $bucket,
      'Key' => $uploadfile
    ]); 

    // Print the URL to the object.
    $url = $result['ObjectURL'];
    echo $url;
  } catch (S3Exception $e) {
    echo $e->getMessage() . "\n";
  }
  
?>
