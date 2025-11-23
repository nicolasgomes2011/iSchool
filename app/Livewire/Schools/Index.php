<?php

namespace App\Livewire\Schools;

use App\Models\School;
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
            School::find($this->deleteId)->delete();
            $this->deleteId = null;
            session()->flash('message', 'School deleted successfully.');
        }
    }

    public function render()
    {
        $schools = School::where('name', 'like', '%' . $this->search . '%')
            ->orWhere('email', 'like', '%' . $this->search . '%')
            ->paginate(10);

        return view('livewire.schools.index', compact('schools'));
    }
}
