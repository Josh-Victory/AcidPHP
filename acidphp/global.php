<?php

session_start();

define('_INC', 'includes');
define('CLSPATH', 'classes');
define('DS', DIRECTORY_SEPARATOR);

include(_INC . DS . CLSPATH . DS . 'class.configuration.php');
include(_INC . DS . CLSPATH . DS . 'class.database.php');
include(_INC . DS . CLSPATH . DS . 'class.users.php');
include(_INC . DS . CLSPATH . DS . 'class.core.php');

Core::initialize();

?>