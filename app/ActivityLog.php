<?php

namespace App;

class ActivityLog extends Api
{
    use GenerateUuid;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'activity_logs';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'resource_id',
        'resource_type',
        'action',
        'dump',
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
