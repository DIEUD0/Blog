<?php

$TITLEND = 'Blog de l\'écrivain et acteur Jean Forteroche';
$SHOWADMIN = true;
$POSTSPERPAGE = 3;

function verify_mail($email) {
    return !!filter_var($email, FILTER_VALIDATE_EMAIL);
}