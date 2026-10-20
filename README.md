# Laravel Livewire Tables Demo

A small Laravel app that demos [rappasoft/laravel-livewire-tables](https://github.com/rappasoft/laravel-livewire-tables) v3 features on Livewire 4 and Laravel 12 against seeded SQLite data. The package also retains Livewire 3 support.

Public demo: [tables.rappasoft.com](https://tables.rappasoft.com), with [Tailwind](https://tables.rappasoft.com/tailwind), [Bootstrap 4](https://tables.rappasoft.com/bootstrap-4) and [Bootstrap 5](https://tables.rappasoft.com/bootstrap-5) examples.

## Published package

`composer.json` requires the stable `^3.10` release from Packagist, and the lockfile pins v3.10.0. No sibling package checkout is needed. For an intentional package update, run `composer update rappasoft/laravel-livewire-tables` and rerun the checks below.

## Setup

```bash
composer install
npm install && npm run build
touch database/database.sqlite
php artisan migrate --seed
php artisan serve
```

The local Herd site is `http://tables-livewire4.test` (`herd link tables-livewire4 --isolate=8.4 --update-env`). The existing `tables.test` points to a separate scratch demo. The demo displays its installed Tables and Livewire versions; the package's v3 version is separate from Livewire's major version.

## Checks

```bash
php artisan test
npm run build
```

Browser checks should exercise the table selector, search, filters, pagination, bulk actions, column selection and drag-and-save reordering on `/tailwind`, plus the feature pages below.

## Routes

| Route | Description |
|---|---|
| `/` | Landing page linking to all demos |
| `/new-features` | Overview of v3 feature cards with code snippets |
| `/tailwind` | Full-featured table: filters, bulk actions, column select, reordering |
| `/bootstrap-4` | Bootstrap 4 tables with table, filter-layout and locale selectors |
| `/bootstrap-5` | Bootstrap 5 tables with table, filter-layout and locale selectors |
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
