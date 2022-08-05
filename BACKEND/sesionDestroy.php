<?php

session_start();

session_destroy();

header("location: ../FRONTEND/index.html");

?>