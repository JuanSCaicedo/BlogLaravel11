<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Post;

class PostAll extends Component
{
    use WithPagination;
    protected $paginationTheme = "bootstrap";

    public $search;

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $posts = Post::where('name', 'LIKE', '%' . $this->search . '%')
        ->latest('id')
        ->paginate();

        return view('livewire.admin.post-all', compact('posts'));
    }
}
