<?php
session_start();
session_destroy();
header("Location: hotel_booking_form.php");
exit;
?>
