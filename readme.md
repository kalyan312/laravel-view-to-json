# Laravel View To JSON
Laravel View to JSON provide json response for API data.

## Usage
Before sending request add `?response=json` to any url, you will get all the view data in JSON format.

## Why?
When you have no time to create separate API 
but you want json data from view, this package will fulfil your requirement. 

## Installation

You can install the package via composer:

``` bash
composer require khbd/laravel-view-to-json
```
The package will register itself automatically.

Then publish the package configuration file

```bash
php artisan vendor:publish --provider=Khbd\View2json\View2JsonServiceProvider
```

### Older Laravel versions
If you can't use auto-discovery, add the ServiceProvider to the providers array in `config/app.php`.
```
Khbd\View2json\View2JsonServiceProvider::class
```


## Usage
Before sending request add `?response=json` to any url, you will get all the view data in JSON format.
