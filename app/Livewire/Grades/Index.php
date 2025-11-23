<?php

namespace App\Livewire\Grades;

use App\Models\Grade;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $deleteId;

    public function confirmDelete($id)
    {
        $this->deleteId = $id;
    }

    public function delete()
    {
        if ($this->deleteId) {
            Grade::find($this->deleteId)->delete();
            $this->deleteId = null;
            session()->flash('message', 'Grade deleted successfully.');
        }
    }

    public function render()
    {
        $grades = Grade::with(['student', 'class'])->paginate(10);
        return view('livewire.grades.index', compact('grades'));
    }
}
