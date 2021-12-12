<?php
use punit\Test;
use punit\FunctionTest;
use punit\TestRunner;
use punit\Text;
use punit\Assertion;
use punit\assert\AssertSame;
use ReflectionFunction;

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

	new FunctionTest(new ReflectionFunction("helloTestWithoutAnnotation"));
	return false;
}

/**
 * @test
 */
function aFunctionTestWithAnEmptyBodyShouldBeMarkedAsIncomplete ()
{
	/**
	 * @test
	 */
	function functionTestWithEmptyBody () {}

	class MockRunner implements TestRunner {
		private $expected;
		private $actual;
		public function __construct (Test $test) {
			$this->expected = $test;
		}
		public function testPassed (Test $test): void {
			throw new Exception();
		}
		public function testFailed (Test $test): void {
			throw new Exception();
		}
		public function testFailedWithMessage (Test $test, Text $message): void {
			throw new Exception();
		}
		public function testIncomplete (Test $test): void {
			$this->actual = $test;
		}
		public function run (): void {
			throw new Exception();
		}
		public function assert (): Assertion {
			return new AssertSame($this->expected, $this->actual);
		}
	}

	$test = new FunctionTest(new ReflectionFunction("functionTestWithEmptyBody"));
	$mockRunner = new MockRunner($test);

	$test->test($mockRunner);

	return $mockRunner->assert();
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