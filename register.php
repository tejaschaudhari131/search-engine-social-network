<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $connection->real_escape_string($_POST['username']);
    $email = $connection->real_escape_string($_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";

    if ($connection->query($sql) === TRUE) {
        echo "Registration successful!";
    } else {
        echo "Error: " . $sql . "<br>" . $connection->error;
    }
}
?>

<form method="POST" action="register.php">
    <input type="text" name="username" placeholder="Username" required><br>
    <input type="email" name="email" placeholder="Email" required><br>
    <input type="password" name="password" placeholder="Password" required><br>
    <input type="submit" value="Register">
</form>
