<?php

namespace App\Http\Controllers;

use App\Http\Requests\BooksRequest;
use App\Http\Resources\BookResource;
use App\Models\Authors;
use App\Models\Books;
use App\Models\User;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;

class BooksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        dd(Authors::with('books')->get());
        $books = Books::all();
        return response([
            'status' => 'Successfully received',
            'books' => $books], 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(BooksRequest $request)
    {
        $data = $request->validated();
        $img = ImageController::toImage($data['cover_image']);
        $data['cover_image'] = $img;
        $user = User::findOrFail(auth()->id());
        $data = $user->books()->create($data);
        return response(['message' => 'book was created',
            'book' => new BookResource($data)], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Books $book
     * @return \Illuminate\Http\Response
     */
    public function show(Books $book)
    {
        //
    }

    public function showByAuthor(Request $request, Books $book)
    {
        $data = Books::all()->where('authors_id', '=', $request->authors_id);
        return response(['message' => 'received',
            'books' => $data], 200);
    }

    public function showByUser(Request $request)
    {
        $data = Books::all()->where('user_id', '=', auth()->id());
        return response(['messages' => 'received',
            'books created by you' => $data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Books $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Books $book)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Books $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Books $book)
    {
        $book->update($request->input());
        return response(['message' => 'book was updated',
            'book' => $book]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Books $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Books $book)
    {
        $book->delete();
        return response(['message' => 'Book was deleted']);
    }
}
