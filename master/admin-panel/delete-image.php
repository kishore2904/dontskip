<?php 
    //Include COnstants Page
    include('../config/constants1.php');

    //echo "Delete Food Page";

    if(isset($_GET['id'])) //Either use '&&' or 'AND'
    {
        //Process to Delete
        //echo "Process to Delete";

        //1.  Get ID and Image NAme
        $id = $_GET['id'];
        $file_name = $_GET['image_name'];
        $prd_id=$_GET['prd_id'];
        $redirect='location:'.'add-image.php?id='.$prd_id;
        //2. Remove the Image if Available
        //CHeck whether the image is available or not and Delete only if available


        //3. Delete Food from Database
        $sql = "DELETE FROM tbl_product_img WHERE image_id=$id";
        //Execute the Query
        $res = mysqli_query($conn, $sql);

        //CHeck whether the query executed or not and set the session message respectively
        //4. Redirect to Manage Food with Session Message
        if($res==true)
        {
            //Food Deleted
            $_SESSION['delete'] = "<div class='success'>Image Deleted Successfully.</div>";
            
            header($redirect);
        }
        else
        {
            //Failed to Delete Food
            $_SESSION['delete'] = "<div class='error'>Failed to Delete image...</div>";
            header($redirect);
        }
       
    }
    else
    {
        //Redirect to Manage Food Page
        //echo "REdirect";
        $_SESSION['unauthorize'] = "<div class='error'>Unauthorized Access.</div>";
        header('location:'.'manage-product.php');
    }

?>