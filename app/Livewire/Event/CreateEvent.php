<?php

namespace App\Livewire\Event;

use App\Enums\Bucket;
use App\Models\Event;
use Livewire\Component;
use App\Local\FileStorage;
use Livewire\WithFileUploads;
use Illuminate\Http\RedirectResponse;
use App\Livewire\Forms\Event\CreateForm;

class CreateEvent extends Component
{
    use WithFileUploads;

    /**
     * Define form object 
     * @var CreateForm
     */
    public CreateForm $form;

    /**
     * Define method to store the resources
     * @return RedirectResponse
     */
    public function store()
    {

        $this->form->validate();
        $isCreate = Event::create(attributes: $this->form->contract());
        $this->form->image && FileStorage::store(file: $this->form->image, path: Bucket::EVENT->value, model: Event::class, key: $isCreate->getKey());
        $response = $isCreate ? 'Data has been stored successfully' : 'Something went wrong';
        flash()->success(message: $response);
        return redirect(route('admin.event.schedule.create', ['event' => $isCreate->getKey()]));
    }

    public function render()
    {
        return view('livewire.event.create-event');
    }
}
