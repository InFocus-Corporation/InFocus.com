<?php
$connection = mysqli_connect('{{db.host}}','{{db.user}}','{{db.password}}', '{{db.db}}',{{db.port}});
mysqli_set_charset($connection, "utf8");
ini_set('default_charset', 'utf-8');

