<?php

interface ReceiverInterface {
    public function getIpAddress(): string;
    public function getUserAgent(): string;
    public function getPageUrl(): string;
}