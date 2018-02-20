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

##### instantiating input components

```
echo Form::text()

echo Form::email()

echo Form::password()

echo Form::number()

echo Form::textarea()

echo Form::select()

echo Form::date()

echo Form::submit()
```

##### Default properties and methods

- setting input name
```
Form::text()->name('test')
```

- setting input value
```
Form::text()->value($model->title)
```

- setting input placeholder
```
Form::text()->placeholder('Your email...')
```

- setting input class
```
Form::text()->class('form-control custom-class')
or
Form::text()->class('form-control')->class('custom-class')
```

- setting input id
```
Form::text()->id('some-id')
/*
since most inputs only have one id you cannot add another id by nesting the methods
because it'll be overriden but you can add spaces between ids in the method if you want
*/
Form::text()->id('id1 id2')
```

- setting input as required
```
Form::text()->required()
```

##### Input labels

you can add a label to the input by nesting the `label()` method

```
Form::text()->label('label title')
```

you can add classes for your label by passing them as a second string argument and separate them with space

```
Form::text()->label('label title', 'class1 class2')
```

##### Input specific methods

- number

the number input has two special methods `min()` and `max()`
```
Form::number()->name('age')->min(18)->max(60)
```

- select

the select input has `options()` method
```
Form::select()->name('users')->options(['Dennis Ritchie' => 1, 'Bill Gates' => 2, 'Steve Jobs' => 3])
```

## Author
This package made by [Muhammad Hamdi](http://facebook.com/neutrino3)

## Contributing

Contributions, questions and comments are all welcome and encouraged. For code contributions submit a pull request with unit test.