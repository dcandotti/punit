<?php
namespace Punit;

class PunyTestByFunctionName
	implements PunyTest
{
	private $ref_func;

	public function __construct (\ReflectionFunction $ref_func)
	{
		if (strpos($ref_func->getName(), "test") !== 0 || $ref_func->getNumberOfParameters() !== 0) throw new InvalidTestFunction();
		$this->ref_func = $ref_func;
	}

	public function run (Output $output): void
	{
		$output->printName(substr($this->ref_func->getName(), 4));

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