<?php

namespace App\Livewire\Classes;

use App\Models\Classes as ClassModel;
use App\Models\School;
use App\Models\Teacher;
use Livewire\Component;

class Edit extends Component
{
    public $classId;
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

    public function mount($id)
    {
        $class = ClassModel::findOrFail($id);
        $this->classId = $class->id;
        $this->school_id = $class->school_id;
        $this->teacher_id = $class->teacher_id;
        $this->name = $class->name;
        $this->grade_level = $class->grade_level;
        $this->description = $class->description;
    }

    public function update()
    {
        $this->validate();

        $class = ClassModel::find($this->classId);
        $class->update([
            'school_id' => $this->school_id,
            'teacher_id' => $this->teacher_id,
            'name' => $this->name,
            'grade_level' => $this->grade_level,
            'description' => $this->description,
        ]);

        session()->flash('message', 'Class updated successfully.');
        return redirect()->route('classes.index');
    }

    public function render()
    {
        $schools = School::all();
        $teachers = Teacher::all();
        return view('livewire.classes.edit', compact('schools', 'teachers'));
    }
}
