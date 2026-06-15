# NME Allocation System

A web-based Non-Major Elective (NME) subject allocation system developed for V.H.N.S.N College (Autonomous), Virudhunagar.

The system automates the process of allocating NME subjects to students based on predefined allocation criteria, replacing traditional manual allocation methods with a faster, more efficient, and accurate digital solution.

---

# Project Overview

The NME Allocation System helps college administrators manage and streamline the allocation of non-major elective subjects to students.

The application provides:

* Student preference management
* Automated NME subject allocation
* Reallocation support for corrections
* Department-wise allocation analysis
* PDF report generation
* Excel export functionality
* Dashboard-based administration

The system improves allocation accuracy, simplifies record management, and enhances monitoring and reporting capabilities.

---

# Features

## Admin Features

* Admin login system
* Dashboard management
* NME subject allocation
* Reallocation of subjects
* Department-wise filtering
* Class-wise filtering
* Student preference management
* PDF report generation
* Excel export support
* Allocation monitoring and analysis

---

# Technologies Used

## Frontend

* HTML5
* CSS3
* JavaScript
* Bootstrap

## Backend

* PHP

## Database

* MySQL / MySQLi

## Additional Libraries

* TCPDF (PDF generation)
* SweetAlert

---

# Project Structure

```text id="j7x2v4"
NME-Allocation
│
├── css/
├── js/
├── img/
├── database/
├── document/
├── TCPDF/
│
├── dashboard.php
├── preference.php
├── nme_allocated.php
├── export.php
├── excel.php
├── pdf_nmedep.php
├── user_login.php
├── logout.php
├── con1.php
└── index.php
```

---

# Modules

## Authentication Module

Handles administrator login and logout functionality.

## Preference Management

Allows handling and processing of student NME preferences.

## Allocation Module

Allocates NME subjects to students based on predefined conditions.

## Reallocation Module

Supports correcting allocation mismatches through reallocation.

## Reporting Module

Generates:

* PDF reports
* Excel reports
* Department-wise allocation reports

---

# Database

The system uses MySQL for storing:

* Student details
* Department details
* Class information
* NME subjects
* Allocation records
* Preferences

Database files are available inside the `database` folder.

---

# Installation Guide

## Requirements

* XAMPP / WAMP Server
* PHP 7+
* MySQL
* Web Browser

---

# Setup Instructions

## 1. Clone Repository

```bash id="x3m8p2"
git clone https://github.com/chithananth/NME-Allocation.git
```

---

## 2. Move Project

Move the project folder into:

```text id="r6n4v1"
htdocs
```

folder inside XAMPP.

Example:

```text id="k9v2m7"
C:\xampp\htdocs\NME-Allocation
```

---

## 3. Import Database

1. Open phpMyAdmin
2. Create a database
3. Import SQL file from `database` folder

---

## 4. Configure Database Connection

Open:

```text id="p2x7m5"
con1.php
```

Update:

```php id="m5v8r1"
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "your_database_name";
```

---

## 5. Run Project

Start:

* Apache
* MySQL

Open browser:

```text id="q4n1x8"
http://localhost/NME-Allocation
```

---


# Key Functionalities

* Automated elective allocation
* Dynamic department filtering
* Reallocation support
* Report generation
* Allocation data analysis
* Secure admin access
* Efficient record handling

---

# Advantages

* Reduces manual work
* Improves allocation accuracy
* Faster subject allocation process
* Easy report generation
* Better data management
* Simplified administration

---

# Future Enhancements

* Student login system
* AI-based allocation recommendations
* Email notifications
* Mobile responsive UI improvements
* Role-based authentication
* Cloud deployment

---

# Learning Outcomes

This project helped in understanding:

* PHP backend development
* MySQL database management
* CRUD operations
* Session management
* PDF generation
* Excel export
* Dynamic filtering
* Fullstack web development

---

# Developed For

V.H.N.S.N College (Autonomous), Virudhunagar

---

# Author

Chithanantham M

MCA Student | Fullstack Developer

GitHub:
https://github.com/chithananth

---

# License

This project is developed for educational and institutional purposes.
