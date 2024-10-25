<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $login = '';
    $password = '';

    $file = file('credits.txt', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

    foreach ($file as $line){

        list($key, $value) = explode('=', $line, 2);

        if($key === 'login'){
         $login = $value;
        } elseif ($key === 'password'){
            $password = $value;
        }
    }

    $name = $_POST['name'];       
    $user_password = $_POST['password']; 

    if($name === $login && $user_password === $password){
        header("Location: second_page.html");
        exit();
    } else {
        echo "wrong password or login";
    }
}
?>