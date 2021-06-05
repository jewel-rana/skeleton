<?php


namespace Modules\Brand\Http\View;


use Illuminate\View\View;
use Modules\Brand\BrandService;
use Modules\Category\CategoryService;

class BrandComposer
{
    /**
     * The user repository implementation.
     *
     * @var
     */
    protected $brands;

    /**
     * Create a new profile composer.
     *
     * @param BrandService $brands
     */
    public function __construct( BrandService $brands)
    {
        $this->brands = $brands;
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
            'brand_lists' => $this->brands->getBrandDropdown(),
        ]);
    }
}
