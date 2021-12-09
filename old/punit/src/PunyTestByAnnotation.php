<?php
namespace Punit;

class PunyTestByAnnotation
	implements PunyTest
{
	private $ref_func;

	public function __construct (Reflection\ReflectionFunction $ref_func)
	{
		if (!$ref_func->hasAnnotation("test") || $ref_func->getNumberOfParameters() > 0) throw new InvalidTestFunction();
		$this->ref_func = $ref_func;
	}

	public function run (Output $output): void
	{
		$output->printName(ucfirst($this->ref_func->getName()));

		try
		{
			$result = $this->ref_func->invoke();

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