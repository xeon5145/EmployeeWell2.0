<script>
    // const crypto = require('crypto');
    // const algorithm = 'aes-256-ctr';
    // global.constants = require('../../../constant');
    // const ENCRYPTION_KEY = Buffer.from(global.constants.ENCRYPTION_KEY, 'base64'); // or generate sample key Buffer.from('FoCKvdLslUuB4y3EZlKate7XGottHski1LmyqJHvUhs=', 'base64');
    // const IV_LENGTH = 16;
    // exports.encrypt_and_decrypt_0bject = {
    //     encryptionFunction: (text) => {
    //         let iv = crypto.randomBytes(IV_LENGTH);
    //         let cipher = crypto.createCipheriv(algorithm, Buffer.from(ENCRYPTION_KEY, 'hex'), iv);
    //         let encrypted = cipher.update(text);
    //         encrypted = Buffer.concat([encrypted, cipher.final()]);
    //         return iv.toString('hex') + ':' + encrypted.toString('hex');
    //     },
    //     decryptionFunction: (text) => {
    //         let textParts = text.split(':');
    //         let iv = Buffer.from(textParts.shift(), 'hex');
    //         let encryptedText = Buffer.from(textParts.join(':'), 'hex');
    //         let decipher = crypto.createDecipheriv(algorithm, Buffer.from(ENCRYPTION_KEY, 'hex'), iv);
    //         let decrypted = decipher.update(encryptedText);
    //         decrypted = Buffer.concat([decrypted, decipher.final()]);
    //         return decrypted.toString();
    //     }
    // }

    // encryptedData = 87768e7bcc5d3b02e79f4217dfc848ae:b667151071a932c6fc12:09
    // Name = john cool
    // Key = FoCKvdLslUuB4y3EZlKate7XGottHski1LmyqJHvRTS=
</script>

<?php
defined('BASEPATH') or exit('No direct script access allowed');

class TestController extends CI_Controller
{
    private $cipher,$key,$text;
    
    public function index()
    {
        // Generate a new IV for each encryption operation
        $text = "john cool";
        $iv = openssl_random_pseudo_bytes(16);
        $this->cipher = "aes-256-ctr";
        $this->key = "FoCKvdLslUuB4y3EZlKate7XGottHski1LmyqJHvRTS=";

        $encryptedResult = $this->encrypt($text, $iv);
        $decryptedResult = $this->decrypt($encryptedResult, $iv);

        $data['plaintext'] = $text;
        $data['initialisationvector'] = bin2hex($iv);
        $data['encryptedtext'] = $encryptedResult;
        $data['decryptedtext'] = $decryptedResult;

        $this->load->view('test', $data);
    }

    private function encrypt($text, $iv)
    {
        $encrypted = openssl_encrypt($text, $this->cipher, $this->key, OPENSSL_RAW_DATA, $iv);
        return bin2hex($iv) . ':' . bin2hex($encrypted);
    }

    private function decrypt($text, $iv)
    {
        $parts = explode(':', $text);
    
        // Check if both IV and encrypted data are present
        if (count($parts) === 2) {
            $iv = hex2bin($parts[0]);
            $text = hex2bin($parts[1]);
            $decrypted = openssl_decrypt($text, $this->cipher, $this->key, OPENSSL_RAW_DATA, $iv);
            return $decrypted;
    }
}
}


?>