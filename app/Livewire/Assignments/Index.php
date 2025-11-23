<?php

namespace App\Livewire\Assignments;

use App\Models\Assignment;
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
            Assignment::find($this->deleteId)->delete();
            $this->deleteId = null;
            session()->flash('message', 'Assignment deleted successfully.');
        }
    }

    public function render()
    {
        $assignments = Assignment::with('class')
            ->where('title', 'like', '%' . $this->search . '%')
            ->paginate(10);

        return view('livewire.assignments.index', compact('assignments'));
    }
}
