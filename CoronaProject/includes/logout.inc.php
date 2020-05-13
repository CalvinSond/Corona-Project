<?php
session_start();
session_unset();
session_destroy();
header("Location: ../webpaginas/index.php");