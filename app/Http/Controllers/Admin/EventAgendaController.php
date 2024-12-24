<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\EventAgenda;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Gate;
use App\Models\Event;

class EventAgendaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        Gate::authorize('viewAny',  EventAgenda::class);
        return view("eventAgenda.index");
    }

    /**
     * Display a listing of the data table resource.
     */
    public function displayListDatatable()
    {
        Gate::authorize('viewAny',  EventAgenda::class);

        $eventAgenda = Cache::remember('eventAgenda_list', 60 * 60, function () {
            return EventAgenda::get();
        });
    }

    /**
     * Show the form for creating a new resource.
     * @param Event $event
     */
    public function create(?string $id)
    {
        $event = Event::query()->where(column: 'id', operator: $id)
            ->with(relations: ['schedules'])
            ->with(['agendas' => fn($query) => $query->with('image')])
            ->first();
        Gate::authorize('create', EventAgenda::class);
        return view('eventAgenda.create', compact('event'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        Gate::authorize('create', EventAgenda::class);
    }

    /**
     * Display the specified resource.
     */
    public function show(EventAgenda $eventAgenda)
    {
        //
        Gate::authorize('view',  $eventAgenda);
        return view('eventAgenda.show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(EventAgenda $eventAgenda)
    {
        Gate::authorize('update', $eventAgenda);
        return view('eventAgenda.edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, EventAgenda $eventAgenda)
    {
        Gate::authorize('update',  $eventAgenda);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(EventAgenda $eventAgenda)
    {
        Gate::authorize('delete',  $eventAgenda);
    }
}
