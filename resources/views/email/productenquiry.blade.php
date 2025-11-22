<a class="navbar-brand logo" href="{{ route('home') }}" title="home"><img src="{{ URL::asset('assets/images/logo.png') }}"
        alt="" /></a>
<h2>New Product Enquiry Request from Rana Singing Bowl</h2>
<p><strong>Name:</strong> {{ $data['name'] }}</p>
<p><strong>Email:</strong> {{ $data['email'] }}</p>
<p><strong>Phone:</strong> {{ $data['phone'] }}</p>
<p><strong>Product:</strong> {{ $data['product'] }}</p>
<p><strong>Variant:</strong> {{ $data['variant'] }}</p>
<p><strong>Approx Size:</strong> {{ $data['size'] }}</p>
<p><strong>Order Quantity:</strong> {{ $data['quantity'] }}</p>
<p><strong>Approx No of Pieces:</strong> {{ $data['no_pices'] }}</p>
<p><strong>Message:</strong><br>{{ $data['message'] }}</p>
