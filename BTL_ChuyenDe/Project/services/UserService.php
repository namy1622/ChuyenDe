<?php

require_once 'services/DatabaseService.php';

class UserService
{
    private DatabaseService $databaseService;

    public function __construct()
    {
        $this->databaseService = new DatabaseService();
    }

    public function getAllUsersEmails() {
        $emails = [];
        $result = $this->databaseService->executeQuery("SELECT email FROM users");

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $emails[] = $row['email'];
            }
        }

        return $emails;
    }
}