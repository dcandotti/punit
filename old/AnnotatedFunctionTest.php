<?php
namespace punit;

class AnnotatedFunctionTest
{
	private $func;

	public function __construct (ReflectionFunction $func)
	{
		$this->func = $func;
	}

	public function getName (): Text
	{
		return new Capitalized(
			new NormalCase(
				new DefaultText($this->func->getShortName())
			)
		);
	}

	public function test (): void
	{
		$result = null;
		$value = $this->func->invoke();

		if (is_bool($value))
		{
			if ($value)
				$result = new Green(new DefaultText('PASSED'));
			else
				$result = new Red(new DefaultText('FAILED'));
		}
		else
			$result = new Red(new DefaultText('FAILED'));

		echo new EndOfLine(
			new Joined(
				$this->getName(),
				new DefaultText(': '),
				$result
			)
		);
	}
}