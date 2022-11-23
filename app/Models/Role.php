<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Role extends Model
{
    use HasFactory;
    protected $table = 'roles';

    protected $fillable = [
        'name',

    ];
    
    public function users()
    {
        return $this->hasMany(User::class,'role_id','id');
    }

    public function hasRole($role)
    {
        $user = Auth::user();
        $role_id=$user->role_id;
        $check = User::with('roles')->whereHas('roles', function ($query)  use ($role_id) {
                    $query->where('id', $role_id);
                })->first();

        return $check->roles->name;
    }
}
