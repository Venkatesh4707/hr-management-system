# Application Exposes Stack Trace

## Severity
High

## Module
Employee Creation

## Steps to Reproduce

1. Create employee.
2. Trigger email sending.
3. Mailpit connection fails.

## Expected Result

User should see friendly error message.

## Actual Result

Complete Laravel stack trace is displayed.

## Impact

Sensitive server information is exposed.
