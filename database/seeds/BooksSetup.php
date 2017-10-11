<?php

use Illuminate\Database\Seeder;

/**
 * Populate tables with app data
 *
 * @package   Api
 * @version   0.1
 * @since     2017-10-11
 * @author    Barnaby Norman <mail@barnaby.norman@gmail.com>
 */
class BooksSetup extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('authors')->insert([
          'name' => 'Robin Nixon'
        ]);

        DB::table('authors')->insert([
          'name' => 'Christopher Negus'
        ]);

        DB::table('authors')->insert([
          'name' => 'Douglas Crockford'
        ]);

        DB::table('categories')->insert([
          'name' => 'PHP'
        ]);

        DB::table('categories')->insert([
          'name' => 'Javascript'
        ]);

        DB::table('categories')->insert([
          'name' => 'Linux'
        ]);

        DB::table('currencies')->insert([
          'name' => 'GBP'
        ]);

        DB::table('books')->insert([
          'isbn' => '978-1491918661',
          'title' => 'Learning PHP, MySQL & JavaScript: With jQuery, CSS & HTML5',
          'author_id' => 1,
          'price' => 9.99,
          'currency_id' => 1,
        ]);

        DB::table('books')->insert([
          'isbn' => '978-0596804848',
          'title' => 'Ubuntu: Up and Running: A Power User\'s Desktop Guide',
          'author_id' => 1,
          'price' => 12.99,
          'currency_id' => 1,
        ]);

        DB::table('books')->insert([
          'isbn' => '978-1118999875',
          'title' => 'Linux Bible',
          'author_id' => 2,
          'price' => 19.99,
          'currency_id' => 1,
        ]);

        DB::table('books')->insert([
          'isbn' => '978-0596517748',
          'title' => 'JavaScript: The Good Parts',
          'author_id' => 3,
          'price' => 8.99,
          'currency_id' => 1,
        ]);

        DB::table('book_category')->insert([
          'book_id' => 1,
          'category_id' => 1,
        ]);

        DB::table('book_category')->insert([
          'book_id' => 1,
          'category_id' => 2,
        ]);

        DB::table('book_category')->insert([
          'book_id' => 2,
          'category_id' => 3,
        ]);

        DB::table('book_category')->insert([
          'book_id' => 3,
          'category_id' => 3,
        ]);

        DB::table('book_category')->insert([
          'book_id' => 4,
          'category_id' => 2,
        ]);
    }
}
