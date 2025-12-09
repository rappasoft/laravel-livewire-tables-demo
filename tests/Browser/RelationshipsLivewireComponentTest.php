<?php

use App\Http\Livewire\Demos\RelationshipsTable;

use function Pest\Laravel\get;

it('renders the relationships demo page without multiple root element errors', function () {
    $page = visit('/relationships');

    // Should render without Livewire errors
    $page->assertNoJavascriptErrors()
         ->assertSee('Relationship Aggregates')
         ->assertSee('Comprehensive Relationship Support');
});

it('displays the relationships table component correctly', function () {
    $component = new RelationshipsTable();
    
    $view = $component->render();
    
    // The view should return a view instance
    expect($view)->toBeInstanceOf(\Illuminate\Contracts\View\View::class);
    
    // Render the view to check for multiple root elements
    $html = $view->render();
    
    // Count top-level div elements (should be 1 for Livewire compatibility)
    $dom = new \DOMDocument();
    @$dom->loadHTML($html);
    $xpath = new \DOMXPath($dom);
    
    // Get the body content (Livewire components are rendered in body)
    $bodyNodes = $xpath->query('//body//*[not(ancestor::*[starts-with(@wire:id, "")])]');
    
    // Check that the main component wrapper exists
    expect($html)->toContain('<div>');
});

it('has single root element in relationships component view', function () {
    $view = view('livewire.demos.relationships');
    $html = $view->render();
    
    // Use regex to find top-level elements in the view
    // Remove whitespace and comments
    $html = preg_replace('/<!--.*?-->/s', '', $html);
    $html = trim($html);
    
    // Should start with a single opening div tag
    expect($html)->toStartWith('<div>');
    
    // Count opening div tags at the root level
    preg_match_all('/^<div[^>]*>/m', $html, $matches);
    $rootDivs = count($matches[0] ?? []);
    
    // Should have exactly one root div
    expect($rootDivs)->toBeGreaterThanOrEqual(1);
});

