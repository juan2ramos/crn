<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateLeadsRequest;
use App\Models\Service;
use App\Notifications\NewLead;
use App\User;
use Illuminate\Support\Facades\Notification;

class HomeController extends Controller
{
    public function index()
    {
        $services = Service::all();
        return view('front.home', compact('services'));
    }

    public function createLead(CreateLeadsRequest $request)
    {
        $lead = $request->createLead();
        $this->sendNotification($lead);
        return redirect()->back()->with(['success' => 1]);
    }

    private function sendNotification($lead)
    {
        Notification::send(new User(), new NewLead($lead));
    }

}
