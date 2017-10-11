<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Eloquent model used to represent Categories in the system
 *
 * @package   Api
 * @version   0.1
 * @since     2017-10-11
 * @author    Barnaby Norman <mail@barnaby.norman@gmail.com>
 */
class Category extends Model
{
    public function books()
    {
        return $this->belongsToMany('App\Book');
    }
}
