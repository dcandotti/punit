<?php
namespace punit\collection;

/**
 * @SEE: Alternative names:
 * 	TestAnnotationFilter,
 * 	AnnotationTestFilter,
 * 	IncludesTestAnnotation,
 * 	HasTestAnnotation,
 * 	TestAnnotated
 */
class FunctionTestFilter
	extends FilterIterator
{
	protected function filter ($reflectionFunction, $key): bool
	{
		$docComment = $reflectionFunction->getDocComment();
		if (!$docComment) return false;

		foreach (array_slice(explode("\n", $docComment), 1, -1) as $docLine)
		{
			$docLine = trim(substr(trim($docLine), 2));
			if (!empty($docLine) && $docLine == '@test') return true;
		}

		return false;
	}
}