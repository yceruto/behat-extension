<?php

namespace Yceruto\BehatExtension\Model;

use Behat\Gherkin\Node\ScenarioInterface as Scenario;
use Yceruto\BehatExtension\Exception\InnerResultException;

/**
 * @internal
 */
final class ExceptionAssertionState
{
    public static bool $catchErrors = false;
    public static bool $assertionExecuted = false;
    public static ?\Exception $lastError = null;

    public static function setUp(Scenario $scenario): void
    {
        self::$catchErrors = str_contains((string) $scenario->getTitle(), '(!)');
        self::$assertionExecuted = false;
    }

    public static function tearDown(Scenario $scenario): void
    {
        if (self::$catchErrors) {
            if (null === self::$lastError) {
                throw new InnerResultException('No exception was thrown. Remove "(!)" from the scenario title to disable the exception catching.');
            }

            if (!self::$assertionExecuted) {
                throw new InnerResultException('An exception was caught, but no assertion was executed.');
            }
        }

        self::$catchErrors = false;
        self::$lastError = null;
    }

    public static function getLastError(): \Exception
    {
        self::$assertionExecuted = true;

        if (!self::$catchErrors) {
            throw new InnerResultException('The exception catching is disabled for this scenario. Enable it by adding "(!)" to the scenario title.');
        }

        if (null === self::$lastError) {
            self::$catchErrors = false;

            throw new InnerResultException('No exception was thrown.');
        }

        return self::$lastError;
    }
}
