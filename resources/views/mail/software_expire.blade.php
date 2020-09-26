<html>
<body>
<section>
    <h4>Hello Admin,</h4>
    <p>    {{ $product }} will be expired on {{ $license_expire }}
    </p>
    <a href="{{ \Illuminate\Support\Facades\URL::to('/admin/licenses') }}">
        <button>View</button>
    </a>
</section>
</body>
</html>
