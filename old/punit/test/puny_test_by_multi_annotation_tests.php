<?php
function testThisIsAlsoATestFunctionIsAPunyTestByMultiAnnotation ()
{
	new \Punit\PunyTestByMultiAnnotation(new \Punit\Reflection\ReflectionFunction("thisIsAMultiTest"));
	return true;
}

/**
 * @test
 * @testWith("failed with a message")
 * @testWith(new Exception("failed with exception"))
 * @testWith(true)
 */
function thisIsAMultiTest ($arg)
{
	return $arg;
}