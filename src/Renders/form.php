<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Label Generator Form</title>
</head>
<body>
<form action="/form.php" method="post">
    <label for="firstname">First name:</label><br>
    <input type="text" id="firstname" name="firstname"><br>

    <label for="lastname">Last name:</label><br>
    <input type="text" id="lastname" name="lastname">

    <label for="companyname">Company name:</label><br>
    <input type="text" id="companyname" name="companyname">

    <label for="address1">Street Address 1:</label><br>
    <input type="text" id="address1" name="address1">

    <label for="address2">Street Address 2:</label><br>
    <input type="text" id="address2" name="address2">

    <label for="city">City:</label><br>
    <input type="text" id="city" name="city">

    <label for="county">County/State:</label><br>
    <input type="text" id="county" name="county">

    <label for="zipcode">Zip Code:</label><br>
    <input type="text" id="zipcode" name="zipcode">

    <label for="country">Country:</label><br>
    <input type="text" id="country" name="country">

    <label for="phonenumber">Phone Number:</label><br>
    <input type="text" id="phonenumber" name="phonenumber">

    <label for="email">Email:</label><br>
    <input type="text" id="email" name="email">

    <input type="submit" value="Submit">
</form>
</body>
</html>

<?php
if (isset($_POST[ 'submit' ])) {
    print_r($_POST);;
}
?>