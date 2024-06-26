<?php

namespace Yceruto\BehatExtension\Extension;

use Behat\Behat\Tester\ServiceContainer\TesterExtension;
use Behat\Testwork\Call\ServiceContainer\CallExtension;
use Behat\Testwork\ServiceContainer\Extension;
use Behat\Testwork\ServiceContainer\ExtensionManager;
use Symfony\Component\Config\Definition\Builder\ArrayNodeDefinition;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Definition;
use Symfony\Component\DependencyInjection\Reference;
use Yceruto\BehatExtension\Result\Filter\ExceptionResultFilter;
use Yceruto\BehatExtension\Tester\ExceptionScenarioTester;

class ExceptionExtension implements Extension
{
    public function process(ContainerBuilder $container): void
    {
    }

    public function getConfigKey(): string
    {
        return 'result_filters';
    }

    public function initialize(ExtensionManager $extensionManager): void
    {
    }

    public function configure(ArrayNodeDefinition $builder): void
    {
    }

    public function load(ContainerBuilder $container, array $config): void
    {
        $container->register(ExceptionResultFilter::class)
            ->addTag(CallExtension::RESULT_FILTER_TAG);

        $definition = new Definition(ExceptionScenarioTester::class, [
            new Reference(TesterExtension::SCENARIO_TESTER_ID),
        ]);
        $definition->addTag(TesterExtension::SCENARIO_TESTER_WRAPPER_TAG, array('priority' => 9999));
        $container->setDefinition(TesterExtension::SCENARIO_TESTER_WRAPPER_TAG.'.exception_reset', $definition);
    }
}
