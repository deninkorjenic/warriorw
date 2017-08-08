<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    /**
     * @var array
     */
    protected $casts = [
        'related_weeks' => 'array',
    ];

    /**
     * @var array
     */
    protected $fillable = [
        'title',
        'description',
        'related_weeks',
    ];

    /**
     * @return mixed
     */
    public function weeks()
    {
        return $this->belongsToMany(Week::class);
    }
}
