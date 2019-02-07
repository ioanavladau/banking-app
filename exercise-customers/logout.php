<?php 
  session_start(); // MUST MUST MUST!!!! when I click back, check if I am still logged in
  session_destroy();
  header('Location: login.php');