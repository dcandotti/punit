<?php
namespace Punit\Reflection;

class Metadata
{
	private $annotations;

	public function __construct ($docComment)
	{
		$this->annotations = [];

		foreach (array_slice(explode("\n", $docComment), 1, -1) as $line)
		{
			$line = substr(trim($line), 2);
			if (!empty($line) && $line[0] == '@')
			{
				$line = substr($line, 1);
				$name = $line;
				$args = [];
				if (strpos($line, '(') > 0 && substr($line, -1) == ')')
				{
					$name = substr($line, 0, strpos($line, '('));
					$args = eval('return [' . substr($line, strpos($line, '(') + 1, -1) . '];');
				}
				$this->annotations[] = new Annotation($name, $args);
			}
		}
	}

	public function hasAnnotation (string $name): bool
	{
		foreach ($this->annotations as $annotation)
		{
			if ($annotation->getName() == $name) return true;
		}

		return false;
	}

	public function getAnnotations (string $name): array
	{
		return array_filter($this->annotations, function (Annotation $annotation) use ($name) {
			return $annotation->getName() == $name;
		});
	}
}