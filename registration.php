<?php
    include('config.php');

    if(isset($_POST['submit'])){
        $username = mysqli_real_escape_string($connection, $_POST['USERNAME']);
        $name = mysqli_real_escape_string($connection, $_POST['NAME']);
        $surname = mysqli_real_escape_string($connection, $_POST['SURNAME']);
        $email = mysqli_real_escape_string($connection, $_POST['EMAIL']);
        $password = mysqli_real_escape_string($connection, md5($_POST['PASSWORD']));
        $conf_password = mysqli_real_escape_string($connection, md5($_POST['CONF_PASSWORD']));
        $image = $_FILES['image']['name'];
        $image_size = $_FILES['image']['size'];
        $image_tmp_name = $_FILES['image']['tmp_name'];
        $image_folder = 'uploaded_image/' . $image;

        $select_statement = mysqli_query($connection, "SELECT * FROM `user_form` WHERE EMAIL = '$email' AND PASSWORD = '$password'") or die('query failed.');

        if(mysqli_num_rows($select_statement) > 0){
            $message[] = 'User already exists!';
        }else{
            if($password != $conf_password){
                $message[] = 'Passwords do not match. Please try again!';
            }elseif($image_size > 2000000){
                $message[] = 'Image size is too large.';
            }else{
                $insert_statement = mysqli_query($connection, "INSERT INTO `user_form`(USERNAME, NAME, SURNAME, EMAIL, PASSWORD, CONF_PASSWORD, IMAGE) VALUES('$username', '$name', '$surname', '$email', '$password', '$conf_password', '$image')") or die('query failed!');

                if($insert_statement){
                    move_uploaded_file($image_tmp_name, $image_folder);
                    $message[] = 'User is registered successfully!';
                    header('location:login.php');
                }else{
                    $message[] = 'User could not be registered successfully!...Contact Adminstrator!';
                }
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Page</title>

    <link rel="stylesheet" href="css/style.css"/>
</head>
<body>
    <div class="form-container">

    <form action="" method="post" enctype="multipart/form">
        <h3>Registration Page</h3>

        <?php
            if(isset($message)){
                foreach($message as $message){
                    echo '<div class="message">' . $message . '</div>';
                }
            }
        ?>
        <input type="text"  name="username" placeholder="Username" class="box" required>
        <input type="text" name="name" placeholder="First Name" class="box" required>
        <input type="text" name="surname" placeholder="Last Surname" class="box" required>
        <input type="email" name="email" placeholder="Email" class="box" required>
        <input type="password" name="password" placeholder="Password" class="box" required>
        <input type="password" name="conf_password" placeholder="Confirm Password" class="box" required>
        <input type="file" name="image" class="box" accept="image/jpg, image/jpeg, image/png">
        <input type="submit" name="submit" value="Register" class="register_button">
        <p>already have an account? <a href="login.php">login in here</a></p>
    </form>

    </div>
</body>
</html>