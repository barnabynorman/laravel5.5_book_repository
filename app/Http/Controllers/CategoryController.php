<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Http\Resources\Category as CategoryResource;

/**
 * Category Controller
 *
 * @package   Api
 * @version   0.1
 * @since     2017-10-11
 * @author    Barnaby Norman <mail@barnaby.norman@gmail.com>
 */
class CategoryController extends Controller
{
    /**
      * Create list of categories and return as JSON string
      *
      * @param  \Illuminate\Http\Request  $request
      * @return \Illuminate\Http\Response
      */
    public function index()
    {
        $categories = [];

        Category::all()->each(function ($item, $key) use (&$categories) {
            $categories[] = $item->name;
        });

        return ['catagories' => $categories];
    }
}
