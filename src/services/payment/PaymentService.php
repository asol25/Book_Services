<?php


namespace app\src\services\payment;


use DateTime;
use JetBrains\PhpStorm\Pure;

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
    protected string $vnp_TmnCode;
    protected int $vnp_Amount;
    protected string $vnp_BankCode;
    protected string $vnp_BankTranNo;
    protected string $vnp_CardType;
    protected string $vnp_OrderInfo;
    protected int $vnp_TransactionNo;
    protected int $vnp_ResponseCode;
    protected int $vnp_TransactionStatus;
    protected int $vnp_TxnRef;
    protected string $vnp_SecureHashType;
    private DateTime $vnp_PayDate;
    private string $vnp_SecureHash;

    /**
     * PaymentService constructor.
     * @param String $vnp_TmnCode
     * @param int $vnp_Amount
     * @param String $vnp_BankCode
     * @param String $vnp_BankTranNo
     * @param String $vnp_CardType
     * @param DateTime $vnp_PayDate
     * @param String $vnp_OrderInfo
     * @param int $vnp_TransactionNo
     * @param int $vnp_ResponseCode
     * @param int $vnp_TransactionStatus
     * @param int $vnp_TxnRef
     * @param String $vnp_SecureHashType
     * @param String $vnp_SecureHash
     */
    #[Pure] public function __construct(string $vnp_TmnCode,
                                        int $vnp_Amount,
                                        string $vnp_BankCode,
                                        string $vnp_BankTranNo,
                                        string $vnp_CardType,
                                        DateTime $vnp_PayDate,
                                        string $vnp_OrderInfo,
                                        int $vnp_TransactionNo,
                                        int $vnp_ResponseCode,
                                        int $vnp_TransactionStatus,
                                        int $vnp_TxnRef,
                                        string $vnp_SecureHashType,
                                        string $vnp_SecureHash)
    {
        $this->vnp_TmnCode = $vnp_TmnCode;
        $this->vnp_Amount = $vnp_Amount;
        $this->vnp_BankCode = $vnp_BankCode;
        $this->vnp_BankTranNo = $vnp_BankTranNo;
        $this->vnp_CardType = $vnp_CardType;
        $this->vnp_PayDate = $vnp_PayDate;
        $this->vnp_OrderInfo = $vnp_OrderInfo;
        $this->vnp_TransactionNo = $vnp_TransactionNo;
        $this->vnp_ResponseCode = $vnp_ResponseCode;
        $this->vnp_TransactionStatus = $vnp_TransactionStatus;
        $this->vnp_TxnRef = $vnp_TxnRef;
        $this->vnp_SecureHashType = $vnp_SecureHashType;
        $this->vnp_SecureHash = $vnp_SecureHash;


        $this->CreatePaymentUrl = new Create_payment_url();
        $this->ReturnPaymentUrl = new Return_payment_url();
    }


}