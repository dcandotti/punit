<?php
function testThisIsAlsoATestFunctionIsAPunyTestByAnnotation ()
{
	new \Punit\PunyTestByAnnotation(new \Punit\Reflection\ReflectionFunction("thisIsAlsoATest"));
	return true;
}

/**
 * @test
 */
function thisIsAlsoATest ()
{
	return true;
}