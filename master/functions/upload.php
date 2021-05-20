<?php
// Include the database configuration file
include ('../config/constants.php');
$statusMsg = '';
$name = $_POST['title'];
$description = $_POST['description'];
$features = $_POST['features'];
$price = $_POST['price'];
$categories = $_POST['category'];
$origin = $_POST['origin'];
if(isset($_POST['featured']))
    {
        $featured = $_POST['featured'];
    }
else
    {
        $featured = "No"; //SEtting the Default Value
    }

if(isset($_POST['active']))
    {
        $active = $_POST['active'];
    }
else
    {
        $active = "No"; //Setting Default Value
    }
if(isset($_POST["submit"]))
{
    #$_POST['message']=nl2br($_POST['message']);
    $_description=nl2br(str_replace("'","''",$description));
    // Insert image file name into database
    $insert = $db->query("INSERT into tbl_product (product_name,description,price,featured,active,uploaded_on,category_id,features,origin) VALUES ('$name','$_description','$price','$featured','$active',NOW(),'$categories','$features','$origin')");
    if($insert)
    {
        header('location:'.SITEURL.'admin-panel/add-tags.php');
        $statusMsg = "The file ".$fileName. " has been uploaded successfully.";
        
    }
    else
    {
        $statusMsg = "File upload failed, please try again.";
    } 
}
else
{

}

// Display status message
echo $statusMsg;
?>