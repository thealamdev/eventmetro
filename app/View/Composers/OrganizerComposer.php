<?php

namespace App\View\Composers;

use App\Models\User;
use App\Models\Category;
use Illuminate\View\View;
use Spatie\Permission\Models\Role;

class OrganizerComposer
{
    /**
     * Define property organizers
     * @var ?array|object
     */
    public array|object|null $organizers;

    /**
     * Create a new profile composer.
     */
    public function __construct()
    {
        $response = Role::query()->with('users')->where('name', 'organizer')->first();
        $this->organizers = $response->users->map(fn($query) => (object) [
            'id' => $query->id,
            'name' => $query->name,
        ]);
    }
    /**
     * Bind data to the view.
     */
    public function compose(View $view): void
    {
        $view->with('organizers', $this->organizers);
    }
}
