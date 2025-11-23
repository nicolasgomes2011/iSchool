<?php

namespace App\Livewire\Contents;

use App\Models\Content;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $search = '';
    public $deleteId;

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function confirmDelete($id)
    {
        $this->deleteId = $id;
    }

    public function delete()
    {
        if ($this->deleteId) {
            Content::find($this->deleteId)->delete();
            $this->deleteId = null;
            session()->flash('message', 'Content deleted successfully.');
        }
    }

    public function render()
    {
        $contents = Content::with('class')
            ->where('title', 'like', '%' . $this->search . '%')
            ->paginate(10);

        return view('livewire.contents.index', compact('contents'));
    }
}
