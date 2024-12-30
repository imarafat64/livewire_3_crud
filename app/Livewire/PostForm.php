<?php

namespace App\Livewire;

                       
                    
use App\Models\Post;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Storage;


class PostForm extends Component
{
  

    use WithFileUploads;

    #[Title('Livewire 3 SPA CRUD - Create Post')] 
    
    public $post = null;
    public $isView = false;


   #[Validate('required', message: 'Post title is required')] 
   #[Validate('min:3', message: 'Post title must be 3 char long')] 
   public $title;

   #[Validate('required', message: 'Post content is required')] 
   public $content;

 


   public $featuredImage;

   public function mount(Post $post){
      $this->isView = request()->routeIs('posts.view');

      if($post->id){

             $this->post = $post;
             $this->title = $post->title;
             $this->content = $post->content;
      }

   }
   public function savePost(){

      $imagePath = null;

      if($this->featuredImage){
         $this->validate([
            'featuredImage' => 'image|max:2048' // 2MB limit
        ]);

        $imageName = time() . '.' . $this->featuredImage->getClientOriginalExtension();
        // Remove 'public/' from storage path as it's automatically handled
        $imagePath = $this->featuredImage->storeAs('uploads', $imageName, 'public');
        
        // Delete old image if exists
        if ($this->post && $this->post->featured_image) {
         Storage::disk('public')->delete($this->post->featured_image);
     }
      }
      
      if($this->post){
         $this->post->title = $this->title;
         $this->post->content = $this->content;

         if($imagePath){
           $this->post->featured_image = $imagePath;
         }

         $UpdatePost =  $this->post->save();

         
         if($UpdatePost){
            session()->flash('success','Post has been updated successfully'); 
               }else{
            session()->flash('error','Unable to update post');
            
            }
      }else{
         $post  = Post::create([
            'title' => $this->title,
            'content' => $this->content,
            'featured_image' => $imagePath,
               ]);
            
               if($post){
            session()->flash('success','Post created successfully'); 
               }else{
            session()->flash('error','Unable to create post'); 
            
            }
      }

    $this->validate();

    $rules =[
      'featuredImage' => $this->post && $this->post->featured_image ? 'nullable|image|mimes:jpeg,png,gif,webp|max:2048' : 'required|image|mimes:jpeg,png,gif,webp|max:2048'
    ];

  $message = ['featuredImage.required' => 'Featured image is required'];

  $this->validate( $rules,$message);


return $this->redirect('/posts', navigate: true);

   }

   // Safe getter for image URL
public function getImageUrl()
{
    if ($this->post && $this->post->featured_image) {
        return Storage::url($this->post->featured_image);
    }
    return null;
}


    public function render()
    {
        return view('livewire.post-form');
    }
}
