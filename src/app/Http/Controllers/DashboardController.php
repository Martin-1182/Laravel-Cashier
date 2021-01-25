<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function subscribe()
    {
        return view('cashier.subscribe', [
            'intent' => auth()->user()->createSetupIntent(),
        ]);
    }

    public function post(Request $request)
    {
        auth()->user()->newSubscription('cashier', $request->plan)->create($request->paymentMethod);

        return redirect('/dashboard');
    }
}
