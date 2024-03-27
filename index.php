<?php
$insert = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $server = "localhost";
    $username = "root";
    $password = "";

    $con = mysqli_connect($server, $username, $password);

    if (!$con) {
        die("connection fail due to " . mysqli_connect_error());
    }

    $name = isset($_POST['name']) ? $_POST['name'] : '';
    $age = isset($_POST['age']) ? $_POST['age'] : '';
    $gender = isset($_POST['gender']) ? $_POST['gender'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $phoneno = isset($_POST['phoneno']) ? $_POST['phoneno'] : '';
    $other = isset($_POST['other']) ? $_POST['other'] : '';

    $sql = "INSERT INTO `trip`.`mutrip` ( `name`, `age`, `gender`, `email`, `phoneno`, `other`, `date`) VALUES ( '$name', '$age', '$gender', '$email', '$phoneno', '$other', current_timestamp());";

    if ($con->query($sql) == true) {
        $insert = true;
    } else {
        echo "ERROR: $sql <br> $con->error";
    }

    $con->close();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to form</title>
    <link rel="stylesheet" href="style.css"> 
</head>
<body>
    <img class="bgimg" src="bg2.jpg" alt="img">
    <div class="container">
        <h1>WELCOME to marwadi university trip</h1>
        <p>enter your details and submit this form to confirm your participation</p>
        
        <form action="index.php" method="post">
            <input type="text" name="name" id="name" placeholder="enter your name">
            <input type="text" name="age" id="age"placeholder="enter your age">
            <input type="text" name="gender" id="gender" placeholder="enter your gender">
            <input type="email" name="email" id="email" placeholder="enter your email">
            <input type="phone" name="phone" id="phoneno" placeholder="enter your phone-no">
            
            <textarea  name="other" id="other" cols="30" rows="10" placeholder="enter any other information here"></textarea>
            <button class="btn">submit</button>

            
        </form>
         <?php
        if($insert == true){
        echo " <p style='color: green; font-size: 18px;font-weight: bold;'> Thanks for submitting your form. We are happy to see you joining us for the US trip </p>";
        }
    ?>
    </div>

    <script src="index.js"></script>
</body>

    </html>