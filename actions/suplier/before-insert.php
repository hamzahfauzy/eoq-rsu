<?php

$user = $db->insert('users',[
    'name' => $_POST['suplier']['nama'],
    'username' => $_POST['suplier']['no_telepon'],
    'password' => md5(123456),
]);

$db->insert('user_roles',[
    'user_id' => $user->id,
    'role_id' => 2
]);

$_POST['suplier']['user_id'] = $user->id;