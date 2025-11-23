<?php

namespace App\Livewire\Assignments;

use App\Models\Assignment;
use App\Models\Classes;
use Livewire\Component;

class Edit extends Component
{
    public $assignmentId;

    public $class_id;

    public $title;

    public $description;

    public $due_date;

    protected $rules = [
        'class_id' => 'required|exists:classes,id',
        'title' => 'required|string|max:255',
        'description' => 'nullable|string',
        'due_date' => 'nullable|date',
    ];

    public function mount($id)
    {
        $assignment = Assignment::findOrFail($id);
        $this->assignmentId = $assignment->id;
        $this->class_id = $assignment->class_id;
        $this->title = $assignment->title;
        $this->description = $assignment->description;
        $this->due_date = $assignment->due_date ? $assignment->due_date->format('Y-m-d') : null;
    }

    public function update()
    {
        $this->validate();

        $assignment = Assignment::find($this->assignmentId);
        $assignment->update([
            'class_id' => $this->class_id,
            'title' => $this->title,
            'description' => $this->description,
            'due_date' => $this->due_date,
        ]);

        session()->flash('message', 'Assignment updated successfully.');

        return redirect()->route('assignments.index');
    }

    public function render()
    {
        $classes = Classes::all();

        return view('livewire.assignments.edit', compact('classes'))->layout('layouts.app');
    }
}
