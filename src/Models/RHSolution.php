<?php
namespace App\Models;
// generated from /resources/views/vendor/survloop/admin/db/export-laravel-model-gen.blade.php

use Illuminate\Database\Eloquent\Model;

class RHSolution extends Model
{
    protected $table      = 'rh_solution';
    protected $primaryKey = 'solu_id';
    public $timestamps    = true;
    protected $fillable   =
    [
        'solu_def',
        'solu_offer_fee_setup',
        'solu_offer_fee_month',
        'solu_hosting_fee_month',
        'solu_on_plesk',
    ];

    // END Survloop auto-generated portion of Model

}