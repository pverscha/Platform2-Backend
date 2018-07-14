<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Managers\SystemResourceManager;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;

class DesktopController extends Controller
{
    public function __construct() {
        $this->middleware("auth");
    }

    /**
     * Initialize the desktop page.
     *
     * @param SystemResourceManager $resourceManager ResourceManager that can be used to monitor system usage.
     * @return Response
     */
    public function show(SystemResourceManager $resourceManager) {
        $posts = DB::table('posts')->orderByDesc('created_at')->take(10)->get();

        $categoryCount = DB::table('categories')->count();
        $postCount = DB::table('posts')->count();
        $userCount = DB::table('users')->count();

        return view('backend.pages.desktop', [
            'resourceManager' => $resourceManager,
            'categoryCount' => $categoryCount,
            'postCount' => $postCount,
            'userCount' => $userCount,
            'posts' => $posts
        ]);
    }
}
