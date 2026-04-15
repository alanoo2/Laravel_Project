<?php

namespace App\Actions;

class CreateIdea{
    public function handle(array $attributes, User $user){
        $idea = Auth::user()->ideas()->create($request->safe()->except('steps', 'image'));

        $idea->steps()->createMany(
            collect($request->steps)->map(fn($step) => ['description' => $step])
        );

        $imagePath = $request->file('image')->store('ideas', 'public');

        $idea->update([
            'image_path' => $imagePath
        ]);

    }
}
