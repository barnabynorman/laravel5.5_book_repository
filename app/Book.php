<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Eloquent model used to represent Books in the system
 *
 * @package   Api
 * @version   0.1
 * @since     2017-10-11
 * @author    Barnaby Norman <mail@barnaby.norman@gmail.com>
 */
class Book extends Model
{
    public function author()
    {
        return $this->belongsTo('App\Author');
    }

    public function categories()
    {
        return $this->belongsToMany('App\Category');
    }
}
