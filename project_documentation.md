# Event Management Portal

A simple event registration and management web application built with PHP and MySQL.

## Tech Stack

* Backend: PHP (PDO)
* Database: MySQL
* Frontend: HTML5, CSS3, JavaScript
* Local Server: XAMPP (Apache & MySQL)

## Features

* Homepage: Lists upcoming events with details and register buttons.
* Registration Form: Auto-fills the selected event name and validates all inputs.
* Confirmation Page: Displays a full summary of the submitted registration.
* Admin Panel: Login portal to view, inspect, and delete attendee registrations.

## Project Structure

* db.php - Database connection using PDO
* schema.sql - Database table definitions and sample data
* style.css - Application styling
* index.php - Homepage displaying upcoming events
* register.php - Event registration form with validation
* success.php - Registration summary page
* admin_login.php - Admin login interface
* admin_dashboard.php - Admin records table with View and Delete actions
* admin_view.php - View single registration details
* admin_delete.php - Delete registration handler
* admin_logout.php - Admin session logout handler

## Setup Instructions

1. Start Apache and MySQL from the XAMPP Control Panel.
2. Open phpMyAdmin in your browser.
3. Import or execute the schema.sql file to create the database and required tables.
4. Place the project folder into your local web directory: C:\xampp\htdocs\event-management

## Application URLs

* Public Events Homepage: http://localhost/event-management/index.php
* Admin Login: http://localhost/event-management/admin_login.php

## Admin Credentials

* Username: admin
* Password: adminpassword