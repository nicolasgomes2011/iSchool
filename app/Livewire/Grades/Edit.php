<?php

namespace App\Livewire\Grades;

use App\Models\Classes;
use App\Models\Grade;
use App\Models\Student;
use Livewire\Component;

class Edit extends Component
{
    public $gradeId;

    public $student_id;

    public $class_id;

    public $grade;

    public $notes;

    protected $rules = [
        'student_id' => 'required|exists:students,id',
        'class_id' => 'required|exists:classes,id',
        'grade' => 'required|numeric|min:0|max:100',
        'notes' => 'nullable|string',
    ];

    public function mount($id)
    {
        $grade = Grade::findOrFail($id);
        $this->gradeId = $grade->id;
        $this->student_id = $grade->student_id;
        $this->class_id = $grade->class_id;
        $this->grade = $grade->grade;
        $this->notes = $grade->notes;
    }

    public function update()
    {
        $this->validate();

        $grade = Grade::find($this->gradeId);
        $grade->update([
            'student_id' => $this->student_id,
            'class_id' => $this->class_id,
            'grade' => $this->grade,
            'notes' => $this->notes,
        ]);

        session()->flash('message', 'Grade updated successfully.');

        return redirect()->route('grades.index');
    }

    public function render()
    {
        $students = Student::all();
        $classes = Classes::all();

        return view('livewire.grades.edit', compact('students', 'classes'))->layout('layouts.app');
    }
}
