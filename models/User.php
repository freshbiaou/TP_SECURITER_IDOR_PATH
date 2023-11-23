<?php

require_once('Model.php');
class User extends Model
{
    protected $table = 'users';

    protected $fillable = ['first_name', 'last_name', 'email', 'pass'];

    protected $timestamp = false;

}