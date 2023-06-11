<?php

declare(strict_types=1);

namespace php8_design_patterns\Structural\Decorator;

class StringEncryptor extends BytesCalculatorDecorator
{
	public function getBytesSize(string $str): int
	{
		$origStr = $str;
  		  
		$ciphering = "AES-128-CTR";		  
		$iv_length = openssl_cipher_iv_length($ciphering);
		$options = 0;
		$encryption_iv = '1234567891011121';
				
		$config = require "config.php";
			  
		$encryption_key = $config["ENCRYPTION_KEY"];
			  
		$encryptedStr = openssl_encrypt($origStr,$ciphering,$encryption_key,$options,$encryption_iv);
			  
		return $this->bytesCalculator->getBytesSize(str:$encryptedStr);
		
	}
}