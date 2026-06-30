<?php
function isAdmin()
{
    if (isset($_SESSION["client"]) && $_SESSION["client"]["admin"] > 0) {
        return true;
    }
    return false;
}