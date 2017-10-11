How to install my code
----------------------

I developed the proof of concept on OS X. It will run on any machines that are
capable of running Laravel 5.5
You need to ensure that you have composer installed and a web server: apache or
nginx for example, however I have not tested on MAMP / WAMP or IIS (I tested
using valet, which uses nginx).

1 - place the files in an empty folder
2 - run: composer install
3 - If using sqlite run : touch database/database.sqlite (otherwise configure
mysql as required)
4 - run: php artisan migrate to create the table structure
5 - run: php artisan db:seed to populate the database

How to run my code
------------------

The majority of tests may be entered into the browser as get requests, however,
the responses are in JSON and repeating these tests will have no effect on
the data.

These urls are:
{hostname}/api/books
{hostname}/api/books/1
{hostname}/api/books/?author=Christopher%20Negus
{hostname}/api/books/?category=Linux
{hostname}/api/books/?author=Robin%20Nixon&category=Linux
{hostname}/api/categories

To test creating a new book in the system, post data to the following url:

{hostname}/api/books/store

I have tested posting a form from a browser, but it should be noted that the
request will be rejected unless you include a csrf_field.

A sample (pre-filled) form is included here for testing:

<form action="/api/books/store" method="post">
  {{ csrf_field() }}
  <input name="isbn" type="text" value="978-INVALID-ISBN-1491905012">
  <input name="title" type="text" value="Modern PHP: New Features and Good Practices">
  <input name="author" type="text" value="Josh Lockhart">
  <input name="categories" type="text" value="PHP">
  <input name="price" type="text" value="18.99">
  <input name="currency" type="text" value="GBP">
  <input type="submit" value="go">
</form>

----
