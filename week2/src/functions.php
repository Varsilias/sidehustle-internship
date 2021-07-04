<?php

function validateName($name) {
    $data = trim($name);
    $data = stripslashes($data);
    return $data;

}

function validateEmail($email) {
    $data = trim($email);
    $data = stripslashes($data);
    // $data = preg_match()
    return $data;
}

function checkValue($password, $passwordConfirm) {
    $check = $password === $passwordConfirm;
    if(!$check) {
        session_destroy();
        $passwordMismatch = 'The two passwords do not match kindly <a href="./register.php">reload</a> to continue';
        echo $passwordMismatch;
        die();
    }
    return $check;
}

function validatePassword($password, $confirmPassword) {
        $firstPassword = trim($password);
        $secondPassword = trim($confirmPassword);
        $checked = checkValue($firstPassword, $secondPassword);
        if ($checked) {
            return $password;
        }

    }