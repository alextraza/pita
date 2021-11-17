<?php

namespace App\Admin\Models;

use App\Models\User;

class UserSearch extends User
{
    use SearchTrait;

    protected $table = 'users';
    protected static $_model;
    protected static $sorting = [
        'id', 'name', 'phone', 'email', 'is_admin'
    ];
    protected static $filtering = [
        'name', 'phone', 'email',
    ];
}
