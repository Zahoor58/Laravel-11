## Lazy Loading

Lazy loading refers to delaying the execution of an SQL query until it is absolutely necessary. 

## N+1 Problem

The N+1 problem occurs when multiple database queries are executed within a loop, rather than making a single query that retrieves all of the relevant data at once. When you reference a relationship within a loop, a new SQL query is performed each time, which is known as lazy loading.

### How Lazy Loading Works in a Loop

Lazy loading can lead to a situation where, for each item in the loop, an additional SQL query is executed to load related data (e.g., loading the employer for each job). This can result in the N+1 problem, where **N** represents the number of items in the loop, and the **+1** represents the initial query. This is exactly where the term **N+1 problem** comes from.

To illustrate this, I will show you two ways to handle it:

### Step 1: Install Laravel Debug Bar

To detect and diagnose the N+1 problem, you can use the Laravel Debug Bar:

```bash
composer require barryvdh/laravel-debugbar --dev

```

### Implementing Eager Loading
To prevent the N+1 problem, you can use eager loading. For example:


```bash
$jobs = Job::with('employer')->get();
```
This will load all jobs and their related employers in a single query.

### How to Disable Lazy Loading
You can disable lazy loading globally in Laravel by modifying the AppServiceProvider. Go to the Provider directory in the App folder, and then open the AppServiceProvider. In the boot function, add the following code:

```bash
use Illuminate\Database\Eloquent\Model;

public function boot()
{
    Model::preventLazyLoading();
}

```

The boot function is triggered after all project dependencies have been fully loaded.
