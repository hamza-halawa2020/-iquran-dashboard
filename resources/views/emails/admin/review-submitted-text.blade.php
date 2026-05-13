Hello,

A new review was submitted on {{ config('app.name') }}.

Name: {{ $review->name }}
Status: {{ $review->status ? 'Approved' : 'Pending approval' }}
Submitted at: {{ $review->created_at?->toDateTimeString() }}

Review:
{{ $review->review }}

Dashboard: {{ url('/admin/reviews') }}

