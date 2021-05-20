<?php include('config/constants.php');?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="images/logo3.png" type="image/x-icon">
    <title>Dontskip</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.3/css/fontawesome.min.css">
</head>
<body>
<!---------------------Navigation----------------------------->
    <div class="header">
        <div class="container">
            <div class="navbar">
                <div class="logo">
                    <a href="index.php"><img src="images/logo3.png" alt="" width="150px"></a>
                </div>
                <div class="logo1">
                    <a href="index.php"><img src="images/logo5.jpeg" alt="" width="50px"></a>
                </div>
                <nav>
                    <ul id="MenuItems">
                        <li><a href="index.php">Home</a></li>
                        <li><a href="about.php">About</a></li>
                        <li><a href="categories.php">Categories</a></li>
                        <li><a href="products.php">Products</a></li>
                        <li><a href="contact.php">Contact</a></li>
                    </ul>
                </nav>
                <div class="menu-icon" onclick="menutoggle()">
                    <ion-icon name="menu-outline"></ion-icon>   
                </div>
            </div>  
            <div class="row">
                <div class="col-2">
                    <h1>Hear Every Detail, <br> Feel Every Emotion</h1>
                    <a href="products.php" class="btn">Explore More &#8594;</a>
                </div>
                <div class="col-2">
                    <img src="images/contact.jpg" alt="" width="250px"> 
                </div>
            </div>  
        </div>
    </div>
<!---------------------Categories----------------------------->
<div class="small-container">
        <h2 class="title">Categories</h2>
        <div class="row">
            <?php
                 $sql = $db->query("SELECT * FROM tbl_category LIMIT 4");
                 if($sql->num_rows > 0)
                 {
                     while($row = $sql->fetch_assoc())
                     {
                         $id = $row['category_id'];
                         $product_name = $row['title'];
                         $imageURL = 'images/category/'.$row["image_name"];
                         
                         ?>
                         <div class="col-4">
                                 <a href="<?php echo SITEURL; ?>category_product.php?category_id=<?php echo $id; ?>">
                                 <img src="<?php echo $imageURL; ?>" alt="">
                                 <h4><?php echo $product_name;?></h4></a>
                             </div>
                             <?php
                     }
                 }
            ?>
            <a href="categories.php" class="btn">Show More >></a>
        </div>
    </div>
<!---------------------featured----------------------------->
    <div class="small-container">
        <h2 class="title">Featured products</h2>
        <div class="row">
            <?php
                 $sql = $db->query("SELECT * FROM tbl_product LIMIT 4");
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
                                 <a href="<?php echo SITEURL; ?>product_detail.php?id=<?php echo $id; ?>"><img src="<?php echo $image_url; ?>" alt="">
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
            <a href="products.php" class="btn">Show More >></a>
        </div>
    </div>
    
<!---------------------Offer----------------------------->
        <div class="offer">
            <div class="small-container">
                <div class="row">
                    <div class="col-2">
                        <img src="images/logo7.jpeg" class="offer-img" alt="">
                    </div>
                    <div class="col-2">
                        <h2>Get your exclusive <br> Sound system</h2>
                        <a href="contact.php" class="btn">Contact Us</a>
                    </div>
                </div>
            </div>
        </div>
<!---------------------Testimonial----------------------------->

        <div class="testimonial">
            <div class="small-container">
                <h2 class="title">Testimonial</h2>
                <div class="row">
                    <?php
                        $sql = $db->query("SELECT * FROM feedback_form LIMIT 3");
                        //Execute the Query
                        if($sql->num_rows > 0)
                        {
                            while($row = $sql->fetch_assoc())
                            {
                                $full_name = $row['customer_name'];
                                $email=$row['email_address'];
                                $feedback=$row['feedback'];
                                ?>
                                <div class="col-3">
                                        <h1>"</h1>
                                        <p><?php echo $feedback;?></p>
                                        <div class="rating">
                                            <ion-icon name="star"></ion-icon>
                                            <ion-icon name="star"></ion-icon>
                                            <ion-icon name="star"></ion-icon>
                                            <ion-icon name="star"></ion-icon>
                                            <ion-icon name="star-half"></ion-icon>
                                        </div>
                                        <img src="images/logo5.jpeg" alt="">
                                        <h3><?php echo $full_name;?></h3>
                                    </div>
                                    <?php
                            }
                        }
                    ?>
                </div>
            </div>
        </div>
        
        
<!---------------------Footer----------------------------->
        <div class="footer">
            <div class="container">
                <div class="row">
                    <div class="footer-col-1">
                        <h3>All Copyrights 2021</h3>
                        <p>don'tskip</p>
                    </div>
                    <div class="footer-col-2">
                        <h3>Useful links</h3>
                        <ul>
                            <li><a href="contact.php"><ion-icon name="pricetags-sharp"></ion-icon>Contact Us</a></li>
                            <li><a href="about.php"><ion-icon name="book-sharp"></ion-icon>About Us</a></li>
                            <li><a href=""><ion-icon name="bus-outline"></ion-icon>Return Policy</a></li>
                        </ul>
                    </div>
                    <div class="footer-col-3">
                        <h3>Follow Us</h3>
                        <ul>
                            <li><a href="https://www.facebook.com/7.2cinemas"><ion-icon name="logo-facebook"></ion-icon>Facebook</a></li>
                            <li><a href="https://www.instagram.com/dontskiptrichy/"><ion-icon name="logo-instagram"></ion-icon>Instagram</a></li>
                            <li><a href=""><ion-icon name="logo-whatsapp"></ion-icon>WhatsApp</a></li>
                            <li><a href="mailto:dontskip.in@gmail.com"><ion-icon name="mail-outline"></ion-icon>Gmail</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        
<!-----------------------------JS For Menu Toggle--------------------------->
        <script>
            var MenuItems = document.getElementById("MenuItems");
            MenuItems.style.maxHeight = "0px";
            function menutoggle(){
                if(MenuItems.style.maxHeight == "0px")
                {
                    MenuItems.style.maxHeight = "200px";
                }
                else
                {
                        MenuItems.style.maxHeight = "0px";
                }
            }
        </script>
    <script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script>
    
</body>
</html>