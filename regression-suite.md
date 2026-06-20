# Regression Suite for Critical Data Flow

## Objective

Protect the Employee → Salary → Payroll pipeline and prevent previously fixed defects from reappearing.

---

# Module: Employee Creation

## TC-001 Create Employee With Valid Data

### Steps

1. Login as Super Root.
2. Navigate to Employees → Add Employee.
3. Enter valid details.
4. Click Create Employee.

### Expected Result

Employee should be created successfully.

Priority: High

---

## TC-002 Duplicate Email Validation

### Input

Existing email:

[super@root.com](mailto:super@root.com)

### Expected Result

System should reject duplicate email.

Priority: High

---

## TC-003 Empty Mandatory Fields

### Steps

Leave all required fields empty.

### Expected Result

Validation messages should appear.

Priority: High

---

## TC-004 Invalid Phone Number

### Input

12345678

### Expected Result

System should reject invalid phone number.

Priority: High

---

## TC-005 Future Hire Date

### Input

01/01/2035

### Expected Result

Future dates should not be accepted.

Priority: High

---

# Module: Salary Management

## TC-006 Positive Salary

### Input

10000

### Expected Result

Employee salary should be saved correctly.

Priority: Critical

---

## TC-007 Zero Salary

### Input

0

### Expected Result

Salary must be greater than zero.

Priority: Critical

---

## TC-008 Negative Salary

### Input

-100

### Expected Result

Negative salary values should be rejected.

Priority: Critical

---

## TC-009 Extremely Large Salary

### Input

999999999999

### Expected Result

System should validate maximum salary limit.

Priority: Medium

---

# Module: Payroll

## TC-010 Payroll Generation

### Steps

1. Create employee.
2. Assign salary.
3. Generate payroll.

### Expected Result

Payslip should contain correct salary.

Priority: Critical

---

## TC-011 Salary Update Propagation

### Steps

1. Employee salary = 10000.
2. Update salary to 15000.
3. Generate payroll.

### Expected Result

Payslip should contain updated salary.

Priority: Critical

---

## TC-012 Multiple Salary Updates

### Steps

1. Change salary to 12000.
2. Change again to 15000.
3. Generate payroll.

### Expected Result

Latest salary should be reflected.

Priority: High

---

## TC-013 Employee Without Salary

### Steps

Create employee without salary.

### Expected Result

Payroll generation should be blocked.

Priority: High

---

# Module: Email Notifications

## TC-014 Mail Service Failure

### Steps

Disable Mailpit.

Create employee.

### Expected Result

Employee should still be created.

Email can be retried later.

### Actual Bug Found

Application crashes.

Priority: High

---

# Module: Security

## TC-015 Stack Trace Exposure

### Steps

Trigger server error.

### Expected Result

Friendly error page should appear.

### Actual Bug Found

Laravel stack trace exposed.

Priority: High

---

# Module: Currency

## TC-016 Currency List Validation

### Expected Result

Supported currencies should be available.

INR should be present for Indian deployments.

Priority: Medium

---

# Module: Authentication

## TC-017 Logout Protection

### Steps

1. Logout.
2. Press browser Back button.

### Expected Result

User should be redirected to login page.

Priority: High

---

## TC-018 Direct URL Access

### Steps

Logout.

Access:

/employees

/payrolls

/attendance

### Expected Result

Unauthorized users should not access protected pages.

Priority: Critical

---

# Regression Scope

Critical Flow:

Employee Creation
↓
Salary Assignment
↓
Attendance
↓
Payroll Generation
↓
Payslip

Any future changes to these modules must execute this regression suite before release.

---

# Risk Areas

1. Salary propagation failures.
2. Duplicate employee creation.
3. Invalid salary values.
4. Payroll calculation errors.
5. Authentication bypass.
6. Mail service dependency failures.
7. Stack trace exposure.
8. Currency configuration issues.

---

# Execution Frequency

* Before every release.
* After salary module changes.
* After payroll changes.
* After authentication changes.
* Before production deployment.
