<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DateTime;
/**
 * @property int id
 * @property string name
 * @property DateTime created_at
 * @property DateTime updated_at
 */
class Category extends Model
{
    use HasFactory;
}
