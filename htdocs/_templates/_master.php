<!doctype html>
<html lang="en">
<?php session::loadTemplate('_head'); ?>

<body>
    <main>
        <?php
        if (session::$isError) {
            session::loadTemplate('_error');
        } else {
            session::loadTemplate(session::currentScript());
        }
        ?>
    </main>
</body>

</html>