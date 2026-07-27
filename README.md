# Laravel Livewire Tables Demo

A small Laravel app that demos [rappasoft/laravel-livewire-tables](https://github.com/rappasoft/laravel-livewire-tables) v3 features against seeded SQLite data.

## The package is symlinked

`composer.json` uses a path repository pointing at `../Livewire Tables`, so `vendor/rappasoft/laravel-livewire-tables` is a **symlink to the package working copy**. That means:

- The demo always runs whatever branch/commit is currently checked out in `../Livewire Tables` — edit the package source and refresh the browser to see changes.
- **Never run `composer update`** (or `require`/`remove`) here; the package repo may be mid-release and the lockfile is intentionally pinned to the local path.

## Setup

```bash
composer install
npm install && npm run build
touch database/database.sqlite
php artisan migrate --seed
php artisan serve
```

## Routes

| Route | Description |
|---|---|
| `/` | Landing page linking to all demos |
| `/new-features` | Overview of v3 feature cards with code snippets |
| `/tailwind` | Full-featured table: filters, bulk actions, column select, reordering |
| `/summaries` | Column footer rows with computed values (`footer()`) |
| `/polling` | Auto refresh via `setRefreshTime()` |
| `/deferred` | Loading placeholder (`setLoadingPlaceholderEnabled()`) |
| `/grouping` | Sorting defaults (`setDefaultSort()`) |
| `/row-classes` | Conditional row/cell styling (`setTrAttributes()` / `setTdAttributes()`) |
| `/empty-state` | Custom empty message (`setEmptyMessage()`) |
| `/relationships` | Aggregate columns: `CountColumn`, `SumColumn`, `AvgColumn` |
| `/relationship-types` | `ArrayColumn` and relationship display columns |
| `/test` | Scratch page for ad-hoc testing |

After editing Blade files run `php artisan view:clear`; after config/.env changes run `php artisan config:clear`.
