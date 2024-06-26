# Behat Extension

Set of [Behat](https://github.com/Behat/Behat) extensions to write better Behat tests.

## Exception Extension

This extension provides a way to catch exceptions thrown by your behaviors and check them in your tests.

### Installation

```bash
composer require --dev yceruto/behat-extension
```

### Configuration

Enable the extension in your `behat.yml`:

```yaml
default:
    extensions:
        Yceruto\BehatExtension\Extension\ExceptionExtension: ~
```

### Usage

Once the extension is enabled, you can use the `(!)` mark in any scenario title to indicate 
that all exceptions thrown in this scenario must be caught. By using some predefined Behat 
steps included in this package, you can then check the exception class and message.

Example:

```gherkin
Feature: Date parsing

  Scenario: Expected error on invalid date (!)
    Given I set an invalid date "0-2024"
    Then an exception should be thrown containing message "Failed to parse time string (0-2024)"
```

> [!NOTE]
> Note that the `(!)` mark is mandatory to catch exceptions. If you don't use it, the exception 
> will be thrown as usual.

These predefined steps can be found in the `ExceptionAssertionTrait`, which are activated 
once you add it to your Behat context class. Alternatively, you can create custom Behat 
steps and use the `ExceptionAssertion` class directly.

This is a sample of the `FeatureContext` class that implements the previous feature:

```php
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
```

## License

This software is published under the [MIT License](LICENSE)
