
<?php session::loadTemplate('_head'); ?>

<body>

	<?php session::loadTemplate('_header'); ?>
	<main id="mainel">
		<?php
        if (session::$isError) {
            session::loadTemplate('_error');
        } else {
            session::loadTemplate(session::currentScript());
        }
?>