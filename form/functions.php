<?php


function clearString($data)
{
    $data = trim($data);
    $data = stripslashes(($data));
    return htmlspecialchars($data);
}

function check_login($con)
{
    if(isset($_SESSION['user_id']))
    {
        $id = $_SESSION['user_id'];
        $query = "SELECT * FROM users WHERE user_id = '$id' LIMIT 1";

        $result = mysqli_query($con, $query);
        if ($result && mysqli_num_rows($result) > 0)
        {
            $user_data = mysqli_fetch_assoc($result);
            return $user_data;
        }
    }
    // redirect to login
    header("Location: form/login2.php");
    die;
}
function random_num($length)
{
    $text = "";
    if ($length < 5) {
        $length = 5;
    }
    $len = rand(4, $length);

    for ($i = 0; $i < $len; $i++)
    {
        $text .= rand(0,9);
    }
    return $text;
}

function strongPassword($pass){
    $ucl = preg_match('/[A-Z]/', $pass); // Uppercase Letter
    $lcl = preg_match('/[a-z]/', $pass); // Lowercase Letter
    $dig = preg_match('/\d/', $pass); // Numeral
    $nos = preg_match('/\W/', $pass); // Non-alpha/num characters (allows underscore)

    if ($ucl && $lcl && $dig && !$nos) {
        return true;
    } else {
        return false;
    }
}