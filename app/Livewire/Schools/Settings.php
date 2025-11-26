<?php

namespace App\Livewire\Schools;

use App\Models\School;
use Livewire\Component;

class Settings extends Component
{
    public $schoolId;

    public $settings = [];

    public function mount($id)
    {
        $school = School::findOrFail($id);
        $this->schoolId = $school->id;
        $this->settings = $school->settings ? json_decode($school->settings, true) : [];
    }

    public function save()
    {
        $school = School::find($this->schoolId);
        $school->update([
            'settings' => json_encode($this->settings),
        ]);

        session()->flash('message', 'Settings saved successfully.');

        return redirect()->route('schools.index');
    }

    public function render()
    {
        return view('livewire.schools.settings')->layout('layouts.app');
    }
}
