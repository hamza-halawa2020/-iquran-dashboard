Hello,

A new contact message was submitted on {{ config('app.name') }}.

Name: {{ $contact->name }}
Phone: {{ $contact->phone }}
Submitted at: {{ $contact->created_at?->toDateTimeString() }}

Message:
{{ $contact->message }}

Dashboard: {{ url('/admin/contacts') }}

