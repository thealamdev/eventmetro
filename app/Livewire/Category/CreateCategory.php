<?php

namespace App\Livewire\Category;

use App\Models\Category;
use Livewire\Component;

class CreateCategory extends Component
{
    /**
     * Define title
     * @var ?string
     */
    public ?string $title = null;

    /**
     * Define status
     * @var ?string
     */
    public ?string $status = null;

    public function render()
    {
        return view('livewire.category.create-category');
    }

    /**
     * Define the store of resources
     * @return void
     */
    public function store(): void
    {
        $this->rules();
        $instance = Category::query()->create($this->contract());
        $response = $instance ? 'Data has been stored successfully' : 'Something went wrong';
        flash()->success($response);
        $this->reset();
    }

    /**
     * Define contract for the resources
     * @return array
     */
    public function contract(): array
    {
        return [
            'title'     => $this->title,
            'status'    => $this->status,
        ];
    }

    /**
     * Define validation rules
     * @return void
     */
    public function rules(): void
    {
        $this->validate([
            'title' => 'required',
            'status' => 'required'
        ]);
    }
}
