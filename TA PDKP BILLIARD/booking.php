<?php
class BilliardTableBooking
{
    public function checkAvailability($date, $time)
    {
        return true;
    }

    public function bookTable($date, $time, $package)
    {
        return $package;
    }
}


$booking = new BilliardTableBooking();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name =  $_POST['name'];
    $notelp = $_POST['notelp'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $package = $_POST['package']; // Mendapatkan nilai paket yang dipilih dari form

    // Mengambil waktu saat ini
    $currentDateTime = new DateTime();
    $selectedDateTime = DateTime::createFromFormat('Y-m-d H:i', "$date $time");

    if ($selectedDateTime < $currentDateTime) {
        $error = "Error, tolong masukkan waktu yang valid.";
        header("Location: index.php?error=" . urlencode($error));
        exit();
    } 
    else {
        $booking->checkAvailability($date, $time);
        $bookedPackage = $booking->bookTable($date, $time, $package); // Menggunakan nilai paket yang dipilih
        $message = "Selamat $name ,pesanan anda berhasil dibuat."."</br>"." Silahkan datang pada $date pukul $time"."</br>"."Paket yang dipesan: $bookedPackage"; 
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Booking Meja Billiard - Result</title>
    <link rel="stylesheet" href="styles2.css">
    <style>
        body {
            background-image: url(billiardbg.jpg);
            background-size: cover; /* Menyesuaikan ukuran gambar dengan latar belakang */
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Terima Kasih</h1>
        <?php if (isset($message)) : ?>
            <p><?php echo $message; ?></p>
        <?php endif; ?>
        <img src="qr.jpg" alt="Terima Kasih" class="center">
        <a href="index.php">Kembali ke Halaman Utama</a>
    </div>
</body>

</html>
