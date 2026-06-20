# Zero Salary Accepted

## Severity
Critical

## Module
Employees

## Steps to Reproduce

1. Login as Super Root.
2. Go to Employees → Add Employee.
3. Enter salary = 0.
4. Fill remaining fields.
5. Submit.

## Expected Result

Salary should be greater than zero.

## Actual Result

Employee is created successfully.

## Impact

Incorrect payroll calculations and invalid employee records.