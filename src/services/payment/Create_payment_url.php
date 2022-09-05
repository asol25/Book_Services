<?php


namespace app\src\services\payment;

error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);
date_default_timezone_set('Asia/Ho_Chi_Minh');
class Create_payment_url extends PaymentService implements IPaymentService
{
    /**
     * @var string to request system of the VnPay.
     */
    private string $URL;

    /**
     * Create_payment_url constructor.
     * @param int $vnp_Amount                       Payment amount.
     * @param string|null $vnp_BankCode             Payment Bank Code.
     * @param string $vnp_Locale                    Display interface language. Currently support Vietnamese (vn), English (en).
     * @param string $vnp_OrderInfo                 Information describing payment content (Vietnamese, unsigned).
     * @param string|null $vnp_OrderType            Commodity code. Each commodity will belong to a group of lists specified by VNPAY.
     * @param string $vnp_TxnRef                    Reference code of the transaction at the merchant's system. This code is only used to distinguish.
     */
    public function __construct(int $vnp_Amount,
                                ?string $vnp_BankCode,
                                string $vnp_Locale,
                                string $vnp_OrderInfo,
                                ?string $vnp_OrderType,
                                string $vnp_TxnRef)
    {
        parent::__construct($vnp_Amount, $vnp_BankCode, $vnp_Locale, $vnp_OrderInfo, $vnp_OrderType, $vnp_TxnRef);
    }

    /**
     * Contact parameters to the URL.
     * @return string the URL to request system of the VnPay.
     */
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
            "vnp_ExpireDate" => $this->getVnpExpire(),
            "vnp_TxnRef" => $this->getVnpTxnRef(),
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
        $this->URL =  $configURL . "?" . $query;

        $vnpSecureHash =  hash_hmac("sha512", $hashData, $this->getVnpSecureHash());
        $this->URL .= 'vnp_SecureHash=' . $vnpSecureHash;

        return $this->URL;
    }

    public function requestPayment()
    {
        // TODO: Implement requestPayment() method.
        header('Location: ' . $this->concatString());
    }

}