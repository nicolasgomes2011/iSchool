<?php

namespace App\Livewire\Assignments;

use App\Models\Assignment;
use App\Models\Classes;
use Livewire\Component;

class Create extends Component
{
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

    public function save()
    {
        $this->validate();

        Assignment::create([
            'class_id' => $this->class_id,
            'title' => $this->title,
            'description' => $this->description,
            'due_date' => $this->due_date,
        ]);

        session()->flash('message', 'Assignment created successfully.');
        return redirect()->route('assignments.index');
    }

    public function render()
    {
        $classes = Classes::all();
        return view('livewire.assignments.create', compact('classes'));
    }
}
