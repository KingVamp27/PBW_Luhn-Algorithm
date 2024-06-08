<?php
require_once("./database.php");

$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];

    if (empty($name)) {
        $error = "Name is Required.";
    }

    $success = "";
    
    if (empty($error)) {
        $stmt = $conn->prepare("DELETE FROM card_validations WHERE name = :name");
        $stmt->bindParam(':name', $name);
        $stmt->execute();
        $success = "Card deleted successfully!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Card</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="flex justify-center items-center h-screen bg-blue-500">

    <div class="bg-white p-8 rounded-lg shadow-md w-96">
        <h2 class="text-2xl font-bold mb-4">Delete Card</h2>
        <form action="" method="post">
            <div class="mb-4">
                <label for="name" class="block text-gray-700">Card Name</label>
                <input type="text" id="name" name="name" placeholder="Enter Card Name" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
            </div>
            <button type="submit" class="w-full bg-blue-500 text-white rounded-md py-2 px-4 hover:bg-blue-600 focus:outline-none focus:bg-blue-600">Delete Card</button>
            <a href="home.php" class="flex justify-center items-center text-blue-500">Back to home</a>

            <?php
            if (!empty($error)) {
                echo $error . "<br>";
            }
            if (!empty($success)) {
                echo $success ."<br>";
            }
            ?>

        </form>
    </div>
</body>

</html>