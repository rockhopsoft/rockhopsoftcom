<?php
namespace App\Models;
// generated from /resources/views/vendor/survloop/admin/db/export-laravel-model-gen.blade.php

use Illuminate\Database\Eloquent\Model;

class RHQuoteBigTech extends Model
{
    protected $table      = 'rh_quote_big_tech';
    protected $primaryKey = 'big_id';
    public $timestamps    = true;
    protected $fillable   =
    [
        'big_quote_id',
        'big_tech_def',
        'big_relation',

    ];

    // END Survloop auto-generated portion of Model

}