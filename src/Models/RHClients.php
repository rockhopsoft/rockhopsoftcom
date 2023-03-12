<?php
namespace App\Models;
// generated from /resources/views/vendor/survloop/admin/db/export-laravel-model-gen.blade.php

use Illuminate\Database\Eloquent\Model;

class RHClients extends Model
{
    protected $table      = 'rh_clients';
    protected $primaryKey = 'cli_id';
    public $timestamps    = true;
    protected $fillable   =
    [
        'cli_user_id',
        'cli_submission_progress',
        'cli_tree_version',
        'cli_version_ab',
        'cli_unique_str',
        'cli_ip_addy',
        'cli_is_mobile',
        'cli_name',
        'cli_website',
        'cli_email',
        'cli_phone',
        'cli_invoice_day_of_month',
        'cli_notes',
    ];

    // END Survloop auto-generated portion of Model

}