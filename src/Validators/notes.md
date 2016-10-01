

$this -> validator() -> integer($value) -> min(3) -> max(4) -> validate();


$validator -> integer(45) -> range(2, 5) -> validate();




Validator

	type setters
		integer
		string
		float

	constrains setters
		min
		max
		range
		...

