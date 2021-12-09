<?php
namespace punit\collection;
use ReflectionFunction;

class ReflectionFunctionMap
	extends MapIterator
{
	protected function map ($functionName)
	{
		return new ReflectionFunction($functionName);
	}
}