<?php
namespace Punit;

class PunyTestFactory
{
	public static function create (Reflection\ReflectionFunction $ref_func): PunyTest
	{
		try
		{
			return new PunyTestByFunctionName($ref_func);
		}
		catch (InvalidTestFunction $ex)
		{
			try
			{
				return new PunyTestByAnnotation($ref_func);
			}
			catch (InvalidTestFunction $ex)
			{
				try
				{
					return new PunyTestByMultiAnnotation($ref_func);
				}
				catch (InvalidTestFunction $ex)
				{
					return new NullPunyTest();
				}
			}
		}
	}
}