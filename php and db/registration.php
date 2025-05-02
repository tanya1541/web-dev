
<form method="POST">
    Name: <input type="text" name="name" required><br><br>
    Email: <input type="email" name="email" required><br><br>
    <input type="submit" value="Register">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];

    if (!empty($name) && filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Registration successful!<br>";
        echo "Name: $name<br>Email: $email";
    } else {
        echo "Invalid input!";
    }
}
?>
