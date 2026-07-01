<?php
function isAdmin()
{
    if (isset($_SESSION["user"]) && $_SESSION["user"]["admin"] > 0) {
        return true;
    }
    return false;
}