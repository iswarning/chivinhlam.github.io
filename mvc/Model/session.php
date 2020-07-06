<?php

	class Session
	{
		public static function init(){
			if(version_compare(phpversion(), "5.4.0","<")){
				if(session_id()==''){
					session_start();
				}
				else{
					if(session_status() == PHP_SESSION_NONE){
						session_start();
					}
				}
			}
		}

		public static function set($key,$values){
			$_SESSION[$key]=$values;
		}

		public static function get($key){
			if(isset($_SESSION[$key])){
				return $_SESSION[$key];
			}
			else{
				return false;
			}
		}

		public static function checkSession($key,$values){
			self::init();
			if(self::get($key)==$values){
				self::destroy();
			}
			else{
				header("location:login.php");
			}
		}

		public static function destroy(){
			session_destroy();
			header("location:index.php");
		}
	}
?>