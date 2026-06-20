# Test Strategy

## 1. Top 5 Critical Flows

1. Payroll Generation
Impact: Employees may receive incorrect salaries.

2. Employee Creation
Impact: HR cannot onboard workers.

3. Authentication
Impact: Unauthorized access to sensitive employee data.

4. Attendance Tracking
Impact: Payroll calculations become incorrect.

5. Salary Updates
Impact: Payslips may use outdated salary information.

---

## 2. Worst Consequences

### Payroll
Affected Person: Employee
Consequence: Wrong salary payment.

### Employee Creation
Affected Person: HR Team
Consequence: New employees cannot be onboarded.

### Authentication
Affected Person: Entire Organization
Consequence: Security breach.

### Attendance
Affected Person: Payroll Team
Consequence: Incorrect working hours.

### Salary Update
Affected Person: Employee
Consequence: Old salary appears on payslip.

---

## 3. Automation vs Manual Testing

Automate:

- Login
- Employee creation
- Salary update
- Payroll generation
- Authentication

Manual:

- UI appearance
- Responsiveness
- Exploratory testing

Keep CI fast:

- Run smoke tests on every push.
- Run full regression nightly.

---

## 4. What I Will Not Test

- Cosmetic issues.
- Browser-specific UI differences.
- Rare edge cases with very low business impact.

Priority is protecting payroll and authentication.