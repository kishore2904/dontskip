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
            $tag = $row['tags'];
        }
    }


?>
<div class="main-content">
    <div class="wrapper">
        <h1><?php echo $name?></h1>
        <form action="" method="post">
            <table class="tbl-30">
                <td>
                    <input type="text" name="tag" placeholder="Add tag">
                </td>
                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add Tag" class="btn-secondary">
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
        $tag=$_POST['tag'];
        $sql = "INSERT INTO tbl_product_tag SET 
        product_id='$id',
        tag='$tag'";
        $res = mysqli_query($conn, $sql) or die(mysqli_error());
        if($res==TRUE)
        {
            header("location:".SITEURL.'admin-panel/manage-admin.php');
        }
    }
?>

<?php include('partials/footer.php');?>