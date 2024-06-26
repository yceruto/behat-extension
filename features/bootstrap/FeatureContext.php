<?php

use Behat\Behat\Context\Context;
use Yceruto\BehatExtension\Context\ExceptionAssertionTrait;

class FeatureContext implements Context
{
    use ExceptionAssertionTrait;

    /**
     * @Given I set an invalid date :date
     */
    public function iSetAnInvalidDate(string $date): void
    {
        new DateTime($date);
    }
}
