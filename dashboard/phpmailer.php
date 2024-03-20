<?php
    if(isset($_POST['submit'])){
        $mailto = "";
        $fullname = $_POST['name'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];

        $header = "From: $fullname";

        $subject = "New Message!";

        $message = "Name: $fullname \n" . "Phone: $phone \n" . "Email: $email \n\n\n";

        $sendMail = mail($mailto, $subject, $message, $header);

        if($sendMail == true){
            echo("<script>alert('Message sent successfully')</script>");
        }else{
            echo("<script>alert('Message not successfully sent')</script>");
        }
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Mailer</title>
</head>
<body>
    <div>
        <form action="" method="post">
            <div>
                <label for="">Fullname:</label>
                <input type="text" name="name">
            </div><br>
            <div>
                <label for="">Phone:</label>
                <input type="tel" name="phone">
            </div><br>
            <div>
                <label for="">Email:</label>
                <input type="email" name="email">
            </div><br>
            <div>
                <button name="submit">Submit</button>
            </div>
        </form>
    </div>
</body>
</html>