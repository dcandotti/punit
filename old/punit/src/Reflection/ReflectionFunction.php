<?php
namespace Punit\Reflection;

class ReflectionFunction
	extends \ReflectionFunction
{
	public function __construct ($function)
	{
		parent::__construct($function);
		$this->metadata = new Metadata($this->getDocComment());
	}

	public function hasAnnotation (string $name): bool
	{
		return $this->metadata->hasAnnotation($name);
	}

	public function getAnnotations (string $name): array
	{
		return $this->metadata->getAnnotations($name);
	}
}