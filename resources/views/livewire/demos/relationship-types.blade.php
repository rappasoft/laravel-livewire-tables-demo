<div>
    <div class="mb-8">
        <livewire:demos.tables.relationship-types-demo-table />
    </div>

    <div class="space-y-8">
        <!-- v3 availability note -->
        <div class="bg-amber-500/10 border border-amber-500/30 rounded-xl p-6">
            <h3 class="text-lg font-semibold text-amber-300 mb-3">Not available in v3</h3>
            <ul class="space-y-2 text-slate-300 text-sm list-disc pl-5">
                <li><code class="text-amber-400">heading()</code> / <code class="text-amber-400">description()</code> &mdash; no table-level heading API. The heading above is rendered by the page layout; for markup inside the table wrapper use <code class="text-amber-400">setConfigurableArea('before-toolbar', 'view.path')</code>.</li>
                <li><code class="text-amber-400">displayField()</code>, <code class="text-amber-400">separator()</code>, <code class="text-amber-400">limit()</code> and <code class="text-amber-400">formatRelations()</code> on a plain <code class="text-amber-400">Column</code> &mdash; use <code class="text-amber-400">ArrayColumn</code> with <code class="text-amber-400">data()</code> + <code class="text-amber-400">outputFormat()</code> (limit by calling <code class="text-amber-400">take()</code> inside <code class="text-amber-400">data()</code>), or a <code class="text-amber-400">label()</code> column.</li>
                <li><code class="text-amber-400">relationshipSeparator()</code> &mdash; <code class="text-amber-400">separator()</code> exists, but only on <code class="text-amber-400">ArrayColumn</code>.</li>
                <li><strong>hasOneThrough / hasManyThrough</strong> columns &mdash; v3 only builds joins for hasOne, belongsTo and morphOne, so "through" relations cannot be used with dot notation. The Address Group column below walks the nested <code class="text-amber-400">address.group</code> relation instead.</li>
            </ul>
        </div>

        <!-- Overview -->
        <div>
            <h3 class="text-lg font-semibold text-white mb-3 flex items-center">
                <span class="w-6 h-6 bg-cyan-500/20 rounded flex items-center justify-center mr-2 text-cyan-400 text-sm">✨</span>
                Overview
            </h3>
            <p class="text-slate-400 mb-4">
                Livewire Tables supports all Laravel relationship types, allowing you to display and interact with related model data directly in your table columns. This includes hasOne, belongsTo, hasMany, belongsToMany, hasManyThrough, hasOneThrough, and nested relationships.
            </p>
        </div>

        <!-- hasOne -->
        <div>
            <h3 class="text-lg font-semibold text-white mb-3 flex items-center">
                <span class="w-6 h-6 bg-blue-500/20 rounded flex items-center justify-center mr-2 text-blue-400 text-sm">1</span>
                hasOne Relationship
            </h3>
            <p class="text-slate-400 mb-4">
                Display data from a single related model using dot notation:
            </p>
            <pre class="bg-slate-800/50 rounded-lg p-4 text-sm overflow-x-auto"><code class="text-slate-300">// User hasOne Address
Column::make('Address', 'address.address')
    ->sortable()
    ->searchable(),

// In builder, eager load:
public function builder(): Builder
{
    return User::query()->with('address');
}</code></pre>
        </div>

        <!-- belongsTo -->
        <div>
            <h3 class="text-lg font-semibold text-white mb-3 flex items-center">
                <span class="w-6 h-6 bg-green-500/20 rounded flex items-center justify-center mr-2 text-green-400 text-sm">2</span>
                belongsTo Relationship
            </h3>
            <p class="text-slate-400 mb-4">
                Access parent model data:
            </p>
            <pre class="bg-slate-800/50 rounded-lg p-4 text-sm overflow-x-auto"><code class="text-slate-300">// User belongsTo Parent (self-referencing)
Column::make('Parent', 'parent.name')
    ->sortable()
    ->searchable(),

public function builder(): Builder
{
    return User::query()->with('parent');
}</code></pre>
        </div>

        <!-- Nested -->
        <div>
            <h3 class="text-lg font-semibold text-white mb-3 flex items-center">
                <span class="w-6 h-6 bg-purple-500/20 rounded flex items-center justify-center mr-2 text-purple-400 text-sm">3</span>
                Nested Relationships
            </h3>
            <p class="text-slate-400 mb-4">
                Navigate through multiple relationship levels:
            </p>
            <pre class="bg-slate-800/50 rounded-lg p-4 text-sm overflow-x-auto"><code class="text-slate-300">// User → Address → Group → City
Column::make('City', 'address.group.city.name')
    ->sortable()
    ->searchable(),

public function builder(): Builder
{
    return User::query()->with('address.group.city');
}</code></pre>
        </div>

        <!-- hasMany -->
        <div>
            <h3 class="text-lg font-semibold text-white mb-3 flex items-center">
                <span class="w-6 h-6 bg-yellow-500/20 rounded flex items-center justify-center mr-2 text-yellow-400 text-sm">4</span>
                hasMany Relationship
            </h3>
            <p class="text-slate-400 mb-4">
                Display collections from hasMany relationships:
            </p>
            <pre class="bg-slate-800/50 rounded-lg p-4 text-sm overflow-x-auto"><code class="text-slate-300">// User hasMany Articles
ArrayColumn::make('Articles', 'id')
    ->data(fn($value, $row) => $row->articles->take(3)) // limit here
    ->outputFormat(fn($index, $value) => e($value->title))
    ->separator(', '),

