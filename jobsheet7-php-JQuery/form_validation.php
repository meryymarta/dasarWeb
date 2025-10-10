<!DOCTYPE html>
<html>
<head>
    <title>Form Input dengan Validasi</title>
    <style>
        label {
            display: inline-block;
            width: 100px;
        }
        span{
            margin-left: 100px;
        }
        </style>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <h1>Form Input dengan Validasi</h1>
    <form id="myForm" method="post">
        <label for="nama">Nama:</label>
        <input type="text" id="nama" name="nama">
        <span id="nama-error" style="color: red;"></span><br>

        <label for="email">Email:</label>
        <input type="text" id="email" name="email">
        <span id="email-error" style="color: red;"></span><br>
       
        <label for="password">Password:</label>
        <input type="text" id="password" name="password">
        <span id="password-error" style="color: red;"></span><br>

         <br>
        <input type="submit" value="Submit">

    </form>

    <div id="hasil" style="margin-top:20px; color: green;"></div>

    <script>
        $(document).ready(function() {
            $("#myForm").submit(function(event) {
                event.preventDefault(); // hentikan submit form biasa

                var nama = $("#nama").val();
                var email = $("#email").val();
                var password = $("#password").val();
                var valid = true;

                // Validasi Nama
                if (nama === "") {
                    $("#nama-error").text("Nama harus diisi.");
                    valid = false;
                } else {
                    $("#nama-error").text("");
                }

                // Validasi Email
                if (email === "") {
                    $("#email-error").text("Email harus diisi.");
                    valid = false;
                } else {
                    $("#email-error").text("");
                }

                //validasi password
                if (password === "") {
                     $("#password-error").text("Password harus diisi.");
                    valid = false;
                } else if (password.length < 8) {
                    $("#password-error").text("Password minimal 8 karakter.");
                    valid = false;
                } else {
                    $("#password-error").text("");
                }

                //menghentikan eksekusi jika ada error
                if (!valid) {
                    return; 
                }
                // ajax
                var formData = $(this).serialize(); 

                $.ajax({
                    url: "process_validation.php",
                    type: "POST",
                    data: formData,
                    success: function(response) {
                        $("#hasil").html(response);
                    },
                    error: function() {
                        $("#hasil").html("<span style='color:red;'>Terjadi kesalahan pada server.</span>");
                    }
                });
            });
        });
    </script>
</body>
</html>
