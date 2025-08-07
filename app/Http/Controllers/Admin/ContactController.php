<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    //

       public function contact()
    {
        $contacts = Contact::latest()->paginate(20);
        return view("admin.contact.index", compact("contacts"));
    }
    public function contactdelete($contact)
    {
        Contact::where("id", $contact)->delete();
        return redirect()->back()->with("popsuccess", "Contact Deleted");
    }

    public function export()
    {
        $contacts = \App\Models\Contact::all();

        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="contacts.csv"',
        ];

        $columns = ['Name', 'Email', 'Phone', 'Subject', 'Message', 'Date'];

        $callback = function () use ($contacts, $columns) {
            $file = fopen('php://output', 'w');
            fputcsv($file, $columns);

            foreach ($contacts as $contact) {
                fputcsv($file, [
                    $contact->name,
                    $contact->email,
                    $contact->phone,
                    $contact->subject,
                    $contact->message,
                    $contact->created_at->format('Y-m-d H:i:s'),
                ]);
            }

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }
}
