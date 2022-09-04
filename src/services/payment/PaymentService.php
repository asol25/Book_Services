<?php


namespace app\src\services\payment;

class PaymentService
{
    /**
     * @var Create_payment_url of the Payment Services.
     */
    public Create_payment_url $CreatePaymentUrl;

    /**
     * @var Return_payment_url of the Payment Service.
     */
    public Return_payment_url $ReturnPaymentUrl;

    /**
     * @var string The version of the api that the merchant connects to. Current versions are : 2.0.1 and 2.1.0.
     */
    protected string $vnp_Version;

    /**
     * @var string The API code used, the code for the payment transaction is: pay.
     */
    protected string $vnp_Command;

    /**
     * @var string Merchant's website code on VNPAY's system.
     */
    protected string $vnp_TmnCode;

    /**
     * @var int Payment amount. Amount does not carry decimal separators, thousandths, currency characters.
     * To send a payment amount of 10,000 VND (ten thousand VND), merchant needs to multiply by 100 times (decimal),
     * then send to VNPAY: 1000000
     */
    protected int $vnp_Amount;

    /**
     * @var string|null Payment Bank Code.
     */
    protected ?string $vnp_BankCode;

    /**
     * @var string Is the transaction time in the format yyyyMMddHHmmss(Time zone GMT+7)Example: 20170829103111.
     */
    protected string $vnp_CreateDate;

    /**
     * @var string Currency used for payment. Currently only support VND.
     */
    protected string $vnp_CurrCode;

    /**
     * @var string The IP address of the client making the transaction.
     */
    protected string $vnp_IpAddr;

    /**
     * @var string Display interface language. Currently support Vietnamese (vn), English (en).
     */
    protected string $vnp_Locale;

    /**
     * @var string Information describing payment content (Vietnamese, unsigned).
     */
    protected string $vnp_OrderInfo;

    /**
     * @var string|null Commodity code. Each commodity will belong to a group of lists specified by VNPAY.
     */
    protected ?string $vnp_OrderType;

    /**
     * @var string The URL notifies the transaction results when the Customer finishes the payment.
     */
    protected string $vnp_ReturnUrl;

    /**
     * @var string Reference code of the transaction at the merchant's system. This code is only used to distinguish orders sent to VNPAY.
     * No duplicates within the day.
     */
    protected string $vnp_TxnRef;

    /**
     * @var string Checksum code to ensure the transaction's data is not changed during the transition from merchant to VNPAY.
     * The generation of this code depends on the merchant's configuration and the api version used.
     * Current version supports SHA256, HMACSHA512.
     */
    protected string $vnp_SecureHash;

    /**
     * PaymentService constructor have seven parameter.
     * @param int $vnp_Amount                       Payment amount
     * @param string|null $vnp_BankCode             Payment Bank Code.
     * @param string $vnp_Locale                    Display interface language. Currently support Vietnamese (vn), English (en).
     * @param string $vnp_OrderInfo                 Information describing payment content (Vietnamese, unsigned).
     * @param string|null $vnp_OrderType            Commodity code. Each commodity will belong to a group of lists specified by VNPAY.
     * @param string $vnp_TxnRef                    Reference code of the transaction at the merchant's system. This code is only used to distinguish.
     * @param string $vnp_SecureHash                Checksum code to ensure the transaction's data is not changed during the transition from merchant to VNPAY.
     */
    public function __construct(int $vnp_Amount,
                                ?string $vnp_BankCode,
                                string $vnp_Locale,
                                string $vnp_OrderInfo,
                                ?string $vnp_OrderType,
                                string $vnp_TxnRef,
                                string $vnp_SecureHash)
    {
        $this->CreatePaymentUrl = new Create_payment_url();
        $this->ReturnPaymentUrl = new Return_payment_url();

        $this->vnp_Version = "2.1.0";
        $this->vnp_TmnCode = "ZI3R0K6W";
        $this->vnp_Command = "pay";

        $this->setVnpAmount($vnp_Amount);
        $this->setVnpCreateDate();
        $this->setVnpCurrCode();
        $this->setVnpIpAddr();
        $this->setVnpReturnUrl();

        $this->vnp_BankCode = $vnp_BankCode;
        $this->vnp_Locale = $vnp_Locale || "vn";
        $this->vnp_OrderInfo = $vnp_OrderInfo;
        $this->vnp_OrderType = $vnp_OrderType;
        $this->vnp_TxnRef = $vnp_TxnRef;
        $this->vnp_SecureHash = $vnp_SecureHash;
    }

    /**
     * Setter for vnp_ReturnUrl.
     */
    public function setVnpReturnUrl(): void
    {
        $url = "http://localhost:8000/payment/callback";
        $this->vnp_ReturnUrl = $url;
    }

    /**
     * Setter for vnp_IpAddr.
     */
    public function setVnpIpAddr(): void
    {
        $ipAddress =  $_SERVER['REMOTE_ADDR'];
        $this->vnp_IpAddr = $ipAddress;
    }

    /**
     * Setter for vnp_CurrCode.
     */
    public function setVnpCurrCode(): void
    {
        $core = "VND";
        $this->vnp_CurrCode = $core;
    }

    /**
     * Setter for vnp_Amount.
     * @param int $vnp_Amount of the Payment Service.
     */
    public function setVnpAmount(int $vnp_Amount): void
    {
        $NUMBER_CALCULATOR = 100; // The amount to be paid is multiplied by 100 to eliminate the decimal before sending to VNPAY
        $this->vnp_Amount = $vnp_Amount * $NUMBER_CALCULATOR;
    }

    /**
     * Setter for vnp_CreateDate.
     */
    public function setVnpCreateDate(): void
    {
        $formatDate = date('YmdHis');
        $this->vnp_CreateDate = $formatDate;
    }
}