<?php
namespace App\Models;
// generated from /resources/views/vendor/survloop/admin/db/export-laravel-model-gen.blade.php

use Illuminate\Database\Eloquent\Model;

class RHQuoteSolution extends Model
{
    protected $table      = 'rh_quote_solution';
    protected $primaryKey = 'sol_id';
    public $timestamps    = true;
    protected $fillable   =
    [
        'sol_quote_id',
        'sol_def_id',

    ];

    // END Survloop auto-generated portion of Model

}