<?php

namespace App\Livewire\Teachers;

use App\Models\School;
use App\Models\Teacher;
use Livewire\Component;

class Create extends Component
{
    public $school_id;

    public $name;

    public $email;

    public $phone;

    public $subject;

    protected $rules = [
        'school_id' => 'required|exists:schools,id',
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:teachers,email',
        'phone' => 'nullable|string',
        'subject' => 'nullable|string',
    ];

    public function save()
    {
        $this->validate();

        Teacher::create([
            'school_id' => $this->school_id,
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'subject' => $this->subject,
        ]);

        session()->flash('message', 'Teacher created successfully.');

        return redirect()->route('teachers.index');
    }

    public function render()
    {
        $schools = School::all();

        return view('livewire.teachers.create', compact('schools'))->layout('layouts.app');
    }
}
