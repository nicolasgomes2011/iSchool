<?php

namespace App\Livewire\Schools;

use App\Models\School;
use Livewire\Component;

class Edit extends Component
{
    public $schoolId;

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

    public function mount($id)
    {
        $school = School::findOrFail($id);
        $this->schoolId = $school->id;
        $this->name = $school->name;
        $this->address = $school->address;
        $this->phone = $school->phone;
        $this->email = $school->email;
        $this->settings = $school->settings;
    }

    public function update()
    {
        $this->validate();

        $school = School::find($this->schoolId);
        $school->update([
            'name' => $this->name,
            'address' => $this->address,
            'phone' => $this->phone,
            'email' => $this->email,
            'settings' => $this->settings,
        ]);

        session()->flash('message', 'School updated successfully.');

        return redirect()->route('schools.index');
    }

    public function render()
    {
        return view('livewire.schools.edit')->layout('layouts.app');
    }
}
