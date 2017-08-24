<?php

require "index.php";
session_unset();
header("refresh:1; url=index.php");
?>
