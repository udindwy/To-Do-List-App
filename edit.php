<?php
include 'koneksi.php';

//select data yang akan diedit
$q_select = "select * from tasks where taskid = '" . $_GET['id'] . "'";
$run_q_select = mysqli_query($conn, $q_select);
$d = mysqli_fetch_object($run_q_select);

//edit data
if (isset($_POST['edit'])) {

    $q_update = "update tasks set tasklabel = '" . htmlspecialchars($_POST['task']) . "' where taskid = '" . $_GET['id'] . "'";
    $run_q_update = mysqli_query($conn, $q_update);
    header('Refresh: 0; url=index.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To Do List</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <div class="header">
            <div class="title">
                <a href="index.php"><i class='bx bx-chevron-left'></i></a>
                <span>Kembali</span>
            </div>
            <div class="deskripsi">
                <?= (new DateTime())->format('l, d F Y') ?>
            </div>
        </div>

        <div class="content">
            <div class="card">
                <form action="" method="post">
                    <input type="text" name="task" class="input-control" placeholder="Edit tugas" value="<?= $d->tasklabel ?>" required>
                    <div class="text-right">
                        <button type="submit" name="edit">Edit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>