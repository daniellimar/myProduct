<?php

namespace app\database\models;

use app\database\Connection;

class User extends Model
{
    protected string $table = 'Product';

    public function teste()
    {
        dd('teste Model User');
    }
}