
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // اتصال بقاعدة البيانات
    $dbHost = 'localhost';
    $dbUser = 'root';
    $dbPass = '';
    $dbName = 'users_db';

    $conn = mysqli_connect($dbHost, $dbUser, $dbPass, $dbName);

    // التحقق من الاتصال بقاعدة البيانات
    if (!$conn) {
        die("فشل الاتصال بقاعدة البيانات: " . mysqli_connect_error());
    }

    // استلام بيانات المستخدم الجديد من النموذج
    $name = $_POST['name'];
    $email = $_POST['email'];
    $age = $_POST['age'];

    // استعلام قاعدة البيانات لإضافة المستخدم الجديد
    $sql = "INSERT INTO users (name, email, age) VALUES ('$name', '$email', $age)";

    if (mysqli_query($conn, $sql)) {
        
        header('Location: index.php');
        echo "<script>alert('تم إضافة المستخدم بنجاح!');</script>";
        exit();
    } else {
        echo "خطأ في إضافة المستخدم: " . mysqli_error($conn);
    }

    // إغلاق اتصال قاعدة البيانات
    mysqli_close($conn);
}
