<?php

$arConfig = require "config.php";

require "dependencies.php";

Flight::db();
Flight::registerController();

require "routes.php";


Flight::start();