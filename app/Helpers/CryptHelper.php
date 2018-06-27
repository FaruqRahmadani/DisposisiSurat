<?php
namespace App\Helpers;

Use Crypt;
use Illuminate\Contracts\Encryption\DecryptException;

class CryptHelper
{
  public static function Encrypt($Id){
    return Crypt::encryptString($Id);
  }

  public static function Decrypt($Id){
    try {
      return Crypt::decryptString($Id);
    } catch (DecryptException $e) {
      return abort('404');
    }
  }
}
