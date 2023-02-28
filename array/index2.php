<?php
session_start();
if (isset($_SESSION['numbers'])) {
    $numbers = $_SESSION['numbers'];
} else {
    $numbers = [1, 2, 3];
}

if (isset($_POST['number'])) {
    $new_number = $_POST['number'];

    if (is_numeric($new_number)) {
        array_push($numbers, $new_number);
        $_SESSION['numbers'] = $numbers;
    } else{
        echo "Please enter a valid number.";
    }
}

if (isset($_POST['reset'])) {
    $numbers = [1, 2, 3];

    $_SESSION['numbers'] = $numbers;
}

?>

<form method="post">
    <label for="number">Enter a number:</label>
    <input type="text" name="number" id="number">
    <button type="submit">Add to array</button>
    <button type="submit" name="reset">Reset array</button>
</form>

<p>Current array: <?php echo implode(", ", $numbers); ?></p>