<?php

namespace App\Livewire\Event;

use App\Livewire\Forms\Event\FAQ\CreateForm;
use App\Models\EventFAQ;
use Livewire\Component;

class CreateEventFAQ extends Component
{
    /**
     * Define form object
     * @var CreateForm
     */
    public CreateForm $form;

    /**
     * Get the specific event collection
     * @var array|object
     */
    public array|object $event;

    /**
     * Define store for resource
     * @return void
     */
    public function store(): void
    {
        $this->form->validate();
        $isCreate = EventFAQ::create(attributes: $this->form->contract(id: $this->event->getKey()));
        $response = $isCreate ? 'Event FAQ added successfully' : 'Something went wrong';
        flash()->success(message: $response);
        (__FUNCTION__ === 'store')  ? redirect(request()->header('Referer')) : '';
    }
    public function render()
    {
        return view('livewire.event.create-event-faq');
    }
}
