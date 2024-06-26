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

Once the extension is enabled, you can use the `(!)` mark in your scenario title to catch 
exceptions thrown by your Behat steps. Then, you can check the exception message using the 
`Then an error should be thrown with message "..."` step:

```gherkin
Feature: Date parsing

  Scenario: Expected error on invalid date (!)
    Given I set an invalid date "0-2024"
    Then an exception should be thrown containing message "Failed to parse time string (0-2024)"
```

> [!NOTE]
> Note that the `(!)` mark is mandatory to catch exceptions. If you don't use it, the exception will be thrown as usual.

To check the exception class and message in your Behat step definition, you can use the 
`ExceptionAssertionTrait` in your Behat context class. This trait provides useful assertion 
steps to verify if the thrown exception matches a specific class or message. Alternatively, 
you can create a custom Behat step and use the `ExceptionAssertion` class directly.

This is the Context class that implements the previous feature:

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
