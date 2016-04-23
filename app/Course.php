<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Api
{
    use GenerateUuid;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'courses';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'cover_id',
        'video_id',
        'title',
        'friendly_url',
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
