<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sending Request</title>
</head>
<body>

<?php
echo htmlspecialchars("Hello World");
?>

    <h2>Testing send data</h2>
    
    <!--Data Form -->

    <form action="form.php" method="post">
        <input type="text" name="name">
        <input type="password" name="password">
        <select name="number" id="">
            <option value="">choose number</option>
            <option value="1">one</option>
            <option value="2" selected>two</option>
            <option value="3">three</option>
        </select>
        <input type="submit" value="send">
    </form>

</body>
</html>