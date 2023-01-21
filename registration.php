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
        <input type="text"  name="username" placeholder="Username" class="box" required>
        <input type="text" name="name" placeholder="First Name" class="box" required>
        <input type="text" name="surname" placeholder="Last Surname" class="box" required>
        <input type="text" name="email" placeholder="Email" class="box" required>
        <input type="password" name="password" placeholder="Password" class="box" required>
        <input type="password" name="conf_password" placeholder="Confirm Password" class="box" required>
        <input type="file" class="box" accept="image/jpg, image/jpeg, image/png">
        <input type="submit" value="Register" class="register_button">
        <p>already have an account? <a href="login.php">login in here</a></p>
    </form>

    </div>
</body>
</html>