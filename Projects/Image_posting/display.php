<?php
include 'dbconnect.php';
if(isset($_POST['submit'])){
    $username = $_POST['username'];
    $description = $_POST['description'];
    $image = $_FILES['file'];

    //Accessing the image name from the array
    $imagefilename =  $image['name'];
    $imagefileerror =  $image['error'];
    //Accessing the image size from the array
    $imagefilesize =  $image['size'];
    //Accessing the temp name from the array (path where image file is stored)
    $imagefiletemp =  $image['tmp_name'];

    if(!$imagefileerror === 0){
      $failure = 'Unexpexted error occure';
      header("Location :modal.php?error=$failure");
    }

    //Seperate file and extenion with explode funtion which array returns array of the seprated elements
    $filename_seperate = explode('.',$imagefilename);
    //Accessing the extension
    $file_extension = strtolower(end($filename_seperate));

    //Checking the submitted file having appropriate extension or not
    //Extension must be in follwing 3 format
    $extensions = array('jpeg','png','jpg');

    if(in_array($file_extension,$extensions)){

        if($imagefilesize > 1000000){
          echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
          <strong>File Size exceed </strong> Image should less than 1MB.
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
        }
        else{
            //Assuming the file is in following extension format
            $upload_image = 'images/'.$imagefilename;
            //Now we will upload file in the images folder using following function
            move_uploaded_file($imagefiletemp,$upload_image);

            //sql query to store file in database
            // To store image in database through SQL query we have pass $upload_image (Becuase image is in that folder)
            $sql = "insert into `postinfo` (username,img,description) 
            values('$username','$upload_image','$description')"; 
            $result = mysqli_query($conn,$sql);
            if($result){
                echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                      Your post posted sucessfully.
                      <button type="button" class="btn-close" data-bs-dismiss="alert" 
                      aria-label="Close"></button>
                      </div>';
            }
            else{
                die(mysqli_error($conn));
            }
        }     
        
    
    }
    else{
      //If user did not select appropriate file extension.
        echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Please select appropriate file.</strong> File should be in .JPG, .JPEG, .PNG format
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
    }
}
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Feed</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" 
    crossorigin="anonymous">
    <style>
      img{
        width: 100px;
      }
    </style>
  </head>
  <body>
    <h1 class="text-center my-4">Feed</h1>
      <div class="container mt-5 d-flex justify-content-center ">
      <table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">Serial-No</th>
      <th scope="col">Username</th>
      <th scope="col">Description</th>
      <th scope="col">Image</th>
    </tr>
  </thead>
  <tbody>
    <?php
        $sql = "Select * from `postinfo`";
        $result = mysqli_query($conn,$sql);
        $serial_no = 1;
        while($row = mysqli_fetch_assoc($result)){
          //$serial_no = $row['sno'];
          $name = $row['username'];
          $desc = $row['description'];
          $image = $row['img'];
          echo '<tr>
          <th>'.$serial_no.'</th>
          <td>'.$name.'</td>
          <td>'.$desc.'</td>
          <td><img src='.$image.'></td>
        </tr>';
          $serial_no += 1;
        }
        
    ?>
    
  </tbody>
</table>
      </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" 
    crossorigin="anonymous"></script>
  </body>
</html>