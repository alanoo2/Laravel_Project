<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Idea;
use Illuminate\Support\Facades\Gate;

class IdeaImageController extends Controller
{
    public function destroy(Idea $idea)
    {
        // auth
        Gate::authorize('view', $idea);
        Storage::disk('public')->delete('$idea->image_path');

        $idea->update(['image_path' => null]);

        return back();
    }
}
