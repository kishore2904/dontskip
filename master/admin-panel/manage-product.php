<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Manage Product</h1>

        <br /><br />
        <?php 
        
            if(isset($_SESSION['add']))
            {
                echo $_SESSION['add'];
                unset($_SESSION['add']);
            }

            if(isset($_SESSION['remove']))
            {
                echo $_SESSION['remove'];
                unset($_SESSION['remove']);
            }

            if(isset($_SESSION['delete']))
            {
                echo $_SESSION['delete'];
                unset($_SESSION['delete']);
            }

            if(isset($_SESSION['no-category-found']))
            {
                echo $_SESSION['no-category-found'];
                unset($_SESSION['no-category-found']);
            }

            if(isset($_SESSION['update']))
            {
                echo $_SESSION['update'];
                unset($_SESSION['update']);
            }

            if(isset($_SESSION['upload']))
            {
                echo $_SESSION['upload'];
                unset($_SESSION['upload']);
            }

            if(isset($_SESSION['failed-remove']))
            {
                echo $_SESSION['failed-remove'];
                unset($_SESSION['failed-remove']);
            }
        
        ?>
        <br><br>
            <!-- Button to Add Admin -->
                <a href="add-product.php" class="btn-primary">Add New Product</a>

                <br /><br /><br />

                <div class="table">
                    <table>
                        <tr>
                            <th id="header">S.No</th>
                            <th id="header">Name</th>
                            <th id="header">Product Description</th>
                            <th id="header">Product Price</th>
                            <th>Tags</th>
                            <th>Features</th>
                            <th id="header">Actions</th>
                            
                        </tr>

                    <?php 
                        //Query to Get all CAtegories from Database
                        $query = $db->query("SELECT * FROM tbl_product");
                        $sn=1;
                        //Execute Query
                        if($query->num_rows > 0)
                        {
                            while($row = $query->fetch_assoc())
                            {
                                $id = $row['id'];
                                $name= $row['product_name'];
                                $price = $row['price'];
                                $description =$row['description'];
                                $features = $row['features'];
                               
                                
                                ?>
                                
                                <tr>
                                        <td><?php echo $sn++; ?>. </td>
                                        <td ><a href="<?php echo SITEURL; ?>admin-panel/add-image.php?id=<?php echo $id; ?>"><?php echo $name?></a></td>
                                        <td><p><?php echo $description;?></p></td>
                                        <td><?php echo $price;?></td>
                                        <td><a href="<?php echo SITEURL; ?>admin-panel/add-tags.php?id=<?php echo $id;?>">Add Tag</a></td>
                                        <td><a href="<?php echo SITEURL; ?>admin-panel/add-features.php?id=<?php echo $id;?>">Add Features</a></td>
                                        <td>
                                            <a href="<?php echo SITEURL; ?>admin-panel/update-product.php?id=<?php echo $id; ?>" class="btn-secondary">Update Product</a>
                                            <a href="<?php echo SITEURL; ?>admin-panel/delete-product.php?id=<?php echo $id; ?>" class="btn-danger">Delete Product</a>
                                        </td>
                                </tr>
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
                </table>

                </div>

                
    </div>
    
</div>

<?php include('partials/footer.php'); ?>