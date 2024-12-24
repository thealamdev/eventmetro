<?php

namespace App\Livewire\Event;

use App\Enums\Bucket;
use App\Local\FileStorage;
use Livewire\Component;
use App\Models\EventSchedule;
use App\Livewire\Forms\Event\Agenda\CreateForm;
use App\Models\Event;
use App\Models\EventAgenda;
use Illuminate\Contracts\View\View;
use Livewire\WithFileUploads;

class CreateEventAgenda extends Component
{
    use WithFileUploads;

    use FileStorage;

    /**
     * Define Form event
     * @var CreateForm $form
     */
    public CreateForm $form;

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
        $this->form->validate();
        $isCreate = EventAgenda::create($this->form->contract($this->event->getKey()));
        $response = $isCreate ? 'Event Agent added successfully' : 'Something went wrong';
        FileStorage::store(file: $this->form->image, path: Bucket::SPEAKER->value, model: EventAgenda::class, key: $isCreate->getKey());
        flash()->success(message: $response);
        (__FUNCTION__ === 'store')  ? redirect(request()->header('Referer')) : '';
    }

    /**
     * Define next rendering
     */
    public function next()
    {
        $this->store();
        return redirect(route('admin.event.faq.create', ['event' => $this->event->getKey()]));
    }

    public function render()
    {
        return view('livewire.event.create-event-agenda');
    }
}
