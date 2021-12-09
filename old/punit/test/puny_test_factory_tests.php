<?php
function testPunyTestFactoryShouldReturnAPunyTestByFunctionNameInstance ()
{
	return \Punit\PunyTestFactory::create(new Punit\Reflection\ReflectionFunction("testThisTestShouldPass")) instanceof \Punit\PunyTestByFunctionName;
}

function testPunyTestFactoryShouldReturnAPunyTestByAnnotationInstance ()
{
	return \Punit\PunyTestFactory::create(new Punit\Reflection\ReflectionFunction("thisIsAlsoATest")) instanceof \Punit\PunyTestByAnnotation;
}

function testPunyTestFactoryShouldReturnAPunyTestByMultiAnnotationInstance ()
{
	return \Punit\PunyTestFactory::create(new Punit\Reflection\ReflectionFunction("thisIsAMultiTest")) instanceof \Punit\PunyTestByMultiAnnotation;
}

function testPunyTestFactoryShouldReturnANullPunyTestInstance ()
{
	return \Punit\PunyTestFactory::create(new Punit\Reflection\ReflectionFunction("thisIsNotATest")) instanceof \Punit\NullPunyTest;
}