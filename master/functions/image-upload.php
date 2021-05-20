<?php 

if(isset($_POST['submit'])){ 
    // Include the database configuration file 
    include ('../config/constants.php');
    
     
    $id = $_POST['id'];
    $redirect ='location:../admin-panel/add-image.php?id='.$id;
    

    // File upload configuration 
    $targetDir = "../images/uploads/"; 
    $allowTypes = array('jpg','png','jpeg','gif'); 
     
    $statusMsg = $errorMsg = $insertValuesSQL = $errorUpload = $errorUploadType = ''; 
    $fileNames = array_filter($_FILES['files']['name']); 
    if(!empty($fileNames)){ 
        foreach($_FILES['files']['name'] as $key=>$val){ 
            // File upload path 
            $fileName = basename($_FILES['files']['name'][$key]);
            
            $ext = end(explode('.', $fileName));
            
            $date = date('Ymd_His');
            $mic= round(microtime(true));
            echo $mic;
            $upld_filename=$fileName.$mic.".".$ext;
            $targetFilePath = $targetDir . $fileName; 
            
            $targetFilePath1 = $targetDir.$upld_filename; 

            // Check whether file type is valid 
            $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION); 
            if(in_array($fileType, $allowTypes)){ 
                // Upload file to server 
                if(move_uploaded_file($_FILES["files"]["tmp_name"][$key], $targetFilePath1)){ 
                    // Image db insert sql 
                    $insertValuesSQL = "$fileName"; 
                    
                }else{ 
                    $errorUpload .= $_FILES['files']['name'][$key].' | '; 
                } 
            }else{ 
                $errorUploadType .= $_FILES['files']['name'][$key].' | '; 
            } 
         
         
        if(!empty($insertValuesSQL)){ 

            $insertValuesSQL = trim($upld_filename, ','); 

            $genQuery="INSERT INTO tbl_product_img (image_name,product_id) VALUES("."'".$insertValuesSQL."'".",$id)";

            echo $genQuery;
            // Insert image file name into database 
            $insert = $db->query($genQuery); 
            if($insert){ 
                $errorUpload = !empty($errorUpload)?'Upload Error: '.trim($errorUpload, ' | '):''; 
                $errorUploadType = !empty($errorUploadType)?'File Type Error: '.trim($errorUploadType, ' | '):''; 
                $errorMsg = !empty($errorUpload)?'<br/>'.$errorUpload.'<br/>'.$errorUploadType:'<br/>'.$errorUploadType; 
                $statusMsg = "Files are uploaded successfully.".$errorMsg; 
                header('location:'.SITEURL.'admin-panel/add-image.php');
            }else{ 
                $statusMsg = "Sorry, there was an error uploading your file."; 
                header('location:'.SITEURL.'admin-panel/add-image.php');
            } 
        } 
    }
    }else{ 
        $statusMsg = 'Please select a file to upload.'; 
        header('location:'.SITEURL.'admin-panel/add-image.php');
    } 
     
    // Display status message 
    echo $statusMsg; 
} 
?>