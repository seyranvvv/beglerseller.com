<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Request;

class RequestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $objs = Request::orderBy('id', 'desc')

            ->paginate(10);

        return view('admin.requests.index')
            ->with([
                'objs' => $objs,
            ]);
    }
}
