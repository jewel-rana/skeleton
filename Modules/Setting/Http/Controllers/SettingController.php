<?php

namespace Modules\Setting\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Modules\Setting\Entities\Option;
use Modules\Setting\OptionServiceInterface;

class SettingController extends Controller
{
    /**
     * @var OptionServiceInterface
     */
    private $option;

    public function __construct(OptionServiceInterface $optionService)
    {
        $this->option = $optionService;
    }
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('setting::index')->withTitle('Settings');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $label = '';
        $msg = '';
        if( isset( $_POST['tab'] ) ) :
            $this->option->save($request->except('tab', '_token', 'id'), $request->tab);
        else :
            $label = 'error';
            $msg = 'Sorry! Option cannot be updated.';
        endif;

        return redirect()->route('setting.index', ['tab' => $request->tab ])->with(['message.label' => $label, 'message.content' => $msg]);
    }

    public function _option_exist( $key )
    {
        $where = ['field' => $key];
        $option = Option::where( $where )->first();

        return ( $option ) ? true : false;
    }
}
