<?php

require_once 'services/UserService.php';
require_once 'services/MailService.php';

class ProductService
{
    private UserService $userService;
    private MailService $mailService;

    public function __construct()
    {
        $this->userService = new UserService();
        $this->mailService = new MailService();
    }

    public function sendPromotionMail($productId)
    {
        // using productId to get product info from database
        $productName = "Sample";

        $emails = $this->userService->getAllUsersEmails();

        $subject = "Sản phẩm $productName đang khuyến mãi";
        $body = "Sản phẩm <b>$productName</b> đang khuyến mãi";

        foreach ($emails as $email) {
            try {
                $this->mailService->sendEmail($subject, $body, $email);
            } catch (Exception $e) {
                continue;
            }
        }
    }
}
