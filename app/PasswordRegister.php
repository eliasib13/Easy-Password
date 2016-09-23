<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PasswordRegister extends Model
{
    protected $table = 'password_registers';

    public function user() {
        return $this->belongsTo('App\User');
    }

    protected $name;

    protected $password;

    protected $userId;
}
