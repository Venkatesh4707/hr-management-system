# Negative Testing Report

## Employee Form

### Empty Fields
Result: Passed
System displays validation errors.

---

### Invalid Email

Input:
venkateshsagar4707gmail.com

Result: Passed

Error:
Please include '@' in the email address.

---

### Duplicate Email

Input:
super@root.com

Result: Passed

Error:
The email has already been taken.

---

### Invalid Phone Number

Input:
12345678

Result: Passed

Error:
This phone number format is not valid.

---

### Salary = 0

Input:
0

Result:
Failed

Severity:
Critical

---

### Negative Salary

Input:
-100

Result:
Failed

Severity:
Critical

---

### Future Hire Date

Input:
01/01/2035

Result:
Failed

Severity:
High

---

### Mailpit Connection Failure

Result:
Failed

Severity:
High

---

### Stack Trace Exposure

Result:
Failed

Severity:
High

---

### Missing INR Currency

Result:
Failed

Severity:
Medium

---

### Double Submit

Result:
Needs Testing

---

### SQL Injection

Input:

' OR 1=1 --

Result:
Needs Testing

---

### XSS Payload

Input:

<script>alert(1)</script>

Result:
Needs Testing

---

### Extremely Long Strings

Input:

AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA

Result:
Needs Testing

---

### Unauthorized Access

Result:
Needs Testing

---

### Direct URL Access

Result:
Needs Testing