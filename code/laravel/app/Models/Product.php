<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 *
 * @property int id
 * @property string name
 * @property string description
 *
 */
class Product extends Model
{
    use HasFactory;

    public function creator()
    {
        return $this->belongsTo(User::class, 'creator_id');
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }
}
