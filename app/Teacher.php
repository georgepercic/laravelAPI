<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Api
{
    use GenerateUuid;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'teachers';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'image_id',
        'full_name',
        'facebook',
        'twitter',
        'linkedin',
        'bio',
        'website',
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
