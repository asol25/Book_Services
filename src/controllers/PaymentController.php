<?php


namespace app\src\controllers;


use app\core\Controller;
use app\src\services\payment\Create_payment_url;

class PaymentController extends Controller
{
    public function PaymentPageController()
    {
        $page = "payment";
        $params = null;
        $this->render($page, $params);
    }

    public function PaymentController()
    {
        try {
            $paymentService = new Create_payment_url(100.00,
                null,
                "vn",
                "Noi dung thanh toan",
            "topup",
                20220905160836,
null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,);
            $paymentService->requestPayment();
        }
        catch (\Exception $exception) {
            echo  "<pre>";
            print_r($exception);
            echo  "</pre>";
        }
    }
}