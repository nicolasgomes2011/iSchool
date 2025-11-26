<?php

namespace App\Livewire\Contents;

use App\Models\Classes;
use App\Models\Content;
use Livewire\Component;

class Create extends Component
{
    public $class_id;

    public $title;

    public $description;

    public $body;

    protected $rules = [
        'class_id' => 'required|exists:classes,id',
        'title' => 'required|string|max:255',
        'description' => 'nullable|string',
        'body' => 'nullable|string',
    ];

    public function save()
    {
        $this->validate();

        Content::create([
            'class_id' => $this->class_id,
            'title' => $this->title,
            'description' => $this->description,
            'body' => $this->body,
        ]);

        session()->flash('message', 'Content created successfully.');

        return redirect()->route('contents.index');
    }

    public function render()
    {
        $classes = Classes::all();

        return view('livewire.contents.create', compact('classes'))->layout('layouts.app');
    }
}
