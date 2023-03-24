<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Movie;
use App\Models\Series;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\URL;


class CommentController extends Controller
{

    private $valid_models = [
        Series::class,
        Movie::class
    ];

    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request): RedirectResponse
    {
        $validData = $request->validate([
            'commentable_type'  =>  ['required' ,Rule::in($this->valid_models)],
            'comment'           =>  'required|min:2|max:1000',
        ]);

        $item = $validData['commentable_type']::findOrFail($request->commentable_id);

        if ($item) {
                Comment::create([
                    'commentable_type' => $validData['commentable_type'],
                    'commentable_id' => $request->commentable_id,
                    'comment' => $validData['comment'],
                    'user_id' => auth()->user()->id
                ]);
        }

        return Redirect::to(URL::previous() . "#comments")->with('success','دیدگاه شما ثبت شد و بعد از تایید در سایت نمایش داده می شود.');;
    }
}
