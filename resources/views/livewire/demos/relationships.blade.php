<div>
    @section('table')
        <livewire:demos.tables.relationships-demo-table />
    @endsection

    @section('code-examples')
    <div class="space-y-8">
        <!-- Overview -->
        <div>
            <h3 class="text-lg font-semibold text-white mb-3 flex items-center">
                <span class="w-6 h-6 bg-cyan-500/20 rounded flex items-center justify-center mr-2 text-cyan-400 text-sm">✨</span>
                Overview
            </h3>
            <p class="text-gray-400 mb-4">
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
            <p class="text-gray-400 mb-4">
                Use dot notation to access related model data. The table automatically joins the necessary tables:
            </p>
            <pre class="bg-slate-800/50 rounded-lg p-4 text-sm overflow-x-auto"><code class="text-gray-300">// Display address from related Address model
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
            <p class="text-gray-400 mb-4">
                Use <code class="text-purple-400">counts()</code> to display the number of related records:
            </p>
            <pre class="bg-slate-800/50 rounded-lg p-4 text-sm overflow-x-auto"><code class="text-gray-300">// Count all related records
Column::make('Articles', 'articles_count')
    ->counts('articles')
    ->sortable(),

// Count with scope (only published articles)
Column::make('Published', 'articles_count')
    ->counts(['articles' => fn($q) => $q->where('is_published', true)])
    ->sortable(),

// Count belongsToMany relationship
Column::make('Tags', 'tags_count')
    ->counts('tags')
    ->sortable(),</code></pre>
        </div>

        <!-- hasMany/belongsToMany Collections -->
        <div>
            <h3 class="text-lg font-semibold text-white mb-3 flex items-center">
                <span class="w-6 h-6 bg-yellow-500/20 rounded flex items-center justify-center mr-2 text-yellow-400 text-sm">3</span>
                Displaying Relationship Collections
            </h3>
            <p class="text-gray-400 mb-4">
                Show collections from hasMany or belongsToMany relationships:
            </p>
            <pre class="bg-slate-800/50 rounded-lg p-4 text-sm overflow-x-auto"><code class="text-gray-300">// Display article titles
Column::make('Articles', 'articles')
    ->displayField('title')
    ->separator(' | ')
    ->limit(3),

// Display tags with custom formatting
Column::make('Tags', 'tags')
    ->displayField('name')
    ->separator(', ')
    ->format(fn($value) => /* custom HTML */),</code></pre>
        </div>

        <!-- Sum Example -->
        <div>
            <h3 class="text-lg font-semibold text-white mb-3 flex items-center">
                <span class="w-6 h-6 bg-yellow-500/20 rounded flex items-center justify-center mr-2 text-yellow-400 text-sm">4</span>
                Sum Aggregate
            </h3>
            <p class="text-gray-400 mb-4">
                Use <code class="text-purple-400">sum()</code> to total a column from related records:
            </p>
            <pre class="bg-slate-800/50 rounded-lg p-4 text-sm overflow-x-auto"><code class="text-gray-300">// Total revenue from orders
Column::make('Revenue', 'orders_sum_total')
    ->sum('orders', 'total')
    ->format(fn($value) => '$' . number_format($value ?? 0, 2))
    ->sortable(),

// With scope (only paid orders)
Column::make('Paid Revenue', 'orders_sum_total')
    ->sum(['orders' => fn($q) => $q->where('paid', true)], 'total')
    ->format(fn($value) => '$' . number_format($value ?? 0, 2)),</code></pre>
        </div>

        <!-- Avg Example -->
        <div>
            <h3 class="text-lg font-semibold text-white mb-3 flex items-center">
                <span class="w-6 h-6 bg-pink-500/20 rounded flex items-center justify-center mr-2 text-pink-400 text-sm">5</span>
                Average Aggregate
            </h3>
            <p class="text-gray-400 mb-4">
                Use <code class="text-purple-400">avg()</code> to calculate the average:
            </p>
            <pre class="bg-slate-800/50 rounded-lg p-4 text-sm overflow-x-auto"><code class="text-gray-300">// Average rating from reviews
