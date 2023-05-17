<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int id
 * @property string service_name
 * @property string work_scope
 * @property float stake
 * @property string unit_si
 * @property integer quantity
 * @property float price
 * @property string notes
 */
class Work extends Model
{
    use HasFactory;
    protected $guarded = [];
}
