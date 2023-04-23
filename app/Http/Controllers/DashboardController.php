<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{

    public function index(Request $request)
    {
        $search = $request->get('search');

        $userReminders = Auth::user()
            ->reminders()
            ->when($search, function($query) use ($search) {
                $query->where('title', 'like', "%$search%");
                $query->orWhere('description', 'like', "%$search%");
            })
            ->with(['webhook'])
            ->paginate(5);

        $userWebhooks = Auth()->user()->webhooks;

        return view('dashboard.index', [
            'userReminders' => $userReminders,
            'userWebhooks' => $userWebhooks
        ]);
    }

    public function changePassword()
    {
        return view('dashboard.changePassword');
    }

}
