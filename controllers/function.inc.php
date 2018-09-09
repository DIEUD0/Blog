<?php

function verify_mail($mail)
{
    return !!filter_var($mail, FILTER_VALIDATE_EMAIL);
}

function sanitize_mail($mail)
{
    $mail = filter_var($mail, FILTER_SANITIZE_EMAIL);
    if (filter_var($mail, FILTER_VALIDATE_EMAIL)) {
        return true;
    } else {
        return false;
    }
}
