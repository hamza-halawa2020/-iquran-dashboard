<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>New Review Submitted</title>
</head>
<body>
    <p>Hello Admin,</p>

    <p>A new student review was submitted on {{ config('app.name') }}.</p>

    <p><strong>Reviewer Name:</strong> {{ $review->name }}</p>
    <p><strong>Current Status:</strong> {{ $review->status ? 'Approved' : 'Pending approval' }}</p>
    <p><strong>Submitted at:</strong> {{ $review->created_at?->toDateTimeString() }}</p>

    <p><strong>Review Text:</strong></p>
    <pre style="white-space: pre-wrap; word-wrap: break-word;">{{ $review->review }}</pre>

    <p>
        <a href="{{ url('/admin/reviews') }}">Open Reviews Moderation Page</a>
    </p>
</body>
</html>
