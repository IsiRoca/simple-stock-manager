<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Resources\Product as ProductResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

use App\Events\ContactFormSubmitted;
use App\Http\Requests\ContactFormRequest;
use App\Models\ContactInfo;

class ContactController extends Controller
{

    /**
     * User submitted contact information
     * Record it and queue a confirmation email
     */
    public function contact(ContactFormRequest $request)
    {
        $data = $request->validated();

        try
        {
            $contact_info = ContactInfo::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'subject' => $data['subject'],
                'message' => $data['message'],
            ]);

            event(new ContactFormSubmitted($contact_info->id));
        }
        catch (\Exception $e)
        {
            // TODO maybe send an error here?
        }

        return json_encode(['success' => true, 'msg' => 'OK']);
    }
}

