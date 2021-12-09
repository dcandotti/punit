<?php
function testMetadataShouldDetectTestAnnotation ()
{
	return (new \Punit\Reflection\Metadata(<<<DOCCOMMENT
/**
 * @test
 */
DOCCOMMENT
	))->hasAnnotation("test");
}

function testMetadataShouldDetectTestWithAnnotation ()
{
	return (new \Punit\Reflection\Metadata(<<<DOCCOMMENT
/**
 * @test
 * @testWith
 */
DOCCOMMENT
	))->hasAnnotation("testWith");
}

function testMetadataShouldDetectTestWithAnnotationWithoutArguments ()
{
	return (new \Punit\Reflection\Metadata(<<<DOCCOMMENT
/**
 * @test
 * @testWith()
 */
DOCCOMMENT
	))->hasAnnotation("testWith");
}

function testMetadataShouldDetectTestWithAnnotationWithArguments ()
{
	return (new \Punit\Reflection\Metadata(<<<DOCCOMMENT
/**
 * @test
 * @testWith('asd', 123, true, [])
 */
DOCCOMMENT
	))->hasAnnotation("testWith");
}

function testMetadataShouldDetectFourTestWithAnnotations ()
{
	return count((new \Punit\Reflection\Metadata(<<<DOCCOMMENT
/**
 * @test
 * @testWith('asd')
 * @testWith(123)
 * @testWith(true)
 * @testWith(['asd', 123, true])
 */
DOCCOMMENT
	))->getAnnotations("testWith")) == 4;
}