<?php

use app\src\models\Product;

$daoProducts = new Product();
$product = $daoProducts->getProduct($_GET['book_isb']);
$dataProduct = $product->fetch();

echo '
<section class="section checkOut_container">
    <h3>Tạo mới đơn hàng</h3>
    <div class="table-responsive">
        <form action="/payment" id="create_form" method="post">
            <div class="form-group">
                <label for="order_id">Mã hóa đơn</label>
                <input class="form-control" id="order_id" name="order_id" type="text" value="' . date("YmdHis") . '"  />
            </div>
            <div class="form-group">
                <label for="amount">Số tiền</label>
                <input class="form-control amount" id="amount" name="amount" type="number" value="' . $dataProduct['price'] . '" />
            </div>
            <div class="form-group">
            <label for="quantity">Số luọng</label>
            <input data-amount="' . $dataProduct['price'] . '"  class="form-control" id="quantity" name="quantity" type="number" value="1" />
        </div>
            <div class="form-group">
                <label for="order_desc">Nội dung thanh toán</label>
                <textarea class="form-control" cols="20" id="order_desc" name="order_desc" rows="2">Noi dung thanh toan</textarea>
            </div>
            <div class="form-group">
                <label for="bank_code">Ngân hàng</label>
                <select name="bank_code" id="bank_code" class="form-control">
                    <option value="">Không chọn</option>
                    <option value="NCB"> Ngan hang NCB</option>
                    <option value="AGRIBANK"> Ngan hang Agribank</option>
                    <option value="SCB"> Ngan hang SCB</option>
                    <option value="SACOMBANK">Ngan hang SacomBank</option>
                    <option value="EXIMBANK"> Ngan hang EximBank</option>
                    <option value="MSBANK"> Ngan hang MSBANK</option>
                    <option value="NAMABANK"> Ngan hang NamABank</option>
                    <option value="VNMART"> Vi dien tu VnMart</option>
                    <option value="VIETINBANK">Ngan hang Vietinbank</option>
                    <option value="VIETCOMBANK"> Ngan hang VCB</option>
                    <option value="HDBANK">Ngan hang HDBank</option>
                    <option value="DONGABANK"> Ngan hang Dong A</option>
                    <option value="TPBANK"> Ngân hàng TPBank</option>
                    <option value="OJB"> Ngân hàng OceanBank</option>
                    <option value="BIDV"> Ngân hàng BIDV</option>
                    <option value="TECHCOMBANK"> Ngân hàng Techcombank</option>
                    <option value="VPBANK"> Ngan hang VPBank</option>
                    <option value="MBBANK"> Ngan hang MBBank</option>
                    <option value="ACB"> Ngan hang ACB</option>
                    <option value="OCB"> Ngan hang OCB</option>
                    <option value="IVB"> Ngan hang IVB</option>
                    <option value="VISA"> Thanh toan qua VISA/MASTER</option>
                </select>
            </div>
            <div class="form-group">
                <label for="language">Ngôn ngữ</label>
                <select name="language" id="language" class="form-control">
                    <option value="vn">Tiếng Việt</option>
                    <option value="en">English</option>
                </select>
            </div>
            <div class="form-group">
                <h3>Thông tin hóa đơn (Billing)</h3>
            </div>
            <div class="form-group">
                <label>Họ tên (*)</label>
                <input class="form-control" id="txt_billing_fullname" name="txt_billing_fullname" type="text" value="NGUYEN VAN XO" />
            </div>
            <div class="form-group">
                <label>Email (*)</label>
                <input class="form-control" id="txt_billing_email" name="txt_billing_email" type="text" value="xonv@vnpay.vn" />
            </div>
            <div class="form-group">
                <label>Số điện thoại (*)</label>
                <input class="form-control" id="txt_billing_mobile" name="txt_billing_mobile" type="text" value="0934998386" />
            </div>
            <div class="form-group">
                <label>Địa chỉ (*)</label>
                <input class="form-control" id="txt_billing_addr1" name="txt_billing_addr1" type="text" value="22 Lang Ha" />
            </div>
            <input class="form-control none" id="informationOrder" name="informationOrder" type="text"/>
            <button data-name="' . $dataProduct['title'] . '" type="submit" name="redirect" id="redirect" class="btn btn-default">Thanh toán</button>
        </form>
    </div>
</section>';
?>

<script>
    const price = document.getElementById('amount');
    const quantity = document.getElementById('quantity');
    quantity.addEventListener('input', function(event) {
        event.preventDefault();
        price.value = event.target.dataset.amount * event.target.value;
    });

    const btn = document.getElementById('redirect');
    btn.addEventListener('click', function(event) {
        const addressCustomer = document.getElementById('txt_billing_addr1');
        const informationOrderProduct = `Noi dung thanh toan: Khach hang mua ${event.target.dataset.name}, So luong ${quantity.value}, Dia chi: ${addressCustomer.value}`;
        document.getElementById('informationOrder').value = informationOrderProduct;
    });
</script>