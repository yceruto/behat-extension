<?php

namespace Yceruto\BehatExtension\Tester;

use Behat\Behat\Tester\ScenarioTester;
use Behat\Gherkin\Node\FeatureNode;
use Behat\Gherkin\Node\ScenarioInterface as Scenario;
use Behat\Testwork\Environment\Environment;
use Behat\Testwork\Tester\Result\TestResult;
use Behat\Testwork\Tester\Setup\Setup;
use Behat\Testwork\Tester\Setup\Teardown;
use Yceruto\BehatExtension\Model\ExceptionAssertionState;

final class ExceptionScenarioTester implements ScenarioTester
{
    public function __construct(private ScenarioTester $baseTester)
    {
    }

    public function setUp(Environment $env, FeatureNode $feature, Scenario $scenario, $skip): Setup
    {
        ExceptionAssertionState::setUp($scenario);

        return $this->baseTester->setUp($env, $feature, $scenario, $skip);
    }

    public function test(Environment $env, FeatureNode $feature, Scenario $scenario, $skip): TestResult
    {
        return $this->baseTester->test($env, $feature, $scenario, $skip);
    }

    public function tearDown(Environment $env, FeatureNode $feature, Scenario $scenario, $skip, TestResult $result): Teardown
    {
        ExceptionAssertionState::tearDown($scenario);

        return $this->baseTester->tearDown($env, $feature, $scenario, $skip, $result);
    }
}
