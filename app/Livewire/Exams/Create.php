<?php

namespace App\Livewire\Exams;

use App\Models\Classes;
use App\Models\Exam;
use Livewire\Component;

class Create extends Component
{
    public $class_id;

    public $title;

    public $description;

    public $exam_date;

    protected $rules = [
        'class_id' => 'required|exists:classes,id',
        'title' => 'required|string|max:255',
        'description' => 'nullable|string',
        'exam_date' => 'nullable|date',
    ];

    public function save()
    {
        $this->validate();

        Exam::create([
            'class_id' => $this->class_id,
            'title' => $this->title,
            'description' => $this->description,
            'exam_date' => $this->exam_date,
        ]);

        session()->flash('message', 'Exam created successfully.');

        return redirect()->route('exams.index');
    }

    public function render()
    {
        $classes = Classes::all();

        return view('livewire.exams.create', compact('classes'))->layout('layouts.app');
    }
}
