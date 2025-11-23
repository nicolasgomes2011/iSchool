<?php

namespace App\Livewire\Students;

use App\Models\Student;
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
            Student::find($this->deleteId)->delete();
            $this->deleteId = null;
            session()->flash('message', 'Student deleted successfully.');
        }
    }

    public function render()
    {
        $students = Student::with('school')
            ->where('name', 'like', '%'.$this->search.'%')
            ->orWhere('email', 'like', '%'.$this->search.'%')
            ->paginate(10);

        return view('livewire.students.index', compact('students'))->layout('layouts.app');
    }
}
