# Laravel Forms
>Laravel package for handling forms and form inputs

### Installation

download the package
```
composer require muhammad-hamdi/laravelforms
```

in your `config/app.php`

update you providers

```
'providers' => [
    ...
    HamdiDev\Forms\Providers\FormServiceProvider::class,
    HamdiDev\Forms\Providers\HtmlServiceProvider::class,
    ...
],
```

then add the aliases

```
'aliases' => [
    ...
    'Form' => HamdiDev\Forms\Facades\Form::class,
    'Html' => HamdiDev\Forms\Facades\Html::class
],
```

## Documentation

1- Form properties

opening a form
```
echo Form::begin();
```
the form automatically adds the csrf field when you begin it

the default form method is `POST`

#### Specifying form action & method

```
echo Form::begin($url, $method);
```

if the method isn't GET or POST the form will automatically add a hidden field with the actual method and set the form method to POST

Ex:-

```
echo Form::begin('/some/url', 'put');
echo Form::close()
```
the result will be
```
<form action="/some/url" method="POST">
    <input type="hidden" name="_token" value="csrf_token">
    <input type="hidden" name="_method" value="PUT">
</form>
```

and closing form using `Form::close()`

2- Input types

package provides the following form inputs

- text
- email
- password
- number
- textarea
- select
- date
- submit

