<?php

namespace App\Traits;

use Illuminate\Encryption\Encrypter;

trait CryptoHelperTrait
{
    /**
     * Generate a random hex value
     *
     * @param integer $rand_bytes_num
     *
     * @return integer
     */
    public function generateRandomHex($rand_bytes_num)
    {
        $rand_bytes = random_bytes($rand_bytes_num);
        return bin2hex($rand_bytes);
    }

    /**
     * Generate an Application key and write it to the env
     *
     * @return string
     */
    public function generateKey($cipher = null)
    {
        if(!$cipher) {
            $cipher = config('app.cipher');
        }

        return 'base64:'.base64_encode(
            Encrypter::generateKey($cipher)
        );
    }
}
