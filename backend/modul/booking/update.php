<?php
    $id_booking = $_GET['id_booking'];
    $stat = $_GET['status'];

    $query = $conn->prepare("UPDATE booking SET status = :stat WHERE id_booking = :id_booking");
    $query->bindParam(':id_booking', $id_booking);
    $query->bindParam(':stat', $stat);

    if ($query->execute()) {
        header('Location: ?page=booking');
        exit;
    } else {
        echo "Gagal mengupdate status booking.";
    }
?>


<!--buat accept/cancel bookingan-->