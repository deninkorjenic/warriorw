<?php

namespace App\Models;

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

    public function trainings()
    {
        return $this->belongsToMany(Training::class);
    }

    public function education()
    {
        return $this->belongsToMany(Education::class);
    }

    public function program()
    {
        return $this->belongsTo(Program::class);
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

    /**
     * Checks if the relation to training exits and returns boolean
     * 
     * @param $trainingId
     * @return bool
     */
    public function isRelatedToTraining($trainingId) {
        $result = $this->trainings()->where('training_id', $trainingId);

        return count($result->first()) > 0;
    }

    /**
     * Checks if the relation to education exits and returns boolean
     * 
     * @param $trainingId
     * @return bool
     */
    public function isRelatedToEducation($educationId) {
        $result = $this->education()->where('education_id', $educationId);

        return count($result->first()) > 0;
    }
}
