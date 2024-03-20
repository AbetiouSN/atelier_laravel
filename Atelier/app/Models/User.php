<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $fillable = [
        'email',
        'password',
        'role',
    ];

    public function admin()
    {
        return $this->hasOne(Admin::class);
    }
    public function client()
    {
        return $this->hasOne(Client::class);
    }
}
