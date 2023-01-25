<?php

use csrf\csrfCheck;
use Route\Route;
require "./core/bootstrap.php";
session_start();
// direct Page



Route::uri($_SERVER['REQUEST_URI'])->direct($_SERVER["REQUEST_METHOD"]);
// trim($_SERVER["REQUEST_URI"],"/")

