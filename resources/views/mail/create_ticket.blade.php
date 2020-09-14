<html>
<body>
<section>
    <h4>Hello Admin,</h4>
    <p>A new ticket has been created</p>
    <p><strong>From</strong> : {{ $username }} (<a href="mailto:{{ $email }}">{{ $email }}</a>)</p>
    <p><strong>Subject</strong>: {{ $subject }}</p>
    <p><strong>Content</strong>:</p>
    <p>
        {{ $content }}
    </p>

    <a href="{{ \Illuminate\Support\Facades\URL::to('/admin/') }}">
        <button>View Ticket</button>
    </a>
</section>
</body>
</html>
