<?php
@mysql_connect("localhost","admin_football","football!@#$%") or die(mysql_error());
@mysql_select_db("admin_football") or die(mysql_error());
@mysql_query("SET NAMES utf8");
?>