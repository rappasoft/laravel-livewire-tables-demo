<div>
    <div class="mb-8">
        <livewire:demos.tables.relationships-demo-table />
    </div>

    <div class="mb-8 rounded-xl border border-amber-500/40 bg-amber-500/10 p-4 text-sm text-amber-200">
        <strong class="block text-amber-100 mb-1">Note for v3</strong>
        This package version does not provide the v4 helpers <code>heading()</code>, <code>description()</code>,
        <code>counts()</code>, <code>displayField()</code>, <code>relationshipSeparator()</code>,
        <code>limit()</code> or <code>formatRelations()</code>. The demo above uses the v3 equivalents:
        <code>CountColumn::setDataSource()</code> for counts, <code>ArrayColumn</code> with
        <code>data()</code>/<code>outputFormat()</code>/<code>separator()</code> for relationship collections, and
        <code>label()->html()</code> for computed cells. Aggregate helpers for
        <code>sum</code>/<code>avg</code> exist as <code>SumColumn</code>/<code>AvgColumn</code>
        (demoed above as "Published Sum" and "Publish Rate");
        there is no <code>min</code>/<code>max</code> aggregate column, and scoped counts must be added
        with <code>withCount()</code> in <code>builder()</code>. The page heading/description are rendered by
        this view rather than by the table component.
    </div>

    <div class="space-y-8 bg-slate-900 rounded-xl p-6">
        <!-- Overview -->
        <div>
            <h3 class="text-lg font-semibold text-white mb-3 flex items-center">
                <span class="w-6 h-6 bg-cyan-500/20 rounded flex items-center justify-center mr-2 text-cyan-400 text-sm">✨</span>
                Overview
            </h3>
            <p class="text-slate-400 mb-4">
                Relationship aggregates allow you to display data from related models using Eloquent's built-in aggregate methods. 
                This is similar to Filament Tables' relationship support and works seamlessly with existing Laravel relationships.
            </p>
        </div>

        <!-- Basic Relationships -->
        <div>
            <h3 class="text-lg font-semibold text-white mb-3 flex items-center">
                <span class="w-6 h-6 bg-blue-500/20 rounded flex items-center justify-center mr-2 text-blue-400 text-sm">1</span>
                Basic Relationships (hasOne/BelongsTo)
            </h3>
            <p class="text-slate-400 mb-4">
                Use dot notation to access related model data. The table automatically joins the necessary tables:
            </p>
            <pre class="bg-slate-800/50 rounded-lg p-4 text-sm overflow-x-auto"><code class="text-slate-300">// Display address from related Address model
Column::make('Address', 'address.address')
    ->sortable()
    ->searchable(),

// Nested relationships
Column::make('City', 'address.group.city.name')
    ->sortable(),</code></pre>
        </div>

        <!-- Counts Example -->
        <div>
            <h3 class="text-lg font-semibold text-white mb-3 flex items-center">
                <span class="w-6 h-6 bg-green-500/20 rounded flex items-center justify-center mr-2 text-green-400 text-sm">2</span>
                Counting Relationships
            </h3>
            <p class="text-slate-400 mb-4">
                Use <code class="text-purple-400">CountColumn</code> to display the number of related records:
            </p>
            <pre class="bg-slate-800/50 rounded-lg p-4 text-sm overflow-x-auto"><code class="text-slate-300">// Count all related records
CountColumn::make('Articles')
    ->setDataSource('articles')
    ->sortable(),

// Scoped counts have no column-level API in v3 -
// add them in builder() and render with label()
public function builder(): Builder
{
    return User::query()->withCount([
        'articles as published_articles_count' => fn($q) => $q->where('is_published', true),
    ]);
}

Column::make('Published')
    ->label(fn($row) => $row->published_articles_count . ' published'),

// Count belongsToMany relationship
CountColumn::make('Tags')
    ->setDataSource('tags')
    ->sortable(),</code></pre>
        </div>

        <!-- hasMany/belongsToMany Collections -->
        <div>
            <h3 class="text-lg font-semibold text-white mb-3 flex items-center">
                <span class="w-6 h-6 bg-yellow-500/20 rounded flex items-center justify-center mr-2 text-yellow-400 text-sm">3</span>
                Displaying Relationship Collections
            </h3>
            <p class="text-slate-400 mb-4">
                Show collections from hasMany or belongsToMany relationships:
            </p>
            <pre class="bg-slate-800/50 rounded-lg p-4 text-sm overflow-x-auto"><code class="text-slate-300">// Display article titles (limit is applied inside data())
ArrayColumn::make('Articles')
    ->data(fn($value, $row) => $row->articles->take(3))
    ->outputFormat(fn($index, $value) => e($value->title))
    ->separator(' | '),

// Display tags with custom formatting
ArrayColumn::make('Tags')
    ->data(fn($value, $row) => $row->tags)
    ->outputFormat(fn($index, $value) => '&lt;span&gt;' . e($value->name) . '&lt;/span&gt;')
    ->flexRow(['class' => 'flex-wrap gap-1']),</code></pre>
        </div>

        <!-- Sum Example -->
        <div>
            <h3 class="text-lg font-semibold text-white mb-3 flex items-center">
                <span class="w-6 h-6 bg-yellow-500/20 rounded flex items-center justify-center mr-2 text-yellow-400 text-sm">4</span>
                Sum Aggregate
            </h3>
            <p class="text-slate-400 mb-4">
                Use <code class="text-purple-400">SumColumn</code> to total a column from related records.
                The package auto-registers <code class="text-purple-400">withSum()</code> on the builder for you.
                In the demo above, the "Published Sum" column sums the boolean <code>is_published</code>
                flag on the articles relation &mdash; the sum of a 0/1 column is the number of published articles:
            </p>
            <pre class="bg-slate-800/50 rounded-lg p-4 text-sm overflow-x-auto"><code class="text-slate-300">// Sum a column on a relation (exposed on the row as articles_sum_is_published)
