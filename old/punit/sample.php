<?php
function thisIsNotATest ()
{
	throw new Exception();
}

function testThisTestShouldPass ()
{
	return true;
}

function testThisTestShouldFail ()
{
	return false;
}

function testThisTestShouldFailWithAMessage ()
{
	return "some error message";
}

function testThisTestShouldFailThrowingAnException ()
{
	throw new Exception("some error message");
}

function testMetadataShouldHaveATestAnnotation ()
{
	return (new \Punit\Reflection\Metadata(<<<DOCCOMMENT
/**
 * @test
 */
DOCCOMMENT
	))->hasAnnotation("test");
}

function testThisIsAlsoATestFunctionIsATest ()
{
	return (new \Punit\Reflection\ReflectionFunction("thisIsAlsoATest"))->hasAnnotation("test");
}

function testThisIsAlsoATestFunctionIsAPunyTestByAnnotation ()
{
	new \Punit\PunyTestByAnnotation(new \Punit\Reflection\ReflectionFunction("thisIsAlsoATest"));
	return true;
}

function testPunyTestFactoryShouldReturnAPunyTestByFunctionNameInstance ()
{
	return \Punit\PunyTestFactory::create(new Punit\Reflection\ReflectionFunction("testThisTestShouldPass")) instanceof \Punit\PunyTestByFunctionName;
}

function testPunyTestFactoryShouldReturnAPunyTestByAnnotationInstance ()
{
	return \Punit\PunyTestFactory::create(new Punit\Reflection\ReflectionFunction("thisIsAlsoATest")) instanceof \Punit\PunyTestByAnnotation;
}

function testPunyTestFactoryShouldReturnANullPunyTestInstance ()
{
	return \Punit\PunyTestFactory::create(new Punit\Reflection\ReflectionFunction("thisIsNotATest")) instanceof \Punit\NullPunyTest;
}

/**
 * @test
 */
function thisIsAlsoATest ()
{
	return true;
}