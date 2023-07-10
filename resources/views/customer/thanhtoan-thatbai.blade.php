<!-- payment_failed.blade.php -->

    <title>Thanh toán thất bại</title>

    <div class="container2">
        <div class="payment-failed2">
            <h1>Thanh toán thất bại</h1>
            <div class="payment-details2">
                <p><strong>Phương thức thanh toán:</strong> {{ $paymentMethod }}</p>
                <p><strong>Họ tên:</strong> {{ $fullName }}</p>
                <p><strong>Email:</strong> {{ $email }}</p>
                <p><strong>Số điện thoại:</strong> {{ $phone }}</p>
                <p><strong>Số khách:</strong> {{ $guestCount }}</p>
                <p><strong>Giới tính:</strong> {{ $gender }}</p>
                <p><strong>Tour:</strong> {{ $tour }}</p>
                <p><strong>Khuyến mãi:</strong> {{ $promotion }}</p>
                <p><strong>Tiền thanh toán:</strong> {{ $amountPaid }}</p>
                <p><strong>Giá tiền:</strong> {{ $price }}</p>
            </div>
            <div class="button-container2">
                <a href="#" class="button2">Quay lại trang thanh toán</a>
            </div>
        </div>
    </div>