SumColumn::make('Published Sum')
    ->setDataSource('articles', 'is_published')
    ->sortable()
    ->footer(fn($rows) => 'Total: ' . ($rows->sum('articles_sum_is_published') ?? 0)),

// Scoped sums are not available on the column in v3 -
// use withSum() in builder() and render with label()</code></pre>
        </div>

        <!-- Avg Example -->
        <div>
            <h3 class="text-lg font-semibold text-white mb-3 flex items-center">
                <span class="w-6 h-6 bg-pink-500/20 rounded flex items-center justify-center mr-2 text-pink-400 text-sm">5</span>
                Average Aggregate
            </h3>
            <p class="text-slate-400 mb-4">
                Use <code class="text-purple-400">AvgColumn</code> to calculate the average
                (<code class="text-purple-400">withAvg()</code> is auto-registered on the builder).
                The "Publish Rate" column above averages the boolean <code>is_published</code> flag and
                overrides the default output with <code class="text-purple-400">label()</code> to render a percentage:
            </p>
            <pre class="bg-slate-800/50 rounded-lg p-4 text-sm overflow-x-auto"><code class="text-slate-300">// Average a column on a relation (exposed as articles_avg_is_published)
AvgColumn::make('Publish Rate')
    ->setDataSource('articles', 'is_published')
    ->sortable()
    // Optional: label() overrides the raw average with custom formatting
    ->label(fn($row) => round(($row->articles_avg_is_published ?? 0) * 100) . '%'),</code></pre>
        </div>

        <!-- Min/Max Example -->
        <div>
            <h3 class="text-lg font-semibold text-white mb-3 flex items-center">
                <span class="w-6 h-6 bg-indigo-500/20 rounded flex items-center justify-center mr-2 text-indigo-400 text-sm">6</span>
                Min/Max Aggregates
            </h3>
            <p class="text-slate-400 mb-4">
                <strong class="text-amber-300">Not available in v3.</strong> There is no min/max aggregate column -
                only <code class="text-purple-400">CountColumn</code>, <code class="text-purple-400">SumColumn</code>
                and <code class="text-purple-400">AvgColumn</code>. Use Eloquent in <code class="text-purple-400">builder()</code> instead:
            </p>
            <pre class="bg-slate-800/50 rounded-lg p-4 text-sm overflow-x-auto"><code class="text-slate-300">public function builder(): Builder
{
    return User::query()
        ->withMin('orders', 'created_at')
        ->withMax('orders', 'created_at');
}

Column::make('First Order')
    ->label(fn($row) => $row->orders_min_created_at ?? 'Never'),

Column::make('Last Order')
    ->label(fn($row) => $row->orders_max_created_at ?? 'Never'),</code></pre>
        </div>

        <!-- Naming Convention -->
        <div>
            <h3 class="text-lg font-semibold text-white mb-3 flex items-center">
                <span class="w-6 h-6 bg-purple-500/20 rounded flex items-center justify-center mr-2 text-purple-400 text-sm">7</span>
                Column Naming Convention
            </h3>
            <p class="text-slate-400 mb-4">
                Column names must follow Laravel's naming convention:
            </p>
            <div class="bg-slate-800/50 rounded-lg p-4 overflow-x-auto">
                <table class="w-full text-sm">
                    <thead>
                        <tr class="text-left text-slate-400">
                            <th class="pb-2">Method</th>
                            <th class="pb-2">Pattern</th>
                            <th class="pb-2">Example</th>
                        </tr>
                    </thead>
                    <tbody class="text-slate-300">
                        <tr><td class="py-1"><code class="text-purple-400">CountColumn</code></td><td>{relationship}_count</td><td><code>posts_count</code></td></tr>
                        <tr><td class="py-1"><code class="text-purple-400">SumColumn</code></td><td>{relationship}_sum_{column}</td><td><code>orders_sum_total</code></td></tr>
                        <tr><td class="py-1"><code class="text-purple-400">AvgColumn</code></td><td>{relationship}_avg_{column}</td><td><code>reviews_avg_rating</code></td></tr>
                        <tr><td class="py-1 text-slate-500">min / max</td><td class="text-slate-500">not available in v3</td><td class="text-slate-500">use withMin()/withMax()</td></tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Benefits -->
        <div class="bg-gradient-to-r from-cyan-500/10 to-teal-500/10 rounded-xl p-6 border border-cyan-500/20">
            <h3 class="text-lg font-semibold text-white mb-4">Key Benefits</h3>
            <ul class="space-y-2 text-slate-300">
                <li class="flex items-start">
                    <svg class="w-5 h-5 text-cyan-400 mr-2 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                    <span><strong class="text-white">Automatic Query Optimization</strong> — Uses Eloquent's efficient aggregate queries</span>
                </li>
                <li class="flex items-start">
                    <svg class="w-5 h-5 text-cyan-400 mr-2 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                    <span><strong class="text-white">Scoped Aggregates</strong> — Filter related records before aggregating</span>
                </li>
                <li class="flex items-start">
                    <svg class="w-5 h-5 text-cyan-400 mr-2 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                    <span><strong class="text-white">Sortable & Searchable</strong> — Works with all column features</span>
                </li>
                <li class="flex items-start">
                    <svg class="w-5 h-5 text-cyan-400 mr-2 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                    <span><strong class="text-white">Type Safe</strong> — Follows Laravel conventions for predictable behavior</span>
                </li>
            </ul>
        </div>
    </div>
</div>




