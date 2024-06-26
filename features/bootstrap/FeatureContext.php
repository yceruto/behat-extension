<?php

use Behat\Behat\Context\Context;
use Yceruto\BehatExtension\Context\ExceptionAssertionTrait;

class FeatureContext implements Context
{
    use ExceptionAssertionTrait;

    /**
     * @Given /^I set an invalid date "([^"]*)"$/
     */
    public function iSetAnInvalidDate(string $date): void
    {
        new DateTime($date);
    }

    /**
     * @Given /^I throw an exception with "([^"]*)"$/
     */
    public function iThrowAnExceptionWith(string $message): void
    {
        throw new \Exception($message);
    }

    /**
     * @Given /^I throw a logic exception with message "([^"]*)"$/
     */
    public function iThrowALogicExceptionWithMessage(string $message): void
    {
        throw new \LogicException($message);
    }
}
