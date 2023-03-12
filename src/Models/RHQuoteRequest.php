<?php
namespace App\Models;
// generated from /resources/views/vendor/survloop/admin/db/export-laravel-model-gen.blade.php

use Illuminate\Database\Eloquent\Model;

class RHQuoteRequest extends Model
{
    protected $table      = 'rh_quote_request';
    protected $primaryKey = 'qr_id';
    public $timestamps    = true;
    protected $fillable   =
    [
        'qr_email',
        'qr_name',
        'qr_user_id',
        'qr_submission_progress',
        'qr_tree_version',
        'qr_version_ab',
        'qr_unique_str',
        'qr_ip_addy',
        'qr_is_mobile',
        'qr_body',
        'qr_want_private_cloud',
        'qr_want_custom_software',
        'qr_other_software',
        'qr_user_cnt',
        'qr_already_have_software',
        'qr_describe_software',
        'qr_phone',
        'qr_submitted',
        'qr_website',
        'qr_use_freq_desktops',
        'qr_use_freq_tablets',
        'qr_use_freq_phones',
        'qr_date_replied',
        'qr_notes',
    ];

    // END Survloop auto-generated portion of Model

}