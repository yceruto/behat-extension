<?php

namespace Yceruto\BehatExtension\Context;

use Behat\Step\Then;
use Yceruto\BehatExtension\Assertion\ExceptionAssertion;

trait ExceptionAssertionTrait
{
    /**
     * @Then /^an? "([^"]*)" exception should be thrown$/
     */
    public function aClassExceptionShouldBeThrown(string $expected): void
    {
        ExceptionAssertion::assertExceptionClass($expected);
    }

    /**
     * @Then /^an? "([^"]*)" exception should be thrown with message "((?:[^"]|\\")*)"$/
     */
    public function aClassExceptionShouldBeThrownWithMessage(string $class, string $message): void
    {
        ExceptionAssertion::assertExceptionClass($class);
        ExceptionAssertion::assertExceptionMessage($message);
    }

    /**
     * @Then /^an exception should be thrown with message "((?:[^"]|\\")*)"$/
     */
    public function anExceptionShouldBeThrownWithMessage(string $expected): void
    {
        ExceptionAssertion::assertExceptionMessage($expected);
    }

    /**
     * @Then /^an exception should be thrown containing message "((?:[^"]|\\")*)"$/
     */
    public function anExceptionShouldBeThrownContainingMessage(string $expected): void
    {
        ExceptionAssertion::assertExceptionMessageContains($expected);
    }

    /**
     * @Then /^an? "([^"]*)" exception should be thrown containing message "((?:[^"]|\\")*)"$/
     */
    public function aClassExceptionShouldBeThrownContainingMessage(string $class, string $expected): void
    {
        var_dump($expected);
        ExceptionAssertion::assertExceptionClass($class);
        ExceptionAssertion::assertExceptionMessageContains($expected);
    }

    /**
     * @Then /^an exception should be thrown matching pattern "([^"]*)"$/
     */
    public function anExceptionShouldBeThrownMatchingPattern(string $pattern): void
    {
        ExceptionAssertion::assertExceptionMessageMatchesPattern($pattern);
    }

    /**
     * @Then /^an? "([^"]*)" exception should be thrown matching pattern "([^"]*)"$/
     */
    public function aClassExceptionShouldBeThrownMatchingPattern(string $class, string $pattern): void
    {
        ExceptionAssertion::assertExceptionClass($class);
        ExceptionAssertion::assertExceptionMessageMatchesPattern($pattern);
    }
}
