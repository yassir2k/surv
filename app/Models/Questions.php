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
        'name_',
        'profession_',
        'accreditation_',
        'date_',
        'service_delivery1',
        'service_delivery2',
        'quality_',
        'timeliness1',
        'timeliness2',
        'others',
        'timeliness3',
        'timeliness4',
        'online_environment1',
        'online_environment2',
        'online_environment3',
        'online_environment4',
        'challenges_',
        'changes_',
        'control_hash',
        'is_read',
        'read_by',
        'date_read'
    ];
}
