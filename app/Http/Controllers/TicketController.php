<?php

namespace App\Http\Controllers;

use App\Category;
use App\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TicketController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create()
    {
        $categories = Category::all();
        return view('tickets.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'title'=>'required',
            'category'=>'required',
            'priority'=>'required',
            'message'=>'required',
            ]);

        $ticket = new Ticket([
            'title'=> $request->input('title'),
            'user_id'=> Auth::user()->id,
            'ticket_id'=> date('Y').date('m').'.'.strtoupper(str_random(4)),
            'category_id'=>$request->input('category'),
            'priority' => $request->input('priority'),
            'message'=>$request->input('message'),
            'status' => 'Открыта',

        ]);
        $ticket->save();

        return redirect()->back()->with("status", "Служебная записка создана: #$ticket->ticket_id");
    }
    public function userTickets()
    {
        $tickets = Ticket::where('user_id',Auth::user()->id)->paginate(20);
        $categories = Category::all();

        return view('tickets.user_tickets', compact('tickets','categories'));
    }
    public function show($ticket_id)
    {
        $ticket = Ticket::with('category')->where('ticket_id',$ticket_id)->firstOrFail();

        return view('tickets.show', compact('ticket'));
    }

    public function index()
    {
        $tickets = Ticket::paginate(10);
        $categories = Category::all();

        return view('tickets.index', compact('tickets','categories'));
    }
    public function close($ticket_id)
    {
        $ticket = Ticket::where('ticket_id', $ticket_id)->firstOrFail();

        $ticket->status = 'Закрыта';
        $ticket->save();

        return redirect()->back()->with("status", "Документ закрыт");
    }
}
