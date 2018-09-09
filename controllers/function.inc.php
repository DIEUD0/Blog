<?php

function verify_mail($mail)
{
    return !!filter_var($mail, FILTER_VALIDATE_EMAIL);
}

function sanitize_mail($field)
{
    $field = filter_var($field, FILTER_SANITIZE_EMAIL);
    if (filter_var($field, FILTER_VALIDATE_EMAIL)) {
        return true;
    } else {
        return false;
    }
}
