<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index()
    {
        $comments = Comment::orderby('created_at', 'desc')->simplePaginate(15);
        return view('admin.comment.index' , compact('comments'));
    }

    public function approved(Comment $comment)
    {
        $comment->is_approved = $comment->is_approved == 0 ? 1 : 0;
        $result = $comment->save();
        if ($result) {
            return to_route('admin.comments.index')->with('toast-success' , 'نظر با موفقیت تغیر کرد');
        } else {
            return to_route('admin.comments.index')->with('toast-success' , 'وضعیت با خظا مواجه شد');
        }
    }
    public function show(Comment $comment)
    {
        return view('admin.comment.show', compact('comment'));
    }

    public function destroy(Comment $comment)
    {
        $comment->delete();
        return back()->with('toast-success', 'کامن حذف شد');
    }
}
