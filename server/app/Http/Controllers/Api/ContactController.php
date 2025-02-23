<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Contact\ContactCreateRequest;
use App\Services\ContactService;
use Illuminate\Http\Response;

class ContactController extends Controller
{
    protected ContactService $contactService;

    public function __construct(ContactService $contactService)
    {
        $this->contactService = $contactService;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  ContactCreateRequest  $request
     * @return Response
     */
    public function store(ContactCreateRequest $request): Response
    {
        $this->contactService->store($request->validated());

        return response()->noContent();
    }
}
