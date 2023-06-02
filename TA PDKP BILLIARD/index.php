<!DOCTYPE html>
<html>
<head>
    <title>Booking Meja Billiard</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            background-image: url(8ball.jpg);
            background-size: cover; /* Menyesuaikan ukuran gambar dengan latar belakang */
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Booking Meja Billiard</h1>
        <form method="post" action="booking.php">
            <label for="name">Nama :</label>
            <input type="text" id="name" name="name" required><br><br>
            <label for="notelp">No. Telepon :</label>
            <input type="text" id="notelp" name="notelp" required><br><br>
            <label for="package">Pilih Paket :</label>
            <select name="package" id="package" required>
                <option value="" selected disabled>Pilih Paket</option>
                <?php
                // Daftar paket meja billiard beserta harga durasinya per jam
                $billiardPackages = [
                    "Bronze (Rp 50,000/jam)",
                    "Silver (Rp 60,000/jam)",
                    "Gold (Rp 70,000/jam)",
                    "Platinum (Rp 80,000/jam)"
                ];

                // Menambahkan opsi pada dropdown
                foreach ($billiardPackages as $packageOption) {
                    echo "<option value=\"$packageOption\">$packageOption</option>";
                }
                ?>
            </select>
            <br><br>
            <label for="date">Tanggal :</label>
            <input type="date" id="date" name="date" required><br><br>

            <label for="time">Waktu :</label>
            <input type="time" id="time" name="time" required><br><br>
            <input type="submit" value="Book Now">
        </form>
        <?php if (isset($_GET['error'])) : ?>
            <p class="error"><?php echo $_GET['error']; ?></p>
        <?php endif; ?>
    </div>
</body>
</html>
