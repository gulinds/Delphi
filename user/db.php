<?php
//open database connection
  $mysqli = new mysqli('localhost','root', '', 'delphi') or die ('Error connecting to mysql: ' . mysqli_error($link));