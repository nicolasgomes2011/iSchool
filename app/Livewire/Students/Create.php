<?php

namespace App\Livewire\Students;

use App\Models\School;
use App\Models\Student;
use Livewire\Component;

class Create extends Component
{
    public $school_id;
    public $name;
    public $email;
    public $phone;
    public $date_of_birth;

    protected $rules = [
        'school_id' => 'required|exists:schools,id',
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:students,email',
        'phone' => 'nullable|string',
        'date_of_birth' => 'nullable|date',
    ];

    public function save()
    {
        $this->validate();

        Student::create([
            'school_id' => $this->school_id,
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'date_of_birth' => $this->date_of_birth,
        ]);

        session()->flash('message', 'Student created successfully.');
        return redirect()->route('students.index');
    }

    public function render()
    {
        $schools = School::all();
        return view('livewire.students.create', compact('schools'));
    }
}
