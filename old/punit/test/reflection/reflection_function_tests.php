<?php
function testThisIsAlsoATestFunctionIsATest ()
{
	return (new \Punit\Reflection\ReflectionFunction("thisIsAlsoATest"))->hasAnnotation("test");
}