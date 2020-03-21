<?php
Artisan::command('zmcms_users_load', function () {
	require(getcwd().'/vendor/zmcms/users/src/dummy/example_data.php');
});
