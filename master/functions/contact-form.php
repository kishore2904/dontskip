<?php
    include('../config/constants.php');
    $full_name=$_POST['full_name'];
    $email=$_POST['email'];
    $phone=$_POST['phone_number'];
    $text=$_POST['text'];
    if(isset($_POST['submit']))
    {
        $insert = $db->query("INSERT INTO feedback_form SET
        customer_name = '$full_name',
        email_address = '$email',
        phone_number = '$phone',
        feedback = '$text',
        date = NOW()");
        if($insert)
        {
            //echo "data inserted";
            header('location:'.SITEURL.'index.php');
        }
        else
        {
            echo "not inserted";
        }
    }
?>