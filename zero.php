<?php 
  echo 'zero';
  // if it does not have HTML, do NOT close php
  // all paths will refer to 'zero'
  include __DIR__ . '/folderOne/one.php';
  echo __LINE__;
  //  __LINE__ - spot where the mistake is
  // require/include INCLUDE __DIR__ !!!!

  // GET if we want to block customers