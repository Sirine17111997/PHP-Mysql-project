<?php
 class Session{
 	static public function set($type,$msg){
 		setcookie($type,$msg,time() + 5, "/");
 	}
 }