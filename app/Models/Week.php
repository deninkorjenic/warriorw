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

    /**
     * Get all tasks related to current week
     * @return Collection
     */
    
    public function tasks() {
        return $this->belongsToMany(Task::class);
    }

    /**
     * Get all trainings related to current week
     * @return Collection
     */
    
    public function trainings()
    {
        return $this->belongsToMany(Training::class);
    }

    /**
     * Get all educations related to current week
     * @return Collection
     */
    
    public function education()
    {
        return $this->belongsToMany(Education::class);
    }

    /**
     * Get program related to current week
     * @return Collection
     */
    
    public function program()
    {
        return $this->belongsToMany(Program::class);
    }

    /**
     * Get quiz related to current week
     * @return Collection
     */
    
    public function quizes()
    {
        return $this->hasMany(Quiz::class);
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

    /**
     * Checks if the relation to program exits and returns boolean
     * 
     * @param $programId
     * @return bool
     */
    public function isRelatedToProgram($programId) {
        $result = $this->program()->where('program_id', $programId);

        return count($result->first()) > 0;
    }

    /**
     * Checks if the relation to quiz exits and returns boolean
     * 
     * @param $programId
     * @return bool
     */
    public function isRelatedToQuiz($weekId) {
        $result = $this->quizes()->where('week_id', $weekId);

        return count($result->first()) > 0;
    }

    /**
     * Method used to count max available points based on tasks, educations, trainings and quizes
     */
    public function calculateMaxPoints() {
        $taskPoints = $this->tasks()->sum('points');
        $educationPoints = $this->education()->sum('points');
        $trainingPoints = $this->trainings()->sum('points');
        $quizPoints = $this->quizes()->sum('points');

        return ($taskPoints + $educationPoints + $trainingPoints + $quizPoints);
    }
}
