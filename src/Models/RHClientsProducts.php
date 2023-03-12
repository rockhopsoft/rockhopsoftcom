<?php
namespace App\Models;
// generated from /resources/views/vendor/survloop/admin/db/export-laravel-model-gen.blade.php

use Illuminate\Database\Eloquent\Model;

class RHClientsProducts extends Model
{
    protected $table      = 'rh_clients_products';
    protected $primaryKey = 'prod_id';
    public $timestamps    = true;
    protected $fillable   =
    [
        'prod_client_id',
        'prod_solution_def',
        'prod_date_start',
        'prod_date_end',
        'prod_url',
    ];

    // END Survloop auto-generated portion of Model

}