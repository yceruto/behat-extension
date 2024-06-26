Feature: Exception extension

  Scenario: Expected error on invalid date (!)
    Given I set an invalid date "0-2024"
    Then an error should be thrown with message "Failed to parse time string (0-2024) at position 0 (0): Unexpected character"

  Scenario: Multiple expected errors (!)
    Given I set an invalid date "31-2024"
    Then an error should be thrown with message "Failed to parse time string (31-2024) at position 0 (3): Unexpected character"
    Given I set an invalid date "100-01-2024"
    Then an error should be thrown with message "Failed to parse time string (100-01-2024) at position 9 (2): Unexpected character"
