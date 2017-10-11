<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

/**
 * Book resource
 *
 * @package   Api
 * @version   0.1
 * @since     2017-10-11
 * @author    Barnaby Norman <mail@barnaby.norman@gmail.com>
 */
class Book extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request
     * @return array
     */
    public function toArray($request)
    {
        return [
          'isbn' => $this->isbn,
          'title' => $this->title,
          'author' => $this->author->name,
          'categories' => $this->categories()->orderBy('name')->get()->pluck('name', 'id'),
          'price' => $this->price,
      ];
    }
}
