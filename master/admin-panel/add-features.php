<?php include('partials/menu.php');?>
<?php
    $id = $_GET['id'];
    $query = $db->query("SELECT * FROM tbl_product WHERE id=$id");
    if($query->num_rows > 0)
    {
        while($row = $query->fetch_assoc())
        {
            $id = $row['id'];
            $name= $row['product_name'];
        }
    }
?>
<div class="main-content">
    <div class="wrapper">
        <h1><?php echo $name?></h1>
        <form action="" method="post">
            <table class="tbl-30">
                <tr>
                    <td><h3>Features Heading</h3></td>
                    <td>
                        <input type="text" name="feature_heading" placeholder="Heading">
                    </td>
                </tr>
                <tr>
                    <td><h3>Features Detail</h3></td>
                    <td>
                        <textarea name="feature_detail" cols="30" rows="5" placeholder="Detail"></textarea>
                    </td>
                </tr>
               
                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add Feature" class="btn-secondary">
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>
<?php
    if(isset($_POST['submit']))
    {
        $id= $_GET['id'];
        $feature_heading1=$_POST['feature_heading'];
        $feature_detail = $_POST['feature_detail'];
        $feature_heading=nl2br(str_replace("'","''",$feature_heading1));
        $feature_detail1=nl2br(str_replace("'","''",$feature_detail));
        $sql = "INSERT INTO tbl_product_features SET 
        product_id='$id',
        features_heading = '$feature_heading',
        features = '$feature_detail1'";
        $res = mysqli_query($conn, $sql) or die(mysqli_error());
        if($res==TRUE)
        {
            header("location:".SITEURL.'admin-panel/manage-product.php');
        }
    }
?>

<?php include('partials/footer.php');?>