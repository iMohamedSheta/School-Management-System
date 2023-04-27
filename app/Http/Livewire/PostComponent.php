<?php

namespace App\Http\Livewire;

use App\Models\Post;
use App\Models\Grade;
use App\Models\Classroom;
use App\Models\PostComment;
use App\Notifications\ReceivedComment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class PostComponent extends Component
{
    use WithPagination;

    public $title;
    public $content;
    public $upvote;
    public $downvote;
    public $comment;
    public $editedComment;
    public $showMore = false;
    public $classrooms=[];
    public $grade_id;
    public $classroom_id;
    public $selectedGrade;
    public $selectedClassroom;

    public $search = '';



public $commentsPerPage = 5;
public $commentsShown = 2;


protected $listeners = ['updatedGradeId'];


    public function updatedGradeId($value)
    {
        if ($value) {
            $this->classrooms = Classroom::where('grade_id', $value)->get();
        } else {
            $this->classrooms = [];
        }
    }

    public function render()
    {

        $postsQuery = Post::query();

        if ($this->selectedGrade && $this->selectedGrade !== 'AllGrades') {
            $postsQuery->where('grade_id', $this->selectedGrade);
        }

        if ($this->selectedClassroom && $this->selectedClassroom !== 'AllClassrooms') {
            $postsQuery->where('classroom_id', $this->selectedClassroom);
        }

        $posts = $postsQuery->orderByDesc(DB::raw('count_upvotes - count_downvotes'))->paginate(10);

        $posts->each(function ($post) {
            $post->comments = $post->comments->sortByDesc('created_at');
        });
        $grades = Grade::all();
        return view('livewire.post-component',compact('posts','grades'));
    }



    public function filterByGrade($gradeId)
    {
        $this->selectedGrade = $gradeId;
        $this->selectedClassroom = null;
    }

    public function filterByClassroom($classroomId)
    {
        $this->selectedClassroom = $classroomId;
    }



    public function uploadImage(Request $request)
    {
        $uploadedFile = $request->file('upload');

        $filename = time() . '_' . $uploadedFile->getClientOriginalName();
        $path = $uploadedFile->storeAs('public/uploads', $filename);

        $media = auth()->user()->addMedia(storage_path('app/'.$path))->toMediaCollection('Postsimages');

        session()->put('uploadedImage', $media);

        return response()->json(['url' => $media->getUrl()]);
    }








    public function upvote($id)
    {

        $post = Post::where('id',$id)->first();
        $post->upvote();

    }

    public function downvote($id)
    {

        $post = Post::where('id',$id)->first();
        $post->downvote();


    }



    public function addComment($id)
    {
        if(!empty($this->comment))
        {
        $comment = $this->comment;
        $user = auth()->user();
        PostComment::create(
            [
                'user_id'=> $user->id,
                'post_id'=>$id,
                'comment'=> $comment,
            ]
            );

            $post = Post::find($id);

            if($user->id !== $post->user_id)
            {
                // Create and send the notification to the user who posted the post
                $post->user->notify(new ReceivedComment($post, $user, $comment));
            }
        }

        $this->comment = '';
    }

    public function deleteComment($comment_id)
    {
        $comment = PostComment::findorfail($comment_id);
        if( (auth()->user()->id == $comment->user->id) || (auth()->user()->id == $comment->post->user->id) || (auth()->user()->isAdmin()) )
        {
            $comment->delete();
        }

    }
    public function updateComment($comment_id)
    {
        $comment = PostComment::findorfail($comment_id);
        if( (auth()->user()->id == $comment->user->id) )
        {
            $validatedData = $this->validate([
            'editedComment'=>'string|required',
            ]);

            if($validatedData)
            {
                $updateComment=$comment->update([
                    'comment'=> $this->editedComment,
                ]);
                toastr()->success(trans('alert.edited-success'), trans('alert.success'), ['timeOut' => 3000]);
            }
        }
        if(!$updateComment)
        {
            toastr()->error(trans('alert.error_title'), $e->getMessage(), ['timeOut' => 3000]);
        }
    }


    public function toggleShowMore()
    {
        $this->showMore = !$this->showMore;
    }

    public function showMoreComments()
    {
        $this->commentsShown += $this->commentsPerPage;
    }




}
