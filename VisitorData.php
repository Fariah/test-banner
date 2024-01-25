<?php

class VisitorData {
    public $id;
    public $ipAddress;
    public $userAgent;
    public $viewDate;
    public $pageUrl;
    public $viewsCount;

    // Method for setting visitor data
    public function setData($id, $ipAddress, $userAgent, $viewDate, $pageUrl, $viewsCount): void {
        $this->id = $id;
        $this->ipAddress = $ipAddress;
        $this->userAgent = $userAgent;
        $this->viewDate = $viewDate;
        $this->pageUrl = $pageUrl;
        $this->viewsCount = $viewsCount;
    }
}