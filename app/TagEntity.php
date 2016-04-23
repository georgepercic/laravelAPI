<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TagEntity extends Api
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'tags_entities';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['tag_id', 'entity_type', 'entity_id'];

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
