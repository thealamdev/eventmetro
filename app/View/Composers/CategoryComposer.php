<?php

namespace App\View\Composers;

use App\Models\Category;
use Illuminate\View\View;

class CategoryComposer
{
    /**
     * Define property categories
     * @var ?array|object
     */
    public array|object|null $categories;

    /**
     * Create a new profile composer.
     */
    public function __construct()
    {
        $this->categories = Category::query()->get();
    }

    /**
     * Bind data to the view.
     */
    public function compose(View $view): void
    {
        $view->with('categories', $this->categories);
    }
}
