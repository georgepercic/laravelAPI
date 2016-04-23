<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lesson extends Api
{
    use GenerateUuid;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'lessons';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'course_id',
        'video_id',
        'xp',
        'short_description',
        'long_description',
    ];

    /**
     * primary key is an UUID
     * @var bool
     */
    public $incrementing = false;

    /**
     * Set of validation rules
     * @var array
     */
    protected $rules = [];

    /**
     * Get rules for validation
     * @return array
     */
    public function getValidationRules()
    {
        return $this->rules;
    }

    /**
     * @return $this
     */
    public function model()
    {
        return $this;
    }
}
