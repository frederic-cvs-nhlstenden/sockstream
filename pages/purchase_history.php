<?php
session_start();
if (!isset($_SESSION['logged_in']) || !$_SESSION['logged_in']) {
    header('Location: login.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>Purchase History</title>
    <link rel="stylesheet" href="../styles/styles.css" />
</head>

<body>
    <?php require_once '../components/header.php'; ?>

    <section class="purchase-history">
        <div class="container">
            <div class="card">
                <h2 class="page-title">Purchase History</h2>
                <div class="purchase-list">
                    <div class="order">
                        <div class="purchase-item">
                            <p>Order #12031</p>
                            <p>Date: 2024-09-01</p>
                        </div>
                        <hr>
                        <div class="order-item">
                            <div class="order-left">
                                <img src="../assets/images/sunny_socks_photos/catalogus/Sunny_socks_blue.webp" alt="Sunny Socks Blue" class="product-image">
                                <p>Sunny Socks - Blue</p>
                            </div>
                            <p>2x$10.00</p>
                        </div>
                        <div class="order-item">
                            <div class="order-left">
                                <img src="../assets/images/sunny_socks_photos/catalogus/Sunny_socks_red.webp" alt="Sunny Socks Red" class="product-image">
                                <p>Sunny Socks - Red</p>
                            </div>
                            <p>$5.00</p>
                        </div>
                        <hr>
                        <div class="total-price">
                            <p>Total: $25.00</p>
                        </div>
                    </div>

                    <div class="order">
                        <div class="purchase-item">
                            <p>Order #32421</p>
                            <p>Date: 2024-08-15</p>
                        </div>
                        <hr>
                        <div class="order-item">
                            <div class="order-left">
                                <img src="../assets/images/sunny_socks_photos/catalogus/Sunny_socks_green.webp" alt="Sunny Socks Green" class="product-image">
                                <p>Sunny Socks - Green</p>
                            </div>
                            <p>3x$12.00</p>
                        </div>
                        <hr>
                        <div class="total-price">
                            <p>Total: $36.00</p>
                        </div>
                    </div>

                    <div class="order">
                        <div class="purchase-item">
                            <p>Order #82326</p>
                            <p>Date: 2024-08-15</p>
                        </div>
                        <hr>
                        <div class="order-item">
                            <div class="order-left">
                                <img src="../assets/images/sunny_socks_photos/catalogus/Sunny_socks_pink_01.webp" alt="Sunny Socks Green" class="product-image">
                                <p>Sunny Socks - Pink</p>
                            </div>
                            <p>2x$15.00</p>
                        </div>
                        <div class="order-item">
                            <div class="order-left">
                                <img src="../assets/images/sunny_socks_photos/catalogus/Sunny_socks_uni_pink.webp" alt="Sunny Socks Green" class="product-image">
                                <p>Sunny Socks - Uni Pink</p>
                            </div>
                            <p>$17.00</p>
                        </div>
                        <div class="order-item">
                            <div class="order-left">
                                <img src="../assets/images/sunny_socks_photos/catalogus/Sunny_socks_yellow.webp" alt="Sunny Socks Green" class="product-image">
                                <p>Sunny Socks - Yellow</p>
                            </div>
                            <p>$10.00</p>
                        </div>
                        <hr>
                        <div class="total-price">
                            <p>Total: $57.00</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php
    require_once '../components/footer.php';
    ?>
</body>

</html>