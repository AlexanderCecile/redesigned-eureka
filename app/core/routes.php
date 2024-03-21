<?php
$this->addRoute('','Publication,publicationFeed');
$this->addRoute('Publication/{publication_id}','Publication,show');
$this->addRoute('User/register','User,register');
$this->addRoute('User/update-profile/{user_id}','User,updateProfile');
$this->addRoute('User/profile/{user_id}', 'User,showProfile');
$this->addRoute('User/login', 'User,login');
$this->addRoute('Publication/create', 'Publication,create');
$this->addRoute('User/login-required', 'User,loginRequired');
?>