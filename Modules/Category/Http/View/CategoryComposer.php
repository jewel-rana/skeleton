<?php


namespace Modules\Category\Http\View;


use Illuminate\View\View;
use Modules\Category\CategoryService;

class CategoryComposer
{
    /**
     * The user repository implementation.
     *
     * @var
     */
    protected $categories;

    /**
     * Create a new profile composer.
     *
     * @param  CategoryService $categories
     * @return void
     */
    public function __construct( CategoryService $categories)
    {
        $this->categories = $categories;
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with([
            'category_lists' => $this->categories->getCategoryDropdown(),
        ]);
    }
}
