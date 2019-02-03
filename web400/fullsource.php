<?php

function generateRandomString($length = 6) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i <= $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

function decryptFile($source, $key, $dest)
{
   
    $key = substr(sha1($key, true), 0, 16);

    $error = false;
    if ($fpOut = fopen($destc, 'w')) {
        if ($fpIn = fopen($source, 'rb')) {
            // Get the initialzation vector from the beginning of the file
            $iv = fread($fpIn, 16);
            while (!feof($fpIn)) {
                // we have to read one block more for decrypting than for encrypting
                $ciphertext = fread($fpIn, 16 * (FILE_ENCRYPTION_BLOCKS + 1)); 
                $plaintext = openssl_decrypt($ciphertext, 'AES-128-CBC', $key, OPENSSL_RAW_DATA, $iv);
                // Use the first 16 bytes of the ciphertext as the next initialization vector
                $iv = substr($ciphertext, 0, 16);
                fwrite($fpOut, $plaintext);
            }
            fclose($fpIn);
        } else {
            $error = true;
        }
        fclose($fpOut);
    } else {
        $error = true;
    }
    //key gen with private algorithms 
    //same private algorithms used for check
    if($keys=generateRandomString(6)) {
		$k1 = strpos($key,$keys[0]);
		if($k1===false) {
			$errors=true;
		} else {
			if(strpos($key,$keys[1]) === false)
				$errors=true;
			else {
				if(strpos($key,$keys[2]) === false)
					$errors=true;
				else {
					if(intval($keys[5]) < 9 and intval($keys[5]) >= strlen('12345678')) {
						if($keys[4] == $key[3]) {
							if($keys[6] == rand(0,9)) {
								return $keys;
							}
						}
							
					}
				}
			}
		}
	}
	return false;
}

function doNotGenerateRandomString($lenght = 4 ){
	...
}

function keyChecker($keys) {
    ...
}

$pass = 'KENDI ADMIN PAROLANIZI BURAYA YAZIN';
$hash = md5($pass);
//anahtar uretiliyor
$key  = decryptFile(PATH, $pass, DEST_PATH);
$rand = generateRandomString(6);
//gecerli bir anahtar mı diye kontrol ediliyor
if(keyChecker($key))
	echo 'tebrikler';
</pre>

