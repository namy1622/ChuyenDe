<?php
session_start();
echo isset($_SESSION['pass_word']) ? $_SESSION['pass_word'] : '';
?>