<?php

namespace App\Http\Resources;

use App\Models\User;
use Illuminate\Http\Resources\Json\ResourceCollection;

class UserCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        // If i was dealing with a single `UserResource` class, then `$this->resource` would point to
        // the eloquent model, but in a collection, `$this->resource` instead stores an eloquent collection of
        // user resource objects
        return [
            'users' => $this->collection,
            'all_emails' => $this->resource->map(function (User $user) {
                return $user->email;
            }),
        ];
    }
}
