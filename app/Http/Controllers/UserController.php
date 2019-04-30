<?php

namespace App\Http\Controllers;

use App\User;

class UserController extends Controller
{

    public function index(User $user)
    {
        try {
            $users = $user
                ->with('detail')
                ->select(['*', 'name as nick_name'])
                ->withCount([
                    'projects',
                    'projects as top_rating_projects_count' => function ($query) {
                        $query->where('rating', 5);
                    },
                ])
                ->sortable()
                ->paginate(10);

            return view('user', ['users' => $users]);
        } catch (\Kyslik\ColumnSortable\Exceptions\ColumnSortableException $e) {
            dd($e);
        }
    }
}
