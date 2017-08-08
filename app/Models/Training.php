<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Training extends Model
{
    /**
     * @var array
     */
    protected $fillable = [
        'description',
        'points',
        'week_id',
    ];

    /**
     * @return mixed
     */
    public function weeks()
    {
        return $this->belongsToMany(Week::class);
    }
}
