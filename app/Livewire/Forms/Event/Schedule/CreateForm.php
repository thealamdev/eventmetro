<?php

namespace App\Livewire\Forms\Event\Schedule;

use Livewire\Attributes\Validate;
use Livewire\Form;

class CreateForm extends Form
{
    /**
     * Define form len
     * @var array
     */
    public array $len = [];

    /**
     * Define slot
     * @var ?string
     */
    public ?string $slot = null;

    /**
     * Summary of date
     * @var ?string
     */
    public ?string $date = null;

    /**
     * Define startTime
     * @var ?string
     */
    public ?string $startTime = null;

    /**
     * Define endTime
     * @var ?string
     */
    public ?string $endTime = null;

    /**
     * Define location
     * @var ?string
     */
    public ?string $location = null;

    /**
     * Define street
     * @var ?string
     */
    public ?string $street = null;

    /**
     * Define city
     * @var ?string
     */
    public ?string $city = null;

    /**
     * Define state
     * @var ?string
     */
    public ?string $state = null;

    /**
     * Define zip
     * @var ?string
     */
    public ?string $zip = null;

    /**
     * Define the validation rules
     * @return array
     */
    public function rules(): array
    {
        return [
            'slot'              => ['required'],
            'date'              => ['required'],
            'startTime'         => ['required'],
            'endTime'           => ['required'],
            'location'          => ['required'],
            'street'            => ['required'],
            'city'              => ['required'],
            'state'             => ['required'],
            'zip'               => ['required'],
            'len.*.speaker'     => ['required'],
            'len.*.designation' => ['required'],
            'len.*.bio'         => ['required'],
            'len.*.image'       => ['nullable', 'image', 'mimes:jpg, png, jpeg', 'max:1024'],
        ];
    }

    /**
     * Define the form contract
     * @param ?string $id
     * @return array
     */
    public function contract(?string $id): array
    {
        return [
            'slot'      => $this->slot,
            'event_id'  => $id,
            'date'      => $this->date,
            'start'     => $this->startTime,
            'end'       => $this->endTime,
            'location'  => $this->location,
            'street'    => $this->street,
            'city'      => $this->city,
            'state'     => $this->state,
            'zip'       => $this->zip,
        ];
    }

    public function attributes(): array
    {
        return [
            'len.*.speaker'         => 'speaker',
            'len.*.designation'     => 'designation',
            'len.*.bio'             => 'bio',
            'len.*.image'           => 'image'
        ];
    }
}
