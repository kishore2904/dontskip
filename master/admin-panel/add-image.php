<?php include('partials/menu.php'); ?>

<?php 
    //CHeck whether id is set or not 
    if(isset($_GET['id']))
    {
        //Get all the details
        $id = $_GET['id'];

        //SQL Query to Get the Selected Food
        $sql2 = "SELECT * FROM tbl_product WHERE id=$id";
        //execute the Query
        $res2 = mysqli_query($conn, $sql2);

        //Get the value based on query executed
        $row2 = mysqli_fetch_assoc($res2);

        //Get the Individual Values of Selected Food
        $title = $row2['product_name'];
    }
    else
    {
        //Redirect to Manage Food
        header('location:'.SITEURL.'admin-panel/index.php');
    }
?>


<div class="main-content">
    <div class="wrapper">
        <h1>Upload Images</h1>
        <br><br>

        <rm action="" method="POST" enctype="multipart/form-data">
        <form action="../functions/image-upload.php" method="POST" enctype="multipart/form-data">
        
        <table class="tbl-30">

            <tr>
                <td>Title: </td>
                <td><?php echo $title;?></td>
            </tr>
            <tr>
                <td>Select Images: </td>
                <td>
                    <input type="file" name="files[]" multiple >
                </td>
            </tr>
            <tr>
                <td>
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                    <input type="hidden" name="current_image" value="<?php echo $current_image; ?>">

                    <input type="submit" name="submit" value="Upload Images" class="btn-secondary">
                </td>
            </tr>
        
        </table>
        
        </form>
        <?php
            // Include the database configuration file
            include_once '../config/constants.php';

            // Get images from the database
            $query1 = $db->query("SELECT * FROM tbl_product_img WHERE product_id=$id");
            if($query1->num_rows > 0)
            {
                    while($row = $query1->fetch_assoc())
                    {
                        $imagae_id = $row['image_id'];
                        $imageURL = '../images/uploads/'.$row["image_name"];
                        echo ""
                        ?>
                        <div class="container_delete">
                        <img src="<?php echo $imageURL; ?>" alt="" width="200px"/>
                        <div class="overlay">
                        <a href="<?php echo SITEURL; ?>admin-panel/delete-image.php?id=<?php echo $imagae_id; ?>&&image_name=<?php echo $row["image_name"] ;?> &&prd_id=<?php echo $id; ?>">Delete</a> 
                    </div>
                        <br>
                    </div>

                        
                        <?php
                    }
                }
            else
                            { 
                                ?>
                                <p>No image(s) found...</p>
                                <?php 
                            } 
                            ?>         

    </div>
</div>

<?php include('partials/footer.php'); ?>