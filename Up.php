<!DOCTYPE html>
<head>
    <title>
            UP
    </title>
</head>
<body>
    <form action="" method="post" enctype="multipart/form-data">
        <input type="file" name="file" >
        <button type="submit" name="submit">Upload</button>
    </form>
    <?php
      if(isset($_POST['submit'])){
        
          $file= $_FILES['file'];
          $fileName= $_FILES['file']['name'];
          if($fileName!=""){
              echo "$fileName";
          }
          else{
              echo "NO";
          }
          $fileTmpName= $_FILES['file']['tmp_name'];
          $fileSize= $_FILES['file']['size'];
          $fileError= $_FILES['file']['error'];
          $fileType= $_FILES['file']['type'];
          $fileExt= explode('.',$fileName);
          $fileActualExt= strtolower(end($fileExt));
          $allow=array('jpg','jpeg','png','pdf','pptx');
          if(in_array($fileActualExt,$allow)){
                if($fileError==0){
                    if($fileSize<1000000){
                        $fileNameNew= uniqid('',true).".".$fileActualExt;
                        $fileDestination='uploads/'.$fileNameNew;
                        move_uploaded_file($fileTmpName,$fileDestination);
                        echo $fileDestination;
                        echo "Success";
                    }
                    else{
                        echo "Your file size was too big";
                    }
                }
                else{
                    echo "There was an error uploading your file";
                    $err=$_FILES['file']['error'];
                    if($err==1){
                        echo " File size exceeded";
                    }
                }
          }
          else{
              echo "You cannot upload files of this type";
          }
      }
    ?>
</body>
</html>
