<?php
    session_start();
    include('config.php');
    extract($_POST);
    // Check if the email is valid.
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        exit('Email is not valid!');
    }

    // Check if the username is valid.
    if (preg_match('/^[a-zA-Z0-9]+$/', $name) == 0) {
        exit('Username is not valid!');
    }

    // Check if the password is strong enough.
    if (strlen($password) < 8 || !preg_match('/[A-Za-z]/', $password) || !preg_match('/\d/', $password)) {
        exit('Password must be at least 8 characters long and contain at least one letter and one number!');
    }

    // Check if the email, username, or phone number is already registered.
    $result = mysqli_query($con, "SELECT * FROM tbl_registration WHERE email='$email' OR name='$name' OR phone='$phone'");
    if (mysqli_num_rows($result) > 0) {
        exit('Email, username, or phone number already registered!');
    }

    // Insert the new registration and login data.
    mysqli_query($con, "INSERT INTO tbl_registration VALUES (NULL,'$name','$email','$phone','$age','$gender')");
    $password = md5($password);
    $id = mysqli_insert_id($con);
    mysqli_query($con, "INSERT INTO tbl_login VALUES (NULL,'$id','$email','$password','2')");

    // Set the user session and redirect to the index page.
    $_SESSION['user'] = $id;
    echo '<script>alert("Registered Successfully."); window.location = "index.php";</script>';
?>




