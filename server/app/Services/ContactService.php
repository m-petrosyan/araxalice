<?php

namespace App\Services;

use App\Jobs\ContactEmailJob;
use App\Models\Contact;

class ContactService
{
    /**
     * @param  array  $attributes
     * @return void
     */
    public function store(array $attributes): void
    {
        Contact::create($attributes);

        ContactEmailJob::dispatch(config('mail')['email']['from'], $attributes);
    }
}
