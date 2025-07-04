# Fawry E-commerce System

A robust Object-Oriented PHP e-commerce system demonstrating.

## 🚀 Quick Start

Open `index.php` in your web browser or run:
```bash
php index.php
```

## 📋 System Overview

- **Product Types**: Physical (has weight), Perishable products (weight and expiration date), and Digital (nor weight or expretion date)
- **Checkout Process**: Payment processing and order fulfillment

## 🏗️ Architecture

```
├── Models/          # Domain entities and business logic
├── Services/        # Business operations and calculations
├── UML/            # System design documentation
├── index.php       # Application entry point
└── autoload.php    # autoloader
```

## 📊 System Design

### UML Diagrams
![Full System Architecture](UML/full%20uml.png)
*Complete system architecture and relationships*


## 📦 Simple output
 ![output](UML/Very%20simple%20result.png)
*Simple output of the system showing product details and cart contents*

## 📚 Documentation
We Focused on how to make the system more professional and easy to use.

we have manded the Services Laer to only make some simplesity in the calculations and business logic, as the `FeesCalcservice` 
<br>
the `autoload.php` file is used to onlt include all neaded classes and files in clean way.
<br>
the `index.php` file is the main entry point 
<br>
you can fisrt add products object as the exaple provided in the file 
<br>
then you can add them to the cart and checkout (expired products, customer balance, and see your cart details)