<?php

namespace App\Livewire\Forms\Event\FAQ;

use Livewire\Attributes\Validate;
use Livewire\Form;

class CreateForm extends Form
{
    /**
     * Define property $question
     * @var ?string
     */
    public ?string $question = null;

    /**
     * Define property $answer
     * @var ?string
     */
    public ?string $answer = null;

    /**
     * Define validation rules
     * @return array
     */
    public function rules(): array
    {
        return [
            'question'  => ['required', 'string'],
            'answer'    => ['required']
        ];
    }

    public function contract(?string $id): array
    {
        return [
            'event_id'  => $id,
            'question'  => $this->question,
            'answer'    => $this->answer,
        ];
    }
}
