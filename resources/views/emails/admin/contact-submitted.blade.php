<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>New Contact Message</title>
</head>
<body>
    <p>Hello Admin,</p>

    <p>You received a new message from the contact form on {{ config('app.name') }}.</p>

    <p><strong>Sender Name:</strong> {{ $contact->name }}</p>
    <p><strong>Phone:</strong> {{ $contact->phone }}</p>
    <p><strong>Email:</strong> {{ $contact->email }}</p>
    <p><strong>Age:</strong> {{ $contact->age }}</p>
    <p><strong>Country:</strong> {{ $contact->country }}</p>
    <p><strong>Interested Course:</strong> {{ $contact->course }}</p>
    <p><strong>Submitted at:</strong> {{ $contact->created_at?->toDateTimeString() }}</p>

    <p><strong>Message Content:</strong></p>
    <pre style="white-space: pre-wrap; word-wrap: break-word;">{{ $contact->message }}</pre>

    <p>
        <a href="{{ url('/admin/contacts') }}">Open Contact Messages in Dashboard</a>
    </p>
</body>
</html>
