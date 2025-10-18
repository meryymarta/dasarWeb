<?php
    session_start();
    ?>

    <!DOCTYPE html>
    <html>
        <body>
            <?php
                $_SESSION["favcolor"] = "Green";
                $_SESSION["favanimal"] = "cat";
                echo "Session variables are set";
            ?>
            </body>
    </html>