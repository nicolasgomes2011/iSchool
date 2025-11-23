<?php

namespace App\Livewire\Classes;

use App\Models\Classes as ClassModel;
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
            ClassModel::find($this->deleteId)->delete();
            $this->deleteId = null;
            session()->flash('message', 'Class deleted successfully.');
        }
    }

    public function render()
    {
        $classes = ClassModel::with(['school', 'teacher'])
            ->where('name', 'like', '%' . $this->search . '%')
            ->paginate(10);

        return view('livewire.classes.index', compact('classes'));
    }
}
