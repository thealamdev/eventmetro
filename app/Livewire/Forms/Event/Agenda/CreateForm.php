<?php

namespace App\Livewire\Forms\Event\Agenda;

use Livewire\Attributes\Validate;
use Livewire\Form;

class CreateForm extends Form
{
    /**
     * Define topic model
     * @var ?string
     */
    public ?string $topic = null;

    /**
     * Define startTime model
     * @var ?string
     */
    public ?string $startTime = null;

    /**
     * Define endTime model
     * @var ?string
     */
    public ?string $endTime = null;

    /**
     * Define description model
     * @var ?string
     */
    public ?string $description = null;

    /**
     * Define designation model
     * @var ?string
     */
    public ?string $designation = null;
    /**
     * Define speaker model
     * @var ?string
     */
    public $speaker;

    /**
     * Define image model
     * @var ?string
     */
    public $image;

    /**
     * Define validation rules
     * @return array
     */
    public function rules(): array
    {
        return [
            'topic'             => ['required', 'string'],
            'startTime'         => ['required'],
            'endTime'           => ['required'],
            'description'       => ['nullable', 'string'],
            'designation'       => ['nullable', 'string'],
            'speaker'           => ['nullable', 'string'],
            // 'image'             => ['nullable', 'image', 'mimes:jpg,jpeg,png', 'max:1024'],
        ];
    }

    /**
     * Define contract resources
     * @return array
     */
    public function contract(string $id): array
    {
        return [
            'event_id'          => $id,
            'topic'             => $this->topic,
            'start'             => $this->startTime,
            'end'               => $this->endTime,
            'description'       => $this->description,
            'designation'       => $this->designation,
            'speaker'           => $this->speaker,
            'image'             => $this->image
        ];
    }
}
