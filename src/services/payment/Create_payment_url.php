<?php


namespace app\src\services\payment;


class Create_payment_url extends PaymentService implements IPaymentService
{
    /**
     * @var string to request system of the VnPay.
     */
    private string $URL;


    public function __construct(int $vnp_Amount,
                                ?string $vnp_BankCode,
                                string $vnp_Locale,
                                string $vnp_OrderInfo,
                                ?string $vnp_OrderType,
                                string $vnp_TxnRef)
    {
        parent::__construct($vnp_Amount, $vnp_BankCode, $vnp_Locale, $vnp_OrderInfo, $vnp_OrderType, $vnp_TxnRef);
    }


    private function concatString() : string
    {
        $input = array(
            "vnp_Version" => $this->getVnpVersion(),
            "vnp_TmnCode" => $this->getVnpTmnCode(),
            "vnp_Amount" => $this->getVnpAmount(),
            "vnp_Command" => $this->getVnpCommand(),
            "vnp_CreateDate" => $this->getVnpCreateDate(),
            "vnp_CurrCode" => $this->getVnpCurrCode(),
            "vnp_IpAddr" => $this->getVnpIpAddr(),
            "vnp_Locale" => $this->getVnpLocale(),
            "vnp_OrderInfo" => $this->getVnpOrderInfo(),
            "vnp_OrderType" => $this->getVnpOrderType(),
            "vnp_ReturnUrl" => $this->getVnpReturnUrl(),
            "vnp_TxnRef" => $this->getVnpTxnRef()
        );

        ksort($input);
        $query = "";
        $i = 0;
        $hashData = "";
        foreach ($input as $key => $value) {
            if ($i == 1) {
                $hashData .= '&' . urlencode($key) . "=" . urlencode($value);
            } else {
                $hashData .= urlencode($key) . "=" . urlencode($value);
                $i = 1;
            }
            $query .= urlencode($key) . "=" . urlencode($value) . '&';
        }
        $configURL = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
        return $this->URL =  $configURL . "?" . $query;
    }

    public function requestPayment()
    {
        // TODO: Implement requestPayment() method.
        var_dump($this->concatString());
    }

}