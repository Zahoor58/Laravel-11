# Laravel 11 Project

## Overview

This repository contains a Laravel 11 application demonstrating various features and best practices for building a web application using Laravel. It includes models, views, migrations, factories, and relationships.

## Table of Contents

1. [Installation](#installation)
2. [Configuration](#configuration)


## Installation

To get started with the project, follow these steps:

1. Clone the repository:
    ```bash
    git clone https://github.com/Zahoor58/Laravel-11.git
    ```

2. Navigate to the project directory:
    ```bash
    cd your-laravel-project
    ```

3. Install dependencies:
    ```bash
    composer install
    ```

4. Set up your environment file:
    ```bash
    cp .env.example .env
    ```

5. Generate an application key:
    ```bash
    php artisan key:generate
    ```

6. Run migrations:
    ```bash
    php artisan migrate
    ```

7. Serve the application:
    ```bash
    php artisan serve
    ```

## Configuration

Update the `.env` file with your database and other configuration settings.


# Laravel Eloquent Relationships

Laravel’s Eloquent ORM provides an elegant and expressive way to work with database records and their relationships. This document outlines the most common types of relationships and how to implement them in Laravel.

## Table of Contents

1. [One-to-One Relationship](#one-to-one-relationship)
2. [One-to-Many Relationship](#one-to-many-relationship)
3. [Many-to-Many Relationship](#many-to-many-relationship)
4. [Has-Many-Through Relationship](#has-many-through-relationship)
5. [Polymorphic Relationships](#polymorphic-relationships)
6. [Summary](#summary)

## 1. One-to-One Relationship

### Definition

A one-to-one relationship is where one record in a table is associated with exactly one record in another table.

### Example

A `User` has one `Profile`.

### Implementation in Laravel

**Create Models and Migrations:**

```bash
php artisan make:model User -m
php artisan make:model Profile -m
```

## 2. One-to-Many Relationship

### Definition

In a one-to-many relationship, one record in a table can have multiple related records in another table.

### Example

A `Post` can have many `Comments`.

### Implementation in Laravel

**Create Models and Migrations:**

```bash
php artisan make:model Post -m
php artisan make:model Comment -m
```

## 3. Many-to-Many Relationship

### Definition

In a many-to-many relationship, records in one table can be related to multiple records in another table, and vice versa.

### Example

A `User` can have many `Roles`, and a `Role` can belong to many `Users`.

### Implementation in Laravel

**Create Models and Migrations:**

```bash
php artisan make:model User -m
php artisan make:model Role -m
php artisan make:migration create_role_user_table --create=role_user

```

## 4. Has-Many-Through Relationship

### Definition

A "has-many-through" relationship provides a convenient way to access distant relations via an intermediate relation.

### Example

A `Country` has many `Posts` through `User`.

### Implementation in Laravel

**Create Models and Migrations:**

```bash
php artisan make:model Country -m
php artisan make:model User -m
php artisan make:model Post -m
```

## 5. Polymorphic Relationships

### Definition

Polymorphic relationships allow a model to belong to more than one other model on a single association.

### Example

A `Comment` model that can belong to both `Post` and `Video`.

### Implementation in Laravel

**Create Models and Migrations:**

```bash
php artisan make:model Post -m
php artisan make:model Video -m
php artisan make:model Comment -m
```


## Model

A **model** is a key term in the MVC (Model-View-Controller) architecture. It is not unique to Laravel; many tools and frameworks adhere to this pattern. The model defines the methodology for constructing applications and outlines how each piece of the puzzle should and can communicate with others.

Your model can represent your data persistence but also the business logic tier of your application. For example, if you are building a job board, there are rules for creating a job: 

- Can jobs be marked as open, available, or filled?
- What happens when a job is filled?
- How do you store these jobs? Are they written to a file or stored in a database?
- How do we remove, archive, or delete a job?

All of these questions are encapsulated under the umbrella of a model. If we have a `Model` directory and a `Job` class, the `Job` class should reside in the `Model` directory.

![Model Diagram](https://i.imgur.com/A0mu6LD.png)

---

## Eloquent

**Eloquent** is one of the pillars of the Laravel framework. It is an ORM, or Object-Relational Mapper. Eloquent allows you to map an object in your database, like a table row, to an object in your PHP code. 

### ORM

An **ORM** (Object-Relational Mapper) maps database records (like table rows) to objects in your code. For instance, imagine being able to represent a row from your database directly as an object in PHP. This is what ORM allows. For example, a `Post` in your database can be accessed as a `Post` object in your code, containing all the details of that record.

---

## Factory

### Why use a Factory?

A **factory** is used to quickly scaffold example data. Factories can be used in any situation where you need to quickly generate data. For example:

- If you are writing a test that requires 10 users, you can use a factory to quickly generate those users.
- When developing locally, it might be useful to have multiple job listings to work with. Factories can help generate those listings rapidly.

---

## Lazy Loading

**Lazy loading** refers to the delay of a SQL query until the last possible moment. This approach is used to optimize performance by only loading data when it is actually needed.


