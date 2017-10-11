<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Eloquent model used to represent Currencies in the system
 *
 * @package   Api
 * @version   0.1
 * @since     2017-10-11
 * @author    Barnaby Norman <mail@barnaby.norman@gmail.com>
 */
class Currency extends Model
{
    protected $fillable = ['name'];
}
