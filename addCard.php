<?php
require_once("./database.php");

$error = "";
function isValid($number)
{
    $num = array_map('intval', str_split($number));
    $lastDigit = array_pop($num);
    $num = array_reverse($num);
    $num = array_map(function ($digit, $idx) {
        return ($idx % 2 === 0) ? ($digit * 2 > 9 ? $digit * 2 - 9 : $digit * 2) : $digit;
    }, $num, array_keys($num));
    $luhnCheck = array_sum($num) * 9 % 10;
    return $luhnCheck === $lastDigit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $number = $_POST["card_number"];

    $success = "";
    $error = "";

    if (empty($name)) {
        $error = "Name is required.";
    }

    if (empty($number)) {
        $error = "Card Number is required.";
    }

    if (isValid($number)) {
        $success = "The card number is valid.";
    } else {
        $error = "The card number is not valid.";
    }

    if (empty($error)) {
        $stmt = $conn->prepare("INSERT INTO card_validations (name ,card_number) VALUES (?, ?)");
        $stmt->execute([$name, $number]);
        $success = "Card added successfully!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Card</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="flex justify-center items-center h-screen bg-blue-500">

    <div class="bg-white p-8 rounded-lg shadow-md w-96">
        <h2 class="text-2xl font-bold mb-4">Add Card</h2>
        <form action="" method="post">
            <div class="mb-4">
                <label for="username" class="block text-gray-700">Name</label>
                <input type="text" id="name" name="name" placeholder="Enter Card Owner Name" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
            </div>
            <div class="mb-4">
                <label for="card_number" class="block text-gray-700">Card Number</label>
                <input type="text" id="card_number" name="card_number" placeholder="Enter Card Number" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
            </div>
            <button type="submit" class="w-full bg-blue-500 text-white rounded-md py-2 px-4 hover:bg-blue-600 focus:outline-none focus:bg-blue-600">Add Card</button>
            <a href="home.php" class="flex justify-center items-center text-blue-500">Back to home</a>

            <?php
            if (!empty($error)) {
                echo $error . "<br>";
            }
            if (!empty($success)) {
                echo $success . "<br>";
            }
            ?>

        </form>
    </div>
</body>

</html>