# Employee Creation Fails Due To Mailpit Dependency

## Severity
High

## Module
Employee Creation

## Steps to Reproduce

1. Create employee.
2. Submit.

## Expected Result

Employee should be created regardless of mail service availability.

## Actual Result

Creation fails because mailpit:1025 is unavailable.

## Impact

Users cannot create employees.
