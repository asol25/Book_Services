<?php


namespace app\src\controllers;


use app\core\Controller;
use app\src\services\payment\Create_payment_url;
use Symfony\Component\Mime\Header\Headers;

class PaymentController extends Controller
{
    public function PaymentPageController()
    {
        $searchString = "&vnp_ResponseCode=00";
        $string = $_SERVER['QUERY_STRING'];
        $isChecked = strpos($string, $searchString);

        if ($isChecked) {
            # code...
            $returnCallback = "/ShoppingCart?state=true";
            header('Location: ' . $returnCallback);
        }
    }

    public function PaymentController()
    {
        print_r($_POST);
        try {
            $paymentService = new Create_payment_url(
                $_POST['amount'],
                null,
                $_POST['language'],
                $_POST['informationOrder'],
                "topup",
                $_POST['order_id'],
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
            );
            $paymentService->requestPayment();
        } catch (\Exception $exception) {
            echo  "<pre>";
            print_r($exception);
            echo  "</pre>";
        }
    }

    public function GetCheckOutPageController()
    {
        # code...
        $views = "CheckOutPage";
        $this->render($views, null);
    }
}
