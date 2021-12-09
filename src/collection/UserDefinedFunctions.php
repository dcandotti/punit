<?php
namespace punit\collection;
use ArrayIterator;

class UserDefinedFunctions
	extends IteratorWrapper
{
	public function __construct ()
	{
		parent::__construct(
			new ArrayIterator(
				get_defined_functions(true)["user"]
			)
		);
	}
}