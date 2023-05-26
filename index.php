<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>veiw users</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    
</head>
<body>
   

    <div class="container">
        <h2>عرض المستخدمين</h2>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addUserModal">إضافة مستخدم</button>

        <table class="table">
            <thead>
                <tr>
                    <th>الاسم</th>
                    <th>البريد الإلكتروني</th>
                    <th>العمر</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // connection database
                $dbHost = 'localhost';
                $dbUser = 'root';
                $dbPass = '';
                $dbName = 'users_db';

                $conn = mysqli_connect($dbHost, $dbUser, $dbPass, $dbName);

                // checking connection database
                if (!$conn) {
                    die("فشل الاتصال بقاعدة البيانات: " . mysqli_connect_error());
                }

                // query from database
                $sql = "SELECT * FROM users";
                $result = mysqli_query($conn, $sql);

                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo '<tr>';
                        echo '<td>' . $row['name'] . '</td>';
                        echo '<td>' . $row['email'] . '</td>';
                        echo '<td>' . $row['age'] . '</td>';
                        echo '</tr>';
                    }
                } else {
                    echo '<tr><td colspan="3">لا يوجد مستخدمين</td></tr>';
                }

                // close coonection database
                mysqli_close($conn);
                ?>
            </tbody>
        </table>

        <!-- Modal add new user-->
        <div class="modal fade" id="addUserModal" tabindex="-1" role="dialog" aria-labelledby="addUserModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addUserModalLabel">إضافة مستخدم جديد</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        
                        <form method="post" action="add_user.php">
                            <div class="form-group">
                                <label for="name">الاسم</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="أدخل الاسم">
                            </div>
                            <div class="form-group">
                                <label for="email">البريد الإلكتروني</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="أدخل البريد الإلكتروني">
                            </div>
                            <div class="form-group">
                                <label for="age">العمر</label>
                                <input type="number" class="form-control" id="age" name="age" placeholder="أدخل العمر">
                            </div>
                            <button type="submit" class="btn btn-primary">إضافة</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>


    
</body>
</html>