<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable
{
    use HasFactory;
    use Notifiable;
    protected $table="admins";
    protected $guarded="admin";
    protected $fillable=[
        "name",
        "email",
        "password"
    ];
    protected $hidden = [ // những column khi get data sẽ dấu đi
        'password',
        'remember_token',
    ];
}
