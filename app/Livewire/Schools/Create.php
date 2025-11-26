<?php

namespace App\Livewire\Schools;

use App\Models\School;
use Livewire\Component;

class Create extends Component
{
    public $name;

    public $address;

    public $phone;

    public $email;

    public $settings;

    protected $rules = [
        'name' => 'required|string|max:255',
        'address' => 'nullable|string',
        'phone' => 'nullable|string',
        'email' => 'nullable|email',
        'settings' => 'nullable|string',
    ];

    public function save()
    {
        $this->validate();

        School::create([
            'name' => $this->name,
            'address' => $this->address,
            'phone' => $this->phone,
            'email' => $this->email,
            'settings' => $this->settings,
        ]);

        session()->flash('message', 'School created successfully.');

        return redirect()->route('schools.index');
    }

    public function render()
    {
        return view('livewire.schools.create')->layout('layouts.app');
    }
}
