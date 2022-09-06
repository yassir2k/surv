<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Questions extends Model
{
    use HasFactory;
    protected $table = 'tbl_feedback';
    protected $primaryKey = 'id';
    public $timestamps  = false;
    protected $fillable = [
        'accreditation_',
        'profession_',
        'gender_',
        'date_',
        'service_delivery1',
        'service_delivery2',
        'quality_',
        'timelines1',
        'timelines2',
        'others',
        'timelines3',
        'timelines4',
        'online_environment1',
        'online_environment2',
        'online_environment3',
        'online_environment4',
        'challenges_',
        'others_',
        'is_read',
        'read_by',
        'date_read',
        'control_hash',
        'name',
        'company_name',
        'email',
        'phone'
    ];
}
