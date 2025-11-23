<?php

namespace App\Livewire\Students;

use App\Models\School;
use App\Models\Student;
use Livewire\Component;

class Edit extends Component
{
    public $studentId;
    public $school_id;
    public $name;
    public $email;
    public $phone;
    public $date_of_birth;

    protected $rules = [
        'school_id' => 'required|exists:schools,id',
        'name' => 'required|string|max:255',
        'email' => 'required|email',
        'phone' => 'nullable|string',
        'date_of_birth' => 'nullable|date',
    ];

    public function mount($id)
    {
        $student = Student::findOrFail($id);
        $this->studentId = $student->id;
        $this->school_id = $student->school_id;
        $this->name = $student->name;
        $this->email = $student->email;
        $this->phone = $student->phone;
        $this->date_of_birth = $student->date_of_birth ? $student->date_of_birth->format('Y-m-d') : null;
    }

    public function update()
    {
        $this->rules['email'] = 'required|email|unique:students,email,' . $this->studentId;
        $this->validate();

        $student = Student::find($this->studentId);
        $student->update([
            'school_id' => $this->school_id,
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'date_of_birth' => $this->date_of_birth,
        ]);

        session()->flash('message', 'Student updated successfully.');
        return redirect()->route('students.index');
    }

    public function render()
    {
        $schools = School::all();
        return view('livewire.students.edit', compact('schools'));
    }
}
