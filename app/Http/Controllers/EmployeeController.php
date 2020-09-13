<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTicketRequest;
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
        return view('employee.dashboard');
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
}