Column::make('Avg Rating', 'reviews_avg_rating')
    ->avg('reviews', 'rating')
    ->format(fn($value) => number_format($value ?? 0, 1) . ' / 5')
    ->sortable(),

// Average order value
Column::make('AOV', 'orders_avg_total')
    ->avg('orders', 'total')
    ->format(fn($value) => '$' . number_format($value ?? 0, 2)),</code></pre>
        </div>

        <!-- Min/Max Example -->
        <div>
            <h3 class="text-lg font-semibold text-white mb-3 flex items-center">
                <span class="w-6 h-6 bg-indigo-500/20 rounded flex items-center justify-center mr-2 text-indigo-400 text-sm">6</span>
                Min/Max Aggregates
            </h3>
            <p class="text-gray-400 mb-4">
                Use <code class="text-purple-400">min()</code> and <code class="text-purple-400">max()</code> for extremes:
            </p>
            <pre class="bg-slate-800/50 rounded-lg p-4 text-sm overflow-x-auto"><code class="text-gray-300">// First order date
Column::make('First Order', 'orders_min_created_at')
    ->min('orders', 'created_at')
    ->format(fn($value) => $value?->format('M j, Y') ?? 'Never'),

// Latest order
Column::make('Last Order', 'orders_max_created_at')
    ->max('orders', 'created_at')
    ->format(fn($value) => $value?->diffForHumans() ?? 'Never'),

// Lowest/Highest price
Column::make('Lowest Price', 'products_min_price')
    ->min('products', 'price')
    ->format(fn($value) => '$' . number_format($value ?? 0, 2)),

Column::make('Highest Price', 'products_max_price')
    ->max('products', 'price')
    ->format(fn($value) => '$' . number_format($value ?? 0, 2)),</code></pre>
        </div>

        <!-- Naming Convention -->
        <div>
            <h3 class="text-lg font-semibold text-white mb-3 flex items-center">
                <span class="w-6 h-6 bg-purple-500/20 rounded flex items-center justify-center mr-2 text-purple-400 text-sm">7</span>
                Column Naming Convention
            </h3>
            <p class="text-gray-400 mb-4">
                Column names must follow Laravel's naming convention:
            </p>
            <div class="bg-slate-800/50 rounded-lg p-4 overflow-x-auto">
                <table class="w-full text-sm">
                    <thead>
                        <tr class="text-left text-gray-400">
                            <th class="pb-2">Method</th>
                            <th class="pb-2">Pattern</th>
                            <th class="pb-2">Example</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-300">
                        <tr><td class="py-1"><code class="text-purple-400">counts()</code></td><td>{relationship}_count</td><td><code>posts_count</code></td></tr>
                        <tr><td class="py-1"><code class="text-purple-400">sum()</code></td><td>{relationship}_sum_{column}</td><td><code>orders_sum_total</code></td></tr>
                        <tr><td class="py-1"><code class="text-purple-400">avg()</code></td><td>{relationship}_avg_{column}</td><td><code>reviews_avg_rating</code></td></tr>
                        <tr><td class="py-1"><code class="text-purple-400">min()</code></td><td>{relationship}_min_{column}</td><td><code>orders_min_created_at</code></td></tr>
                        <tr><td class="py-1"><code class="text-purple-400">max()</code></td><td>{relationship}_max_{column}</td><td><code>orders_max_created_at</code></td></tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Benefits -->
        <div class="bg-gradient-to-r from-cyan-500/10 to-teal-500/10 rounded-xl p-6 border border-cyan-500/20">
            <h3 class="text-lg font-semibold text-white mb-4">Key Benefits</h3>
            <ul class="space-y-2 text-gray-300">
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
    @endsection
</div>

