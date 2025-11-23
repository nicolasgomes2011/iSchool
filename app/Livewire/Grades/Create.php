<?php

namespace App\Livewire\Grades;

use App\Models\Classes;
use App\Models\Grade;
use App\Models\Student;
use Livewire\Component;

class Create extends Component
{
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

    public function save()
    {
        $this->validate();

        Grade::create([
            'student_id' => $this->student_id,
            'class_id' => $this->class_id,
            'grade' => $this->grade,
            'notes' => $this->notes,
        ]);

        session()->flash('message', 'Grade created successfully.');
        return redirect()->route('grades.index');
    }

    public function render()
    {
        $students = Student::all();
        $classes = Classes::all();
        return view('livewire.grades.create', compact('students', 'classes'));
    }
}
