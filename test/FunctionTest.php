<?php
use punit\FunctionTest;
use ReflectionFunction;
//use punit\Reporter;

/**
 * @test
 */
function whenInstantiatedWithAFunctionWithATestAnnotationShouldNotThrowException ()
{
	/**
	 * @test
	 */
	function helloTestWithAnnotation () {
		return true;
	}

	try
	{
		new FunctionTest(new ReflectionFunction("helloTestWithAnnotation"));
		return true;
	}
	catch (Exception $e)
	{
		return false;
	}
}

/**
 * @test
 */
function aTestNameShouldBeTheFunctionsNameInNormalCaseAndCapitalized ()
{
	return (new FunctionTest(new ReflectionFunction("whenInstantiatedWithAFunctionWithATestAnnotationShouldNotThrowException")))->getName() == "When instantiated with a function with a test annotation should not throw exception";
}

/**
 * @test
 * @assertException(FunctionIsNotATest::class)
 */
function whenInstantiatedWithAFunctionWithoutATestAnnotationShouldThrowException ()
{
	function helloTestWithoutAnnotation () {
		return true;
	}

	try
	{
		new FunctionTest(new ReflectionFunction("helloTestWithoutAnnotation"));
		return false;
	}
	catch (FunctionIsNotATest $e)
	{
		return true;
	}
}

/**
 * @test
 *
function aTestThatReturnsTrueShouldPassed ()
{
	/**
	 * @test
	 *
	function returnsTrue () {
		return true;
	}

	$reporter = mock(Reporter::class);
	$test = new AnnotatedFunctionTest(new ReflectionFunction("returnsTrue"));
	$test->test($reporter);

	return $reporter->passed->shouldHaveBeenInvokedOnceWith($test);
}
*/