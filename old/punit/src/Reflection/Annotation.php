<?php
namespace Punit\Reflection;

class Annotation
{
	private $name;
	private $args;

	public function __construct ($name, array $args)
	{
		$this->name = $name;
		$this->args = $args;
	}

	public function getName (): string
	{
		return $this->name;
	}

	public function getArgs (): array
	{
		return $this->args;
	}
}