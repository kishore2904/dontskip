<?php include('partials/header.php'); ?>

<?php 
        //CHeck whether id is passed or not
        if(isset($_GET['category_id']))
        {
            //Category id is set and get the id
            $category_id = $_GET['category_id'];
            // Get the CAtegory Title Based on Category ID
            $sql = "SELECT title FROM tbl_category WHERE category_id=$category_id";

            //Execute the Query
            $res = mysqli_query($conn, $sql);

            //Get the value from Database
            $row = mysqli_fetch_assoc($res);
            //Get the TItle
            $category_title = $row['title'];
        }
        else
        {
            //CAtegory not passed
            //Redirect to Home page
            header('location:'.SITEURL);
        }
    ?>
<!---------------------featured----------------------------->
    <div class="small-container">
        <div class="row row-2">
            <h2><?php echo $category_title;?></h2>
        </div>
        <div class="row">
        <?php
            $sql = $db->query("SELECT * FROM tbl_product WHERE category_id=$category_id");
            if($sql->num_rows > 0)
            {
                while($row = $sql->fetch_assoc())
                {
                    $id = $row['id'];
                    $product_name = $row['product_name'];
                    $product_price = $row['price'];
                    #$image_url = 'images/uploads/'.$row["file_name"];
                    ?>
                    <?php
                        include_once 'config/constants.php';
                        $query1 = $db->query("SELECT * FROM tbl_product_img where product_id=$id");
                        $imageURL ="";
                        if($query1->num_rows > 0)
                        {
                            while($row = $query1->fetch_assoc())
                            {
                                if($imageURL=="")
                                    {
                                        $image_url = 'images/uploads/'.$row["image_name"];
                                    }

                            }
                        }
                    ?>
                    <div class="col-4">
                            <a href="<?php echo SITEURL; ?>product_detail.php?id=<?php echo $id; ?>"><img src="<?php echo $image_url; ?>"  loading ="lazy" alt="">
                            <h4><?php echo $product_name;?></h4>
                            <div class="rating">
                                <ion-icon name="star"></ion-icon>
                                <ion-icon name="star"></ion-icon>
                                <ion-icon name="star"></ion-icon>
                                <ion-icon name="star"></ion-icon>
                                <ion-icon name="star-half"></ion-icon>
                            </div>
                            <h4>₹ <?php echo $product_price;?></h4></a>
                        </div>
                        <?php
                }
            }
        ?>
        </div>
    </div>
<?php include('partials/footer.php');?>