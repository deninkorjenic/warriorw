<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    /**
     * @var array
     */
    protected $fillable = [
        'name',
        'points',
        'value',
    ];
}
