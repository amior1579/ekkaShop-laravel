<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    use HasFactory;

    protected $table = 'permissions';

    protected $fillable = ['permissions_category', 'name'];

    public function category()
    {
        return $this->belongsTo(PermissionCategory::class, 'permissions_category', 'name');
    }
}
