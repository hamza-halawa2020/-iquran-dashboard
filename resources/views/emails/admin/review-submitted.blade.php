<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>New Review Submitted</title>
</head>
<body>
    <p>Hello,</p>

    <p>A new review was submitted on {{ config('app.name') }}.</p>

    <p><strong>Name:</strong> {{ $review->name }}</p>
    <p><strong>Status:</strong> {{ $review->status ? 'Approved' : 'Pending approval' }}</p>
    <p><strong>Submitted at:</strong> {{ $review->created_at?->toDateTimeString() }}</p>

    <p><strong>Review:</strong></p>
    <pre style="white-space: pre-wrap; word-wrap: break-word;">{{ $review->review }}</pre>

    <p>
        <a href="{{ url('/admin/reviews') }}">Open Reviews in Dashboard</a>
    </p>
</body>
</html>

