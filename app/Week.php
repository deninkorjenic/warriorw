<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Week extends Model
{
    protected $fillable  = [
        'title',
        'description',
        'week_number',
        'maximum_points',
    ];

    public function tasks() {
        return $this->belongsToMany(Task::class);
    }

    /**
     * Checks if the relation to task exits and returns boolean
     * @param $taskId
     * @return bool
     */
    public function isRelatedTo($taskId) {
        $result = $this->tasks()->where('task_id', $taskId);

        return count($result->first()) > 0;
    }
}
