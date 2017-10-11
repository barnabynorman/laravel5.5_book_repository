<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
use App\Author;
use App\Category;
use App\Currency;
use Validator;
use App\Http\Resources\Book as BookResource;

/**
 * Book Controller
 *
 * @package   Api
 * @version   0.1
 * @since     2017-10-11
 * @author    Barnaby Norman <mail@barnaby.norman@gmail.com>
 */
class BookController extends Controller
{
    /**
    * Create list of books and inject into BookResource to be
    * rendered and returned.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function index(Request $request)
    {
        $books = [];

        $author = $request['author'];
        $category = $request['category'];

        if ((strlen($author) > 0) || (strlen($category) > 0)) {
            $bookList = Book::where('price', '>', 0);

            if (strlen($author) > 0) {
                $authorModel = Author::where('name', $author)->first();
                $bookList->where('author_id', $authorModel->id);
            }

            if (strlen($category) > 0) {
                $categoryModel = Category::with("books")->where('name', $category)->first();
                $ids = $categoryModel->books->pluck('id')->toArray();
                $bookList->whereIn('id', $ids);
            }

            $bookList->get();
        } else {
            $bookList = Book::all();
        }

        $bookList->each(function ($item, $key) use (&$books) {
            $books[] = new BookResource($item);
        });

        return $books;
    }

    /**
    * Get instance of book by id, render and return
    *
    * @param $id   	Book id
    *
    * @return \Illuminate\Http\Response
    */
    public function show($id)
    {
        return new BookResource(Book::find($id));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'isbn' => 'required|unique:books|max:15',
            'title' => 'required',
            'author' => 'required',
            'price' => 'required|numeric',
            'categories' => 'nullable',
            'currency' => 'required',
        ]);

        if ($validator->fails()) {
            return response(['error' => 'Invalid ISBN'], 400)->header('Content-Type', 'application/json');
        }

        $data = $validator->getData();

        $author = Author::firstOrNew(['name' => $data['author']]);
        $author->save();

        $currency = Currency::firstOrNew(['name' => $data['currency']]);
        $currency->save();

        $book = new Book();
        $book->isbn = $data['isbn'];
        $book->title = $data['title'];
        $book->author_id = $author->id;
        $book->price = $data['price'];
        $book->currency_id = $currency->id;
        $book->save();

        if (strlen($data['categories'])) {
            $categoryObjects = [];
            $categories = array_map('trim', explode(',', $data['categories']));

            foreach ($categories as $newCategory) {
                $categoryObjects[] = Category::firstOrNew(['name' => $newCategory]);
            }
        }

        $book->categories()->saveMany($categoryObjects);

        return redirect('/api/books/' . $book->id);
    }
}
