<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTicketRequest;
use App\Http\Requests\UpdatePasswordRequest;
use App\Models\Ticket;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function dashboardView()
    {
        $tickets = Ticket::orderBy('created_at', 'desc')->limit(10)->get();
        return view('employee.dashboard', compact('tickets'));
    }
    public function profileView()
    {
        return view('employee.profile');
    }

    public function createTicket(CreateTicketRequest $request)
    {
        Ticket::create([
            'content' => $request->input('content'),
            'employee_id' => auth()->id()
        ]);
        return redirect('employee')->with('message', 'Successfully created ticket');
    }

    public function ticketView(Ticket $ticket)
    {
        return view('employee.ticket', compact('ticket'));
    }

    public function changePassword(UpdatePasswordRequest $request)
    {
        $user = auth()->user();
        $user->password = $request->input('password');
        $user->save();

        return redirect()->back()->with('message', 'successfully changed password');
    }
}
