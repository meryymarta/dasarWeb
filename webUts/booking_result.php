<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $_SESSION['fullname'] = $_POST['fullname'];
  $_SESSION['email'] = $_POST['email'];
  $_SESSION['checkin'] = $_POST['checkin'];
  $_SESSION['checkout'] = $_POST['checkout'];
  $_SESSION['room'] = $_POST['room'];
  $_SESSION['guests'] = $_POST['guests'];
  $_SESSION['requests'] = $_POST['requests'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Booking Confirmation</title>
  <style>
    body {
      font-family: 'Poppins', sans-serif;
      padding: 60px;
      color: #333;
    }

    body::before {
    content: "";
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: url('img/gambar_kolam.jpeg') no-repeat center center fixed;
    background-size: cover;
    filter: blur(8px);
    z-index: -1;
    
}


    .box {
      background: rgba(255, 255, 255, 0.95);
      width: 460px;
      margin: auto;
      padding: 30px;
      border-radius: 15px;
      border: 1px solid #e8dcc2;
      box-shadow: 0 6px 25px rgba(97, 73, 23, 0.15);
    }

    h2 {
      color: #614917;
      text-align: center;
      margin-bottom: 25px;
      font-weight: 700;
    }

    p {
      line-height: 1.6;
      font-size: 15px;
      margin: 8px 0;
    }

    .label {
      font-weight: bold;
      color: #a07c42; /* gold lembut */
    }

    .back {
      display: inline-block;
      text-align: center;
      text-decoration: none;
      background: linear-gradient(135deg, #614917, #a07c42);
      color: white;
      padding: 10px 18px;
      border-radius: 8px;
      font-size: 14px;
      font-weight: 600;
      margin-top: 20px;
      transition: 0.3s;
    }

    .back:hover {
      background: linear-gradient(135deg, #3d2f10, #7c5e26);
      transform: translateY(-2px);
    }

    .back.clear {
      background: linear-gradient(135deg, #a3472f, #e45d3a); /* merah hangat */
      margin-left: 10px;
    }

    .back.clear:hover {
      background: linear-gradient(135deg, #842f1c, #c24a2c);
    }

    hr {
      border: none;
      border-top: 1px solid #e0cfa5;
      margin: 15px 0;
    }
  </style>
</head>
<body>
  <div class="box">
    <h2>🏨 Booking Confirmed!</h2>
    <p style="text-align:center;">Here are your booking details:</p>
    <hr>

    <p><span class="label">Full Name:</span> 
    <?php echo isset($_POST['fullname']) ? htmlspecialchars($_POST['fullname']) : '-'; ?></p>
    
    <p><span class="label">Email:</span> 
    <?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : '-'; ?></p>
    
    <p><span class="label">Check-in:</span> 
    <?php echo isset($_POST['checkin']) ? htmlspecialchars($_POST['checkin']) : '-'; ?></p>
    
    <p><span class="label">Check-out:</span> 
    <?php echo isset($_POST['checkout']) ? htmlspecialchars($_POST['checkout']) : '-'; ?></p>

    <p><span class="label">Room Type:</span> 
    <?php echo isset($_POST['room']) ? htmlspecialchars($_POST['room']) : '-'; ?></p>

    <p><span class="label">Guests:</span> 
    <?php echo isset($_POST['guests']) ? htmlspecialchars($_POST['guests']) : '-'; ?></p>

    <p><span class="label">Requests:</span> 
  <?php 
    echo isset($_POST['requests']) && $_POST['requests'] !== '' 
      ? htmlspecialchars($_POST['requests']) 
      : 'None';  
  ?>
</p>



    <div style="text-align:center;">
      <a href="hotel_booking_form.php" class="back">← Back to Form</a>
      <a href="clear_session.php" class="back clear">🧹 Clear Session</a>
    </div>
  </div>
</body>
</html>
