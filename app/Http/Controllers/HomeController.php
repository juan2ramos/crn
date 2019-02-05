<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateLeadsRequest;
use App\Models\Service;

class HomeController extends Controller
{
    public function index()
    {
        $services = Service::all();
        return view('front.home', compact('services'));
    }

    public function createLead(CreateLeadsRequest $request)
    {
        $request->createLead();
        return redirect()->back()->with(['success' => 1]);
    }

}
