<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>New Contact Message</title>
</head>
<body>
    <p>Hello,</p>

    <p>A new contact message was submitted on {{ config('app.name') }}.</p>

    <p><strong>Name:</strong> {{ $contact->name }}</p>
    <p><strong>Phone:</strong> {{ $contact->phone }}</p>
    <p><strong>Submitted at:</strong> {{ $contact->created_at?->toDateTimeString() }}</p>

    <p><strong>Message:</strong></p>
    <pre style="white-space: pre-wrap; word-wrap: break-word;">{{ $contact->message }}</pre>

    <p>
        <a href="{{ url('/admin/contacts') }}">Open Contacts in Dashboard</a>
    </p>
</body>
</html>

