<?php

require_once 'ReceiverInterface.php';

class HttpReceiver implements ReceiverInterface {
    // Returns the IP address of the user
    public function getIpAddress(): string {
        return $_SERVER['REMOTE_ADDR'] ?? 'unknown';
    }

    // Returns the User-Agent of the user
    public function getUserAgent(): string {
        return $_SERVER['HTTP_USER_AGENT'] ?? 'unknown';
    }

    // Returns the URL of the page
    public function getPageUrl(): string {
        return $_SERVER['HTTP_REFERER'] ?? 'unknown';
    }
}