<?php
// Hubungkan ke database
$conn = new mysqli("localhost", "root", "", "portofolio_db");

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Tangkap data dari form dengan aman
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fname = $conn->real_escape_string($_POST['fname']);
    $femail = $conn->real_escape_string($_POST['femail']);
    $fcomment = $conn->real_escape_string($_POST['fcomment']);

    // Query insert data
    $sql = "INSERT INTO contact_messages (username, email, comment) VALUES ('$fname', '$femail', '$fcomment')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Pesan berhasil dikirim!'); window.location.href='index.php';</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>