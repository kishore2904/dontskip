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
                <a href="add-category.php" class="btn-primary">Add New Category</a>

                <br /><br /><br />

                <table class="tbl-full">
                    <tr>
                        <th>S.No</th>
                        <th>Category Name</th>
                        <th>Image</th>
                        <th>Featured</th>
                        <th>Active</th>
                        <th>Actions</th>
                    </tr>

                    <?php 
                        //Query to Get all CAtegories from Database
                        $query = $db->query("SELECT * FROM tbl_category");
                        $sn=1;
                        //Execute Query
                        if($query->num_rows > 0)
                        {
                            while($row = $query->fetch_assoc())
                            {
                                $id = $row['category_id'];
                                $name= $row['title'];
                                $featured = $row['featured'];
                                $active = $row['active'];
                                $imageURL = '../images/category/'.$row["image_name"];
                                
                                ?>
                                
                                <tr>
                                        <td><?php echo $sn++; ?>. </td>
                                        <td><?php echo $name?></td>
                                        <td><img src="<?php echo $imageURL?>" width="100px" alt=""></td>
                                        <td><?php echo $featured?></td>
                                        <td><?php echo $active?></td>
                                        <td>
                                            <a href="<?php echo SITEURL; ?>admin-panel/update-category.php?id=<?php echo $id; ?>" class="btn-secondary">Update Category</a>
                                            <a href="<?php echo SITEURL; ?>admin-panel/delete-category.php?id=<?php echo $id; ?>" class="btn-danger">Delete category</a>
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

<?php include('partials/footer.php'); ?>