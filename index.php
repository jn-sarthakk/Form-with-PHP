<?php
$insert = false;
if(isset($_POST['name'])){
    $server = "localhost";
    $username = "root";
    $password = "";

    $con = mysqli_connect($server, $username, $password);

    if(!$con){
        die("Connection failed: " . mysqli_connect_error());
    }
    // echo "Success Connecting to the database";

    // Inserting data to the database using mysql , so first we have to copy query from html file and paste it here, then we have to make varibles which we have to store in the database

    $name = $_POST['name'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $other = $_POST['other'];
    $sql = "INSERT INTO `pu_trip`.`trip` ( `name`, `age`, `gender`, `email`, `phone`, `other`, `dd`) VALUES ('$name', '$age', '$gender', '$email', '$phone', '$other', current_timestamp());";
    // echo$sql;

    if($con ->query($sql)==true){    // '->' this is called object operator
        // echo "Successfully Inserted";
        $insert = true;
    }
    else{
        echo "Error: $sql  <br>  $con->error";
    }

    $con->close();
}
?>
<!-- Connection to the database -->

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Travel Form</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <img class="img" src="https://qph.cf2.quoracdn.net/main-qimg-8ced636c676cba505e69c8ad8bc88b00-pjlq" alt="Poornima University">
    <div class="container">
        <h1>Welcome to Poornima University Travel Form</h1>
        <p>Enter your details and submit this form to confirm your participation in the trip</p>
        
        <?php
        if($insert == true){
        echo "<p class='submitMsg'>Thanks for submitting the form. We are happy to see you joinin for the US trip.</p>";
        }
        ?>
        <form action="index.php" method="post"> <!-- there are two types of methods to take input, 1.Get  2. Post  GET:is used to take input from the urls and its is not secure as passwords can be seen   POST:is used to take input in the form of textbox or something, in this post method input is not taken from the url so it is safer to use-->
            <input type="text" name="name" id="name" placeholder="Enter your Name">
            <input type="number" name="age" id="age" placeholder="Enter your age">
            <input type="text" name="gender" id="gender" placeholder="Enter your Gender">
            <input type="email" name="email" id="email" placeholder="Enter your Email">
            <input type="phone" name="phone" id="phone" placeholder="Enter your Phone Number">
            <textarea name="other" id="other" cols="20" rows="10" placeholder="Enter any other information here"></textarea>

            <button class="btn">Submit</button>

        </form>
    </div>
    <script src="index.js"></script>
    <!-- INSERT INTO `trip` (`sno`, `name`, `age`, `gender`, `email`, `phone`, `other`, `dd`) VALUES ('1', 'Saransh', '23', 'Male', 'saransh@gmail.com', '9383902938', 'This is my first php message/website/database.', current_timestamp());   -->
    <!-- we will cut this above line and paste it into the index.php file. and from this above line we will remove the sno and sno-value because sno is auto_increment, we don't have to give value. it will automatically auto-increment-->
</body>
</html>