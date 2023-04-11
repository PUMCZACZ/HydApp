<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int id
 * @property string name
 * @property string lastname
 * @property string phone_number
 */
class Client extends Model
{
    protected $guarded = [];

    use HasFactory;
}