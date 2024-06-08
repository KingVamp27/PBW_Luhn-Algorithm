<?php
if (isset($_POST['add'])) {
    header("Location: addCard.php");
    exit();
}
if (isset($_POST['validate'])) {
    header("Location: validateCard.php");
    exit();
}
if (isset($_POST['update'])) {
    header("Location: updateCard.php");
    exit();
}
if (isset($_POST['delete'])) {
    header("Location: deleteCard.php");
    exit();
}
if (isset($_POST['logout'])) {
    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="flex justify-center items-center h-screen bg-blue-500">
    <div class="bg-white p-8 rounded-lg shadow-md w-96">
        <h2 class="text-2xl font-bold mb-4">Home</h2>
        <form method="post">
            <button class="w-full bg-blue-500 text-white rounded-md py-2 px-4 hover:bg-blue-600 focus:outline-none focus:bg-blue-600" name="add">Add Card Number</button>
            <br><br>
            <button class="w-full bg-blue-500 text-white rounded-md py-2 px-4 hover:bg-blue-600 focus:outline-none focus:bg-blue-600" name="validate">Validate Card</button>
            <br><br>
            <button class="w-full bg-blue-500 text-white rounded-md py-2 px-4 hover:bg-blue-600 focus:outline-none focus:bg-blue-600" name="update">Update Card Number</button>
            <br><br>
            <button class="w-full bg-blue-500 text-white rounded-md py-2 px-4 hover:bg-blue-600 focus:outline-none focus:bg-blue-600" name="delete">Delete Card</button>
            <br><br>
            <button class="w-full bg-blue-500 text-white rounded-md py-2 px-4 hover:bg-blue-600 focus:outline-none focus:bg-blue-600" name="logout">Logout</button>
        </form>

    </div>
</body>

</html>