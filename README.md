
[![Build Status](https://travis-ci.org/RickyNRoses87/validators.svg?branch=master)](https://travis-ci.org/RickyNRoses87/validators)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/RickyNRoses87/validators/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/RickyNRoses87/validators/?branch=master)
[![SensioLabsInsight](https://insight.sensiolabs.com/projects/7353a113-94d6-4f96-a171-e7e6eb9fed99/mini.png)](https://insight.sensiolabs.com/projects/7353a113-94d6-4f96-a171-e7e6eb9fed99)

# Installation

Through composer:
```
composer require almendra/validators
```

# How to use it


* 1. Stand alone 

```
$validator = new Validator(); 
$result = $validator 
	-> integer(10)
	-> min(3)
	-> max(20)
	-> validate();
```


* 2. Within a controller

```
# SomeController extends Http\Controller or implements Http\Interfaces\ControllerInterface
$controller = new SomeController; 
$controller -> validate(function($request, $validator) {
	$result = $validator 
	-> string($request -> get('name'))
	-> min(3)
	-> max(20)
	-> validate();

	return $result;
});
```

It can also be used with a type homogeneus array:
```
$validator = new Validator(); 
$result = $validator 
	-> string($request -> all())
	-> range(1, 255)
	-> validate();
```


## Support

Currently, the validator supports the following types:
	integer, string, double, float, file

