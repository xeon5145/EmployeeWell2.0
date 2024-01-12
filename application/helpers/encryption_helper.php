<?php
defined('BASEPATH') or exit('No direct script access allowed');

function encryptData($data)
{
    if (isset($data)) {

        if (CRYPT_SHA256 == 1) {
            return crypt($data, '$5$randomstringdata$');
        } else {
            return "SHA-256 not supported";
        }
    }
}
