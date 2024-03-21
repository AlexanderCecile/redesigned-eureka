<?php
$this->addRoute('','Publication,showList');
$this->addRoute('Publication/{publication_id}','Publication,show');
$this->addRoute('User/register','User,register');
$this->addRoute('User/update-profile/{user_id}','User,updateProfile');
$this->addRoute('User/profile/{user_id}', 'User,showProfile');
$this->addRoute('User/login', 'User,login');
?>