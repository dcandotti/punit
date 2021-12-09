<?php
namespace punit\collection;
use punit\FunctionTest;

class FunctionTestMap
	extends MapIterator
{
	protected function map ($reflectionFunction)
	{
		return new FunctionTest($reflectionFunction);
	}
}