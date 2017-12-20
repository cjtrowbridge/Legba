<?php

class LegbaCryptography{
  
  public function encrypt($stringData, $algorithm = 'blowfish', $encryptionKey = null){
    //Encrypts a string with the specified algorithm using an optional encryption key, or else it uses the default encryption key stored in the environment file.
    if($encryptionKey == null){
      $encryptionKey = $this->environment['encryptionKey'];
    }
    $algorithm = strtolower($algorithm);
    switch($algorithm){
      case 'blowfish':
        $iv_size = mcrypt_get_iv_size(MCRYPT_BLOWFISH, MCRYPT_MODE_ECB);
        $iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);
        $encryptedString = base64_encode(mcrypt_encrypt(MCRYPT_BLOWFISH, $encryptionKey, $this->utf8($stringData), MCRYPT_MODE_ECB, $iv));
        return $encryptedString;
      default:
        die('Invalid Encrypt Algorithm: "'.$algorithm.'"');
    }
  }

  public function decrypt($encryptedString, $algorithm = 'blowfish', $encryptionKey = null){
    //Decrypts a string with the specified algorithm using an optional encryption key, or else it uses the default encryption key stored in the environment file.
    if($encryptionKey == null){
      $encryptionKey = $this->environment['encryptionKey'];
    }
    $algorithm = strtolower($algorithm);
    switch($algorithm){
      case 'blowfish':
        $iv_size = mcrypt_get_iv_size(MCRYPT_BLOWFISH, MCRYPT_MODE_ECB);
        $iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);
        $decryptedString = mcrypt_decrypt(MCRYPT_BLOWFISH, $encryptionKey, base64_decode($encryptedString), MCRYPT_MODE_ECB, $iv);
        //Make sure it's UTF8 now
        $decryptedString = $this->utf8($decryptedString);
        return $decryptedString;
      default:
        die('Invalid Decrypt Algorithm: "'.$algorithm.'"');
    }
  }
  
  public function utf8($Input){
    //Automatically converts a string from whatever it is encoded in, to utf8
    //Copied from: https://stackoverflow.com/questions/7979567/php-convert-any-string-to-utf-8-without-knowing-the-original-character-set-or
    return iconv(mb_detect_encoding($Input, mb_detect_order(), true), "UTF-8", $Input);
  }

}
