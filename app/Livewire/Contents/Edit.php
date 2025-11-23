<?php

namespace App\Livewire\Contents;

use App\Models\Classes;
use App\Models\Content;
use Livewire\Component;

class Edit extends Component
{
    public $contentId;
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

    public function mount($id)
    {
        $content = Content::findOrFail($id);
        $this->contentId = $content->id;
        $this->class_id = $content->class_id;
        $this->title = $content->title;
        $this->description = $content->description;
        $this->body = $content->body;
    }

    public function update()
    {
        $this->validate();

        $content = Content::find($this->contentId);
        $content->update([
            'class_id' => $this->class_id,
            'title' => $this->title,
            'description' => $this->description,
            'body' => $this->body,
        ]);

        session()->flash('message', 'Content updated successfully.');
        return redirect()->route('contents.index');
    }

    public function render()
    {
        $classes = Classes::all();
        return view('livewire.contents.edit', compact('classes'));
    }
}
