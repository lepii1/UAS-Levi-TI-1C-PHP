<?php
$host = 'localhost';
$user = 'root';
$password = '';
$db = 'acara';

$conn = mysqli_connect($host, $user, $password, $db);
if (!$conn) die("Koneksi gagal: " . mysqli_connect_error());

// Proses Pendaftaran Peserta
if (isset($_POST['name']) && isset($_POST['email'])) {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $sql = "INSERT INTO peserta (nama, email) VALUES ('$name', '$email')";
    echo mysqli_query($conn, $sql) ? "success" : "error";
    exit;
}

// Ambil Daftar Peserta
if (isset($_GET['peserta'])) {
    $result = mysqli_query($conn, "SELECT * FROM peserta ORDER BY id DESC");
    $data = [];
    while ($row = mysqli_fetch_assoc($result)) $data[] = $row;
    echo json_encode($data);
    exit;
}

// Upload Bukti Pembayaran
if (isset($_POST['bukti_nama']) && isset($_FILES['bukti_file'])) {
    $nama = mysqli_real_escape_string($conn, $_POST['bukti_nama']);
    $targetDir = "uploads/";
    if (!is_dir($targetDir)) mkdir($targetDir, 0777, true);
    $filename = time() . '_' . basename($_FILES['bukti_file']['name']);
    $targetFile = $targetDir . $filename;

    if (move_uploaded_file($_FILES['bukti_file']['tmp_name'], $targetFile)) {
        $sql = "INSERT INTO pembayaran (nama, bukti) VALUES ('$nama', '$filename')";
        echo mysqli_query($conn, $sql) ? "success" : "error";
    } else {
        echo "upload_error";
    }
    exit;
}

// Ambil Daftar Pembayaran
if (isset($_GET['pembayaran'])) {
    $result = mysqli_query($conn, "SELECT * FROM pembayaran ORDER BY id DESC");
    $data = [];
    while ($row = mysqli_fetch_assoc($result)) $data[] = $row;
    echo json_encode($data);
    exit;
}

// Simpan Feedback
if (isset($_POST['feedback'])) {
    $feedback = mysqli_real_escape_string($conn, $_POST['feedback']);
    $sql = "INSERT INTO feedback (isi) VALUES ('$feedback')";
    echo mysqli_query($conn, $sql) ? "success" : "error";
    exit;
}

// Ambil Feedback
if (isset($_GET['feedback'])) {
    $result = mysqli_query($conn, "SELECT * FROM feedback ORDER BY id DESC");
    $data = [];
    while ($row = mysqli_fetch_assoc($result)) $data[] = $row;
    echo json_encode($data);
    exit;
}
?>
