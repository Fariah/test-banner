<?php

interface RepositoryInterface {
    public function find(string $ip, string $userAgent, string $url): ?array;
    public function save(VisitorData $visitorData): void;
}