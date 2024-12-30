<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithoutURLPagination;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Title;

class Postlist extends Component
{
use WithPagination,WithoutURLPagination;

  #[Title('Livewire 3 SPA CRUD - Post List')]
    
  public $searchTerm = null;
  public $activePageNumber = 1;


    public function fetchPosts(){
      return $posts = Post::where('title','like','%' . $this->searchTerm .'%')
        ->orwhere('content','like','%' . $this->searchTerm .'%')
        ->orderBy('id', 'desc')->paginate(5);
    }

    public function render()
    {
       $posts = $this->fetchPosts();
        return view('livewire.postlist',compact('posts'));
    }

    public function deletePost(Post $post)
    {
        if(Storage::exists($post->featured_image)){
            Storage::delete($post->featured_image);
        }

       $deleResponse = $post->delete();

       if( $deleResponse){
        session()->flash('success','Post deleted successfully');
       }

       $posts = $this->fetchPosts();
        if($posts->isEmpty() && $this->activePageNumber>1){
            #Redirect to the previous page
            $this->gotoPage($this->activePageNumber-1);
        }
       # Redirect to the active page
       $this->gotoPage($this->activePageNumber);
       
    }

    /**
     * Function to track active page from pagination 
     */

     public function updatingPage($pageNumber){
        $this->activePageNumber = $pageNumber;
     }

}
