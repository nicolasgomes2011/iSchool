<?php

namespace App\Livewire\Exams;

use App\Models\Exam;
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
            Exam::find($this->deleteId)->delete();
            $this->deleteId = null;
            session()->flash('message', 'Exam deleted successfully.');
        }
    }

    public function render()
    {
        $exams = Exam::with('class')
            ->where('title', 'like', '%' . $this->search . '%')
            ->paginate(10);

        return view('livewire.exams.index', compact('exams'));
    }
}
