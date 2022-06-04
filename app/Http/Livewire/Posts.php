<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Post;

class Posts extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $title, $body, $user_id;
    public $updateMode = false;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.posts.view', [
             //latest()
            'posts' => Post::select('posts.*', 'users.name As user_name') 
                        ->join('users', 'users.id', '=', 'posts.user_id')              
						->orWhere('title', 'LIKE', $keyWord)
						->orWhere('body', 'LIKE', $keyWord)
						->orWhere('user_id', 'LIKE', $keyWord)
						->paginate(10),
        ]);
    }
	
    public function cancel()
    {
        $this->resetInput();
        $this->updateMode = false;
    }
	
    private function resetInput()
    {		
		$this->title = null;
		$this->body = null;
		$this->user_id = null;
    }

    public function store()
    {
        $this->validate([
		'title' => 'required',
		'body' => 'required',
		'user_id' => 'required',
        ]);

        Post::create([ 
			'title' => $this-> title,
			'body' => $this-> body,
			'user_id' => $this-> user_id
        ]);
        
        $this->resetInput();
		$this->emit('closeModal');
		session()->flash('message', 'Post Successfully created.');
    }

    public function edit($id)
    {
        $record = Post::findOrFail($id);

        $this->selected_id = $id; 
		$this->title = $record-> title;
		$this->body = $record-> body;
		$this->user_id = $record-> user_id;
		
        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
		'title' => 'required',
		'body' => 'required',
		'user_id' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Post::find($this->selected_id);
            $record->update([ 
			'title' => $this-> title,
			'body' => $this-> body,
			'user_id' => $this-> user_id
            ]);

            $this->resetInput();
            $this->updateMode = false;
			session()->flash('message', 'Post Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            $record = Post::where('id', $id);
            $record->delete();
        }
    }
}
