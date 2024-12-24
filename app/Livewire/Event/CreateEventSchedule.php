<?php

namespace App\Livewire\Event;

use App\Livewire\Forms\Event\Schedule\CreateForm;
use App\Models\Event;
use App\Models\EventSchedule;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateEventSchedule extends Component
{
    use WithFileUploads;

    /**
     * Define form object
     * @var CreateForm
     */
    public  CreateForm $form;

    /**
     * Get the specific event collection
     * @var array|object
     */
    public array|object $event;

    /**
     * Define the schedules
     * @var array|object
     */
    public array|object $schedules;

    public function store(): void
    {
        $this->form->validate(rules: $this->form->rules(), attributes: $this->form->attributes());
        $isCreate = EventSchedule::create($this->form->contract($this->event->getKey()));
        $response = $isCreate ? 'Event Schedule has been added' : 'Something went wrong';
        flash()->success($response);
        $this->mount();
        (__FUNCTION__ === 'store') ? redirect(request()->header('Referer')) : '';
    }

    /**
     * Define next redirect method
     */
    public function next()
    {
        $this->store();
        return redirect(route('admin.event.agenda.create', ['event' => $this->event->getKey()]));
    }

    /**
     * Define mount method
     * @return void
     */
    public function mount(): void
    {
        $this->schedules = EventSchedule::query()->where('event_id', $this->event->getKey())->get();
    }

    /**
     * Increment the form length
     * @return void
     */
    public function formIncrement(): void
    {
        $this->form->len[uniqid()] = ['speaker' => '', 'designation' => '', 'bio' => '', 'image' => null];
    }

    /**
     * Decrement the form length
     * @param mixed $key
     * @return void
     */
    public function formDecrement($key): void
    {
        unset($this->form->len[$key]);
    }

    public function render()
    {
        return view('livewire.event.create-event-schedule');
    }
}
