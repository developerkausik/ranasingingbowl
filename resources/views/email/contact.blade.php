<a class="navbar-brand logo" href="{{ route('home') }}" title="home"><img src="{{ URL::asset('assets/images/logo.png') }}"
        alt="" /></a>
<h2>New Contact Request from Rana Singing Bowl</h2>
<p><strong>Name:</strong> {{ $data['name'] }}</p>
<p><strong>Email:</strong> {{ $data['email'] }}</p>
<p><strong>Phone:</strong> {{ $data['phone'] }}</p>
<p><strong>Country:</strong> {{ $data['country'] }}</p>
<p><strong>Message:</strong><br>{{ $data['message'] }}</p>
