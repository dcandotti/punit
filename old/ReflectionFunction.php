<?php
namespace punit;

class ReflectionFunction
	extends \ReflectionFunction
{
	public function getAnnotation ($annotationClass): Annotation;
	public function getAnnotations (): Annotation[];

	public function isAnnotationPresent ($annotationClass): bool;

	public function getDeclaredAnnotation ($annotationClass): Annotation;
	public function getDeclaredAnnotations (): Annotation[];
}