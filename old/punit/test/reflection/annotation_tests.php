<?php
function testAnnotationShouldHaveNameTest ()
{
	$annotation = (new \Punit\Reflection\Metadata(<<<DOCCOMMENT
/**
 * @test
 */
DOCCOMMENT
	))->getAnnotations("test")[0];
	return $annotation->getName() === "test";
}

function testAnnotationShouldHaveStringAsdAsFirstArgument ()
{
	$annotation = (new \Punit\Reflection\Metadata(<<<DOCCOMMENT
/**
 * @test("asd")
 */
DOCCOMMENT
	))->getAnnotations("test")[0];
	return $annotation->getArgs()[0] === "asd";
}

function testAnnotationShouldHaveIntegerOneAsFirstArgument ()
{
	$annotation = (new \Punit\Reflection\Metadata(<<<DOCCOMMENT
/**
 * @test(1)
 */
DOCCOMMENT
	))->getAnnotations("test")[0];
	return $annotation->getArgs()[0] === 1;
}

function testAnnotationShouldHaveBooleanTrueAsFirstArgument ()
{
	$annotation = (new \Punit\Reflection\Metadata(<<<DOCCOMMENT
/**
 * @test(true)
 */
DOCCOMMENT
	))->getAnnotations("test")[0];
	return $annotation->getArgs()[0] === true;
}

function testAnnotationShouldHaveBooleanFalseAsFirstArgument ()
{
	$annotation = (new \Punit\Reflection\Metadata(<<<DOCCOMMENT
/**
 * @test(false)
 */
DOCCOMMENT
	))->getAnnotations("test")[0];
	return $annotation->getArgs()[0] === false;
}

function testAnnotationShouldHaveAnArrayAsFirstArgument ()
{
	$annotation = (new \Punit\Reflection\Metadata(<<<DOCCOMMENT
/**
 * @test([])
 */
DOCCOMMENT
	))->getAnnotations("test")[0];
	return is_array($annotation->getArgs()[0]);
}

function testAnnotationShouldHaveAnEmptyArrayAsFirstArgument ()
{
	$annotation = (new \Punit\Reflection\Metadata(<<<DOCCOMMENT
/**
 * @test([])
 */
DOCCOMMENT
	))->getAnnotations("test")[0];
	return count($annotation->getArgs()[0]) === 0;
}

function testAnnotationShouldHaveAThreeElementArrayAsFirstArgument ()
{
	$annotation = (new \Punit\Reflection\Metadata(<<<DOCCOMMENT
/**
 * @test(['a', 1, true])
 */
DOCCOMMENT
	))->getAnnotations("test")[0];
	return count($annotation->getArgs()[0]) === 3;
}

function testAnnotationShouldMatchAllArguments ()
{
	$args = (new \Punit\Reflection\Metadata(<<<DOCCOMMENT
/**
 * @test('a', 1, true, false, [])
 */
DOCCOMMENT
	))->getAnnotations("test")[0]->getArgs();
	return $args[0] === 'a'
		&& $args[1] === 1
		&& $args[2] === true
		&& $args[3] === false
		&& is_array($args[4])
		&& count($args[4]) === 0
	;
}