<?php
namespace punit;
use ReflectionFunction;
use punit\text\Capitalized;
use punit\text\NormalCase;
use punit\text\DefaultText;

class FunctionTest
	implements Test
{
	private $reflectionFunction;

	public function __construct (ReflectionFunction $reflectionFunction)
	{
		$this->reflectionFunction = $reflectionFunction;
	}

	public function getName (): Text
	{
		return new Capitalized(
			new NormalCase(
				new DefaultText(
					$this->reflectionFunction->getShortName()
				)
			)
		);
	}

	public function test (TestRunner $runner): void
	{
		$result = $this->reflectionFunction->invoke();
		if (is_bool($result))
		{
			if ($result) $runner->testPassed($this);
			else $runner->testFailed($this);
		}
		else if ($result === null)
			$runner->testIncomplete($this);
		else
			$runner->testFailed($this, strval($result));
	}
}