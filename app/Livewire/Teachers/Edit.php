<?php

namespace App\Livewire\Teachers;

use App\Models\School;
use App\Models\Teacher;
use Livewire\Component;

class Edit extends Component
{
    public $teacherId;
    public $school_id;
    public $name;
    public $email;
    public $phone;
    public $subject;

    protected $rules = [
        'school_id' => 'required|exists:schools,id',
        'name' => 'required|string|max:255',
        'email' => 'required|email',
        'phone' => 'nullable|string',
        'subject' => 'nullable|string',
    ];

    public function mount($id)
    {
        $teacher = Teacher::findOrFail($id);
        $this->teacherId = $teacher->id;
        $this->school_id = $teacher->school_id;
        $this->name = $teacher->name;
        $this->email = $teacher->email;
        $this->phone = $teacher->phone;
        $this->subject = $teacher->subject;
    }

    public function update()
    {
        $this->rules['email'] = 'required|email|unique:teachers,email,' . $this->teacherId;
        $this->validate();

        $teacher = Teacher::find($this->teacherId);
        $teacher->update([
            'school_id' => $this->school_id,
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'subject' => $this->subject,
        ]);

        session()->flash('message', 'Teacher updated successfully.');
        return redirect()->route('teachers.index');
    }

    public function render()
    {
        $schools = School::all();
        return view('livewire.teachers.edit', compact('schools'));
    }
}
