# Laravel Livewire Tables Demo

A comprehensive demo application showcasing all features of the [rappasoft/laravel-livewire-tables](https://github.com/rappasoft/laravel-livewire-tables) package.

## 🚀 Live Demo

Visit [tables.rappasoft.com](https://tables.rappasoft.com) to see the demo in action.

## Requirements

- PHP 8.1+
- Laravel 10, 11, or 12
- Livewire 3.x
- Node.js & NPM (for assets)

## Installation

```bash
# Clone the repository
git clone https://github.com/rappasoft/laravel-livewire-tables-demo.git
cd laravel-livewire-tables-demo

# Install dependencies
composer install
npm install && npm run build

# Configure environment
cp .env.example .env
php artisan key:generate

# Run migrations with seeders
php artisan migrate --seed

# Start the server
php artisan serve
```

## Available Demos

### Theme Demos

| Route | Description |
|-------|-------------|
| `/` | Home page with theme selector |
| `/tw3` | Tailwind CSS 3 demo |
| `/tw2` | Tailwind CSS 2 demo |
| `/bs5` | Bootstrap 5 demo |
| `/bs4` | Bootstrap 4 demo |

### New Features (v4.0)

| Route | Feature | Description |
|-------|---------|-------------|
| `/new-features` | Feature Index | Overview of all new features |
| `/summaries` | Column Summaries | Display sum, avg, count, min, max in column footers |
| `/polling` | Enhanced Polling | Auto-refresh with human-readable intervals |
| `/deferred` | Deferred Loading | Async data loading for better performance |
| `/grouping` | Row Grouping | Group rows by column with collapsible sections |
| `/row-classes` | Dynamic Row Styling | Apply conditional CSS classes to rows |
| `/empty-state` | Custom Empty State | Customize the "no results" message |

## New Features Overview

### Column Summaries

Display aggregate values at the bottom of columns:

```php
Column::make('Sales', 'sales')
    ->summary('sum'),    // sum, avg, count, min, max

// Or with a custom callback
Column::make('Custom')
    ->summary(fn($rows) => 'Total: $' . number_format($rows->sum('sales'))),
```

### Enhanced Polling

Auto-refresh tables with human-readable intervals:

```php
$this->poll('10s');   // 10 seconds
$this->poll('1m');    // 1 minute
$this->poll('5m');    // 5 minutes
```

### Deferred Loading

Improve initial page load by fetching data asynchronously:

```php
$this->deferLoading();
```

### Row Grouping

Group rows by column values with collapsible sections:

```php
$this->groupBy('status')
    ->groupsCollapsed();  // or ->groupsExpanded()
```

### Dynamic Row Styling

Apply conditional CSS classes based on record data:

```php
$this->recordClasses(function ($record) {
    return match (true) {
        $record->success_rate >= 80 => 'bg-green-100',
        $record->success_rate >= 50 => 'bg-yellow-100',
        default => 'bg-red-100',
    };
});
```

### Custom Empty State

Customize what users see when there are no records:

```php
$this->emptyStateHeading('No Results Found')
    ->emptyStateDescription('Try adjusting your search criteria.');
```

### Global Settings

Configure defaults for all tables in your application:

```php
// In AppServiceProvider::boot()
DataTableComponent::configureUsing(function ($component) {
    $component->setPerPageAccepted([10, 25, 50, 100]);
    $component->setLoadingPlaceholderEnabled();
    $component->setSearchDebounce(500);
});
```

## Local Development

For local development with the main package:

1. Update `composer.json` to use a path repository:

```json
{
    "repositories": [
        {
            "type": "path",
            "url": "../laravel-livewire-tables"
        }
    ],
    "require": {
        "rappasoft/laravel-livewire-tables": "dev-development"
    }
}
```

2. Run `composer update rappasoft/laravel-livewire-tables`

## Documentation

Full documentation is available at [rappasoft.com/docs/laravel-livewire-tables](https://rappasoft.com/docs/laravel-livewire-tables).

## License

MIT License - see [LICENSE](LICENSE) for details.
