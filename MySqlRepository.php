<?php
require_once 'RepositoryInterface.php';
require_once 'MySqlDatabaseConnect.php';
require_once 'VisitorData.php';

class MySqlRepository implements RepositoryInterface {
    private $db;

    public function __construct() {
        // Establishes database connection
        $this->db = MySqlDatabaseConnect::getInstance()->getConnection();
    }

    // Finds a visitor by IP, User-Agent, and URL
    public function find(string $ip, string $userAgent, string $url): ?array {
        $stmt = $this->db->prepare("SELECT id, views_count FROM visitors WHERE ip_address = ? AND user_agent = ? AND page_url = ?");
        $stmt->execute([$ip, $userAgent, $url]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        return $result !== false ? $result : null;
    }

    // Saves or updates the visitor data
    public function save(VisitorData $visitorData): void {
        if ($visitorData->id) {
            // Updates existing record
            $stmt = $this->db->prepare("UPDATE visitors SET view_date = ?, views_count = ? WHERE id = ?");
            $stmt->execute([
                $visitorData->viewDate,
                $visitorData->viewsCount,
                $visitorData->id
            ]);
        } else {
            // Inserts new record
            $stmt = $this->db->prepare("INSERT INTO visitors (ip_address, user_agent, view_date, page_url, views_count) VALUES (?, ?, ?, ?, ?)");
            $stmt->execute([
                $visitorData->ipAddress,
                $visitorData->userAgent,
                $visitorData->viewDate,
                $visitorData->pageUrl,
                $visitorData->viewsCount
            ]);
        }
    }
}