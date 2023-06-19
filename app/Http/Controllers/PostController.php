<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Services\PostService;

class PostController extends Controller
{

    protected $postService;

    public function __construct(PostService $postService)
    {
        $this->postService = $postService;
    }

    /**
     * Display a listing of the resource.
     */
    // public function index()
    // {
    //     $result = ['status' => 200];

    //     try {
    //         $result['data'] = $this->postService->getAll();
    //     } catch (\Exception $e) {
    //         $result = [
    //             'status' => 500,
    //             'error' => $e->getMessage(),
    //         ];
    //     }

    //     return response()->json($result, $result['status']);
    // }

    public function index()
    {
        // try {
            $posts = $this->postService->getAll();

            return view('posts.index', ['posts' => $posts]);
        // } catch (\Exception $e) {
        //     $errorMessage = $e->getMessage();

        //     return view('error', ['errorMessage' => $errorMessage]);
        // }
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    // public function store(Request $request)
    // {
    //     $data = $request->only([
    //         'title',
    //         'description',
    //     ]);

    //     $result = ['status' => 200];

    //     try {
    //         $result['data'] = $this->postService->savePostData($data);
    //     } catch (\Exception $e) {
    //         $result = [
    //             'status' => 500,
    //             'error' => $e->getMessage(),
    //         ];
    //     }

    //     return response()->json($result, $result['status']);
    // }

    public function store(Request $request)
    {
        $data = $request->only([
            'title',
            'description',
        ]);

        $this->postService->savePostData($data);

        return redirect()->route('post.index')->with('success', 'Post berhasil disimpan');
    }

    /**
     * Display the specified resource.
     */
    // public function show($id)
    // {
    //     $result = ['status' => 200];

    //     try {
    //         $result['data'] = $this->postService->getById($id);
    //     } catch (\Exception $e) {
    //         $result = [
    //             'status' => 500,
    //             'error' => $e->getMessage(),
    //         ];
    //     }

    //     return response()->json($result, $result['status']);
    // }

    public function show($id)
    {
        $post = $this->postService->getById($id)->first();

        return view('posts.detail', ['post' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $post = $this->postService->getById($id)->first();

        return view('posts.edit', ['post' => $post]);
    }

    /**
     * Update the specified resource in storage.
     */
    // public function update(Request $request, $id)
    // {
    //     $data = $request->only([
    //         'title',
    //         'description',
    //     ]);

    //     $result = ['status' => 200];

    //     try {
    //         $result['data'] = $this->postService->updatePost($data, $id);
    //     } catch (\Exception $e) {
    //         $result = [
    //             'status' => 500,
    //             'error' => $e->getMessage(),
    //         ];
    //     }

    //     return response()->json($result, $result['status']);
    // }

    public function update(Request $request, $id)
    {
        $data = $request->only([
            'title',
            'description',
        ]);

        $this->postService->updatePost($data, $id);

        return redirect()->route('post.index')->with('success', 'Post berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    // public function destroy($id)
    // {
    //     $result = ['status' => 200];

    //     try {
    //         $result['data'] = $this->postService->deleteById($id);
    //     }  catch (\Exception $e) {
    //         $result = [
    //             'status' => 500,
    //             'error' => $e->getMessage(),
    //         ];
    //     }

    //     return response()->json($result, $result['status']);
    // }

    public function destroy($id)
    {
        $this->postService->deleteById($id);

        return redirect()->route('post.index')->with('success', 'Post berhasil dihapus');
    }
}
