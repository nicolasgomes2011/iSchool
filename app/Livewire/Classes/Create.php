<?php

namespace App\Livewire\Classes;

use App\Models\Classes as ClassModel;
use App\Models\School;
use App\Models\Teacher;
use Livewire\Component;

class Create extends Component
{
    public $school_id;

    public $teacher_id;

    public $name;

    public $grade_level;

    public $description;

    protected $rules = [
        'school_id' => 'required|exists:schools,id',
        'teacher_id' => 'nullable|exists:teachers,id',
        'name' => 'required|string|max:255',
        'grade_level' => 'nullable|string',
        'description' => 'nullable|string',
    ];

    public function save()
    {
        $this->validate();

        ClassModel::create([
            'school_id' => $this->school_id,
            'teacher_id' => $this->teacher_id,
            'name' => $this->name,
            'grade_level' => $this->grade_level,
            'description' => $this->description,
        ]);

        session()->flash('message', 'Class created successfully.');

        return redirect()->route('classes.index');
    }

    public function render()
    {
        $schools = School::all();
        $teachers = Teacher::all();

        return view('livewire.classes.create', compact('schools', 'teachers'))->layout('layouts.app');
    }
}
