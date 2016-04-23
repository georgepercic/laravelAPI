<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AccountToken extends Model
{
    const RECOVER   = 2; // forgot password
    const REMEMBER  = 3; // remember me
    const VERIFY    = 1; // verify email


    const VERIFY_VIEW   = 'emails.verify';
    const RECOVER_VIEW  = 'emails.recover';

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'user_tokens';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'email',
        'token',
        'type',
        'expire_at',
        'used_at'
    ];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;
}
