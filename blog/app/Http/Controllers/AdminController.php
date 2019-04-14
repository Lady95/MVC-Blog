<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;


class AdminController extends Controller
{

    public function __construct() {
        $this->middleware(['auth', 'auth.admin']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $users = DB::table('users')->orderBy('id', 'desc')->offset(0)->limit(10)->get(); 
        
        $billets = DB::table('billets')
            ->join('users', 'billets.user_id', '=', 'users.id')
            ->select('billets.*', 'users.username')
            ->orderBy('id', 'desc')
            ->offset(0)
            ->limit(10)
            ->get(); 

        $comments= DB::table('comments')
        ->join('users', 'comments.user_id', '=', 'users.id')
        ->join('billets', 'comments.billet_id', '=', 'billets.id')
        ->select('comments.*', 'users.username', 'billets.title')
        ->orderBy('id', 'desc')
        ->offset(0)
        ->limit(10)
        ->get(); 
        return view('admin.index', compact('users', 'billets', 'comments'));
    }

    /**
     * Display a listing of the users.
     *
     * @return \Illuminate\Http\Response
     */
    public function users()
    {
        
    }

    /**
     * Display a listing of the  billets.
     *
     * @return \Illuminate\Http\Response
     */
    public function billets()
    {
        
    }

    /**
     * Display a listing of the comments.
     *
     * @return \Illuminate\Http\Response
     */
    public function comments()
    {
        
    }

    // /**
    //  * Show the form for creating a new resource.
    //  *
    //  * @return \Illuminate\Http\Response
    //  */
    // public function create()
    // {
    //     //
    // }

    // /**
    //  * Store a newly created resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @return \Illuminate\Http\Response
    //  */
    // public function store(Request $request)
    // {
    //     //
    // }

    // /**
    //  * Display the specified resource.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function show($id)
    // {
    //     //
    // }

    // /**
    //  * Show the form for editing the specified resource.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function edit($id)
    // {
    //     //
    // }

    // /**
    //  * Update the specified resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function update(Request $request, $id)
    // {
    //     //
    // }

    // /**
    //  * Remove the specified resource from storage.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function destroy($id)
    // {
    //     //
    // }
}