// Or with a custom formatter, via a label column
Column::make('Article Count')
    ->label(fn($row) => $row->articles->count() . ' articles'),

public function builder(): Builder
{
    return User::query()->with('articles');
}</code></pre>
        </div>

        <!-- belongsToMany -->
        <div>
            <h3 class="text-lg font-semibold text-white mb-3 flex items-center">
                <span class="w-6 h-6 bg-pink-500/20 rounded flex items-center justify-center mr-2 text-pink-400 text-sm">5</span>
                belongsToMany Relationship
            </h3>
            <p class="text-slate-400 mb-4">
                Display many-to-many relationship collections:
            </p>
            <pre class="bg-slate-800/50 rounded-lg p-4 text-sm overflow-x-auto"><code class="text-slate-300">// User belongsToMany Tags
ArrayColumn::make('Tags', 'id')
    ->data(fn($value, $row) => $row->tags)
    ->outputFormat(fn($index, $value) => '&lt;span class="badge"&gt;' . e($value->name) . '&lt;/span&gt;')
    ->separator(' '),

public function builder(): Builder
{
    return User::query()->with('tags');
}</code></pre>
        </div>

        <!-- hasOneThrough -->
        <div>
            <h3 class="text-lg font-semibold text-white mb-3 flex items-center">
                <span class="w-6 h-6 bg-indigo-500/20 rounded flex items-center justify-center mr-2 text-indigo-400 text-sm">6</span>
                hasOneThrough / hasManyThrough (not supported)
            </h3>
            <p class="text-slate-400 mb-4">
                v3 cannot join "through" relationships, so walk the intermediate relations with dot notation instead:
            </p>
            <pre class="bg-slate-800/50 rounded-lg p-4 text-sm overflow-x-auto"><code class="text-slate-300">// User → Address → AddressGroup (via the nested relations)
Column::make('Address Group', 'address.group.name')
    ->sortable(),

public function builder(): Builder
{
    return User::query()->with('address.group');
}</code></pre>
        </div>

        <!-- Collection Display Options -->
        <div>
            <h3 class="text-lg font-semibold text-white mb-3 flex items-center">
                <span class="w-6 h-6 bg-teal-500/20 rounded flex items-center justify-center mr-2 text-teal-400 text-sm">7</span>
                Collection Display Options
            </h3>
            <p class="text-slate-400 mb-4">
                Customize how collections are displayed:
            </p>
            <pre class="bg-slate-800/50 rounded-lg p-4 text-sm overflow-x-auto"><code class="text-slate-300">ArrayColumn::make('Articles', 'id')
    ->data(fn($value, $row) => $row->articles->take(5)) // limit displayed items
    ->outputFormat(fn($index, $value) => // per-item formatter
        '&lt;span class="badge"&gt;' . e($value->title) . '&lt;/span&gt;'
    )
    ->separator(' | ')             // Custom separator
    ->emptyValue('None')           // Shown when the collection is empty
    ->flexRow(['class' => 'gap-1']), // Optional wrapper</code></pre>
        </div>

        <!-- Eager Loading -->
        <div class="bg-gradient-to-r from-orange-500/10 to-red-500/10 rounded-xl p-6 border border-orange-500/20">
            <h3 class="text-lg font-semibold text-white mb-4">⚠️ Important: Eager Loading</h3>
            <p class="text-slate-300 mb-4">
                Always eager load relationships to avoid N+1 query problems:
            </p>
            <pre class="bg-slate-800/50 rounded-lg p-4 text-sm overflow-x-auto mb-4"><code class="text-slate-300">// ✅ Correct - eager load all relationships
public function builder(): Builder
{
    return User::query()
        ->with([
            'address',
            'address.group.city',
            'parent',
            'articles',
            'tags',
            'addressgroup',
        ]);
}

// ❌ Wrong - will cause N+1 queries
public function builder(): Builder
{
    return User::query(); // Missing ->with()
}</code></pre>
            <p class="text-slate-300 text-sm">
                <strong>Tip:</strong> Enable <code class="text-orange-400">throw_exception_on_unloaded_relationships</code> in config to catch N+1 issues during development.
            </p>
        </div>

        <!-- Benefits -->
        <div class="bg-gradient-to-r from-cyan-500/10 to-teal-500/10 rounded-xl p-6 border border-cyan-500/20">
            <h3 class="text-lg font-semibold text-white mb-4">Key Benefits</h3>
            <ul class="space-y-2 text-slate-300">
                <li class="flex items-start">
                    <svg class="w-5 h-5 text-cyan-400 mr-2 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                    <span><strong class="text-white">All Relationship Types</strong> — Supports hasOne, belongsTo, hasMany, belongsToMany, hasOneThrough, hasManyThrough, and nested relationships</span>
                </li>
                <li class="flex items-start">
                    <svg class="w-5 h-5 text-cyan-400 mr-2 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                    <span><strong class="text-white">Collection Formatting</strong> — Customize how collections are displayed with separators, limits, and formatters</span>
                </li>
                <li class="flex items-start">
                    <svg class="w-5 h-5 text-cyan-400 mr-2 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                    <span><strong class="text-white">Sortable & Searchable</strong> — All relationship columns can be sorted and searched</span>
                </li>
                <li class="flex items-start">
                    <svg class="w-5 h-5 text-cyan-400 mr-2 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                    <span><strong class="text-white">Nullable Support</strong> — Gracefully handles missing relationships with empty string fallback</span>
                </li>
            </ul>
        </div>
    </div>
</div>




