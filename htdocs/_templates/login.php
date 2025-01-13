<?php
if (session::isset("session_token")) {
    if (usersession::authorize(session::get("session_token"))) {
?>
        <script>
            window.location = "./"
        </script>

        <?php
    } else {
        include 'form/_login_form.php';
    }
} else {
    if (isset($_POST['pass']) and (isset($_POST['email'])) and isset($_POST['conpass']) and (isset($_POST['username'])) and (isset($_POST['phone']))) {
        if (user::signup($_POST['username'], $_POST['pass'], $_POST['email'], $_POST['phone'])) {
            include 'form/_login_form.php';
        } else {
            include 'signup.php';
        }
    } else if ((isset($_POST['pass']) and (isset($_POST['email'])))) {
        $us = usersession::authentiaction($_POST['email'], $_POST['pass']);
        if ($us) {
        ?>
            <script>
                window.location = "./"
            </script>
<?php
        } else {
            include 'form/_login_form.php';
        }
    } else {
        include 'form/_login_form.php';
    }
}
?>