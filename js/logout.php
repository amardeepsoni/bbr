<?php
session_start();

if(isset(isset($_POST["logout"])) {
	session_destroy();
}