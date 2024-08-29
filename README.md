## 3. Many-to-Many Relationship

### Definition

In a many-to-many relationship, records in one table can be related to multiple records in another table, and vice versa.

### Example

A `Job` can have many `Tags`, and a `Tag` can belong to many `Jobs`.

### Implementation in Laravel

**Create Models and Migrations:**

```bash
php artisan make:model Post -m
php artisan make:model Tag -m

Pivot Table is job_tag

```