<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Hotel Room Booking</title>
  <style>
   body {
  font-family: 'Poppins', sans-serif;
  background: url('img/gambar_kamar.jpeg') no-repeat center center fixed;
  background-size: cover;
  min-height: 100vh;
  margin: 0;
  display: flex;
  align-items: center;
  justify-content: center;
  color: #333;
}

body::before {
  content: "";
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background: rgba(255, 255, 255, 0.3);
  backdrop-filter: blur(5px); 
  z-index: 0;

}
.container {
  width: 460px;
  background: rgba(255, 255, 255, 0.9);
  backdrop-filter: blur(10px);
  padding: 35px 40px;
  border-radius: 20px;
  box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
  animation: fadeIn 0.7s ease;
}

@keyframes fadeIn {
  from { opacity: 0; transform: translateY(10px); }
  to { opacity: 1; transform: translateY(0); }
}

h2 {
  text-align: center;
  color: #614917c3;
  margin-bottom: 25px;
  font-weight: 700;
}

label {
  display: block;
  font-weight: 600;
  margin-bottom: 6px;
  color: #444;
}

input, select, textarea {
  width: 100%;
  padding: 11px;
  margin-bottom: 15px;
  border: 2px solid #e6ecf5;
  border-radius: 10px;
  font-size: 14px;
  background: #fdfdff;
  transition: all 0.25s ease;
  appearance: none;   
}

input:focus, select:focus, textarea:focus {
  border-color: #614917;
  box-shadow: 0 0 6px rgba(116, 70, 20, 0.3);
  background: #fff;
  outline: none;
}

button {
  width: 100%;
  background: linear-gradient(135deg, #614917, #a07c42);
  color: #fff;
  border: none;
  padding: 12px;
  font-size: 16px;
  border-radius: 10px;
  cursor: pointer;
  transition: 0.3s;
  letter-spacing: 0.5px;
  font-weight: 600;
}

button:hover {
  background: linear-gradient(135deg, #3d2f10, #7c5e26); 
  transform: translateY(-1px);
}

  </style>
  <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
</head>
<body>

  <div class="container">
    <h2>🏨 Hotel Room Booking</h2>

    <form id="bookingForm" action="booking_result.php" method="POST">
      <label for="fullname">Full Name</label>
      <input type="text" name="fullname" id="fullname" 
             value="<?php echo $_SESSION['fullname'] ?? ''; ?>" 
             placeholder="Your name">

      <label for="email">Email Address</label>
      <input type="email" name="email" id="email"
             value="<?php echo $_SESSION['email'] ?? ''; ?>" 
             placeholder="example@mail.com">

      <label for="checkin">Check-in Date</label>
      <input type="date" name="checkin" id="checkin"
             value="<?php echo $_SESSION['checkin'] ?? ''; ?>">

      <label for="checkout">Check-out Date</label>
      <input type="date" name="checkout" id="checkout"
             value="<?php echo $_SESSION['checkout'] ?? ''; ?>">

      <label for="room">Room Type</label>
      <select name="room" id="room">
        <option value="">-- Select Room Type --</option>
        <option value="Standard Room" <?php if(($_SESSION['room'] ?? '') == 'Standard Room') echo 'selected'; ?>>Standard Room</option>
        <option value="Deluxe Room" <?php if(($_SESSION['room'] ?? '') == 'Deluxe Room') echo 'selected'; ?>>Deluxe Room</option>
        <option value="Suite Room" <?php if(($_SESSION['room'] ?? '') == 'Suite Room') echo 'selected'; ?>>Suite Room</option>
      </select>

      <label for="guests">Number of Guests</label>
      <input type="number" name="guests" id="guests" min="1"
             value="<?php echo $_SESSION['guests'] ?? ''; ?>" placeholder="e.g. 2">

      <label for="requests">Special Requests</label>
      <textarea name="requests" id="requests" rows="3" placeholder="Optional..."><?php echo $_SESSION['requests'] ?? ''; ?></textarea>

      <button type="submit">Submit Booking</button>
    </form>
  </div>

  <script>
  $("#bookingForm").on("submit", function(){
    if($("#fullname").val()==="" || $("#email").val()==="" || $("#checkin").val()==="" || 
       $("#checkout").val()==="" || $("#room").val()===""){
      alert("Please fill in all required fields!");
      return false; 
    }
  });
</script>
</body>
</html>


