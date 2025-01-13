<?php
if (session::isset("session_token")) {
    if (usersession::authorize(session::get("session_token"))) {
?>
        <script>
            window.location = "./"
        </script>

<?php
    } else {
        include "form/_signup_form.php";
    }
} else {
    include "form/_signup_form.php";
}
?>