<?php

namespace App\Livewire\Exams;

use App\Models\Classes;
use App\Models\Exam;
use Livewire\Component;

class Edit extends Component
{
    public $examId;
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

    public function mount($id)
    {
        $exam = Exam::findOrFail($id);
        $this->examId = $exam->id;
        $this->class_id = $exam->class_id;
        $this->title = $exam->title;
        $this->description = $exam->description;
        $this->exam_date = $exam->exam_date ? $exam->exam_date->format('Y-m-d') : null;
    }

    public function update()
    {
        $this->validate();

        $exam = Exam::find($this->examId);
        $exam->update([
            'class_id' => $this->class_id,
            'title' => $this->title,
            'description' => $this->description,
            'exam_date' => $this->exam_date,
        ]);

        session()->flash('message', 'Exam updated successfully.');
        return redirect()->route('exams.index');
    }

    public function render()
    {
        $classes = Classes::all();
        return view('livewire.exams.edit', compact('classes'));
    }
}
