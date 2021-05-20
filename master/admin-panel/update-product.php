<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Update Product</h1>

        <br><br>

        <?php 
            //1. Get the ID of Selected Admin
            $id=$_GET['id'];
            

            //2. Create SQL Query to Get the Details
            $sql="SELECT * FROM tbl_product WHERE id=$id";

            //Execute the Query
            $res=mysqli_query($conn, $sql);

            //Check whether the query is executed or not
            if($res==true)
            {
                // Check whether the data is available or not
                $count = mysqli_num_rows($res);
                //Check whether we have admin data or not
                if($count==1)
                {
                    // Get the Details
                    //echo "Admin Available";
                    $row=mysqli_fetch_assoc($res);

                    $product_name = $row['product_name'];
                    $product_description = $row['description'];
                    $product_price = $row['price'];
                    $features =$row['features'];
                    $categories = $row['category_id'];
                    $tags = $row['tags'];
                    $origin = $row['origin'];
                    $featured = $row['featured'];
                    $active = $row['active'];
                    $current_category = $row['category_id'];
                }
                else
                {
                    //Redirect to Manage Admin PAge
                    header('location:'.SITEURL.'admin-panel/manage-product.php');
                }
            }
        
        ?>


        <form action="" method="POST">

            <table class="tbl-30">
                <tr>
                    <td>Product Name: </td>
                    <td>
                        <input type="text" name="product_name" value="<?php echo $product_name; ?>">
                    </td>
                </tr>

                <tr>
                    <td>Product Description: </td>
                    <td>
                    <textarea name="product_description" cols="30" rows="5" placeholder=""><?php echo $product_description; ?></textarea>
                    </td>
                </tr>
                <tr>
                    <td>Product price: </td>
                    <td>
                        <input type="text" name="product_price" value="<?php echo $product_price; ?>">
                    </td>
                </tr>
                <tr>
                    <td>Product Features: </td>
                    <td>
                        <input type="text" name="product_features" value="<?php echo $features; ?>">
                    </td>
                </tr>
                <tr>
                <td>Category: </td>
                <td>
                    <select name="category"  multiple="multiple" id="myMulti"> >

                        <?php 
                            //Query to Get ACtive Categories
                            $sql = "SELECT * FROM tbl_category WHERE active='Yes'";
                            //Execute the Query
                            $res = mysqli_query($conn, $sql);
                            //Count Rows
                            $count = mysqli_num_rows($res);

                            //Check whether category available or not
                            if($count>0)
                            {
                                //CAtegory Available
                                while($row=mysqli_fetch_assoc($res))
                                {
                                    $category_title = $row['title'];
                                    $category_id = $row['id'];
                                    
                                    //echo "<option value='$category_id'>$category_title</option>";
                                    ?>
                                    <option <?php if($current_category==$category_id){echo "selected";} ?> value="<?php echo $category_id; ?>"><?php echo $category_title; ?></option>
                                    <?php
                                }
                            }
                            else
                            {
                                //CAtegory Not Available
                                echo "<option value='0'>Category Not Available.</option>";
                            }

                        ?>

                    </select>
                </td>
            </tr>

            <tr>
                <td>Featured: </td>
                <td>
                    <input <?php if($featured=="Yes") {echo "checked";} ?> type="radio" name="featured" value="Yes"> Yes 
                    <input <?php if($featured=="No") {echo "checked";} ?> type="radio" name="featured" value="No"> No 
                </td>
            </tr>

            <tr>
                <td>Active: </td>
                <td>
                    <input <?php if($active=="Yes") {echo "checked";} ?> type="radio" name="active" value="Yes"> Yes 
                    <input <?php if($active=="No") {echo "checked";} ?> type="radio" name="active" value="No"> No 
                </td>
            </tr>
                <tr>
                    <td>Product Tags: </td>
                    <td>
                        <input type="text" name="product_tags" value="<?php echo $tags; ?>">
                    </td>
                </tr>
                <tr>
                    <td>Product Origin: </td>
                    <td>
                        <input type="text" name="product_origin" value="<?php echo $origin; ?>">
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="submit" name="submit" value="Update Product" class="btn-secondary">
                    </td>
                </tr>

            </table>

        </form>
    </div>
</div>

<?php 

    //Check whether the Submit Button is Clicked or not
    if(isset($_POST['submit']))
    {
        //echo "Button CLicked";
        //Get all the values from form to update
        $id = $_POST['id'];
        $product_name = $_POST['product_name'];
        $product_description = $_POST['product_description'];
        $product_price = $_POST['product_price'];
        $product_features = $_POST['product_features'];
        $product_categories = $_POST['category'];
        $featured = $_POST['featured'];
        $active = $_POST['active'];
        $product_tags = $_POST['product_tags'];
        $product_origin = $_POST['product_origin'];
        $_description=nl2br(str_replace("'","''",$product_description));
        $_features=nl2br(str_replace("'","''",$product_features));


        //Create a SQL Query to Update Admin
        $sql = "UPDATE tbl_product SET
        product_name = '$product_name',
        description = '$_description',
        price = '$product_price',
        features = '$_features',
        category_id = '$category',
        featured = '$featured',
        active = '$active'
        tags = '$product_tags',
        origin = '$product_origin'
        WHERE id='$id'
        ";

        //Execute the Query
        $res = mysqli_query($conn, $sql);

        //Check whether the query executed successfully or not
        if($res==true)
        {
            //Query Executed and Admin Updated
            $_SESSION['update'] = "<div class='success'>Product Updated Successfully.</div>";
            //Redirect to Manage Admin Page
            header('location:'.SITEURL.'admin-panel/manage-product.php');
        }
        else
        {
            //Failed to Update Admin
            $_SESSION['update'] = "<div class='error'>Failed to Delete Admin.</div>";
            //Redirect to Manage Admin Page
            header('location:'.SITEURL.'admin-panel/manage-product.php');
        }
    }

?>


<?php include('partials/footer.php'); ?>