<?php
namespace Punit;

class PunyTestByMultiAnnotation
	implements PunyTest
{
	private $ref_func;

	public function __construct (Reflection\ReflectionFunction $ref_func)
	{
		if (!$ref_func->hasAnnotation("test") || !$ref_func->hasAnnotation("testWith") || $ref_func->getNumberOfParameters() == 0) throw new InvalidTestFunction();
		$this->ref_func = $ref_func;
	}

	public function run (Output $output): void
	{
		$i = 1;
		foreach ($this->ref_func->getAnnotations("testWith") as $annotation)
		{
			$this->runWith($output, $i, $annotation->getArgs());
			$i++;
		}
	}

	private function runWith (Output $output, int $i, array $args): void
	{
		$output->printName(ucfirst($this->ref_func->getName()) . "({$i})");

		try
		{
			$result = $this->ref_func->invokeArgs($args);

			if (is_bool($result))
			{
				if ($result)
				{
					$output->printPassed();
				}
				else
				{
					$output->printFailed();
				}
			}
			else if (is_string($result))
			{
				$output->printFailedWithMessage($result);
			}
			else
			{
				$output->printFailed();
			}
		}
		catch (\Exception $ex)
		{
			$output->printFailedWithException($ex);
		}
	}
}