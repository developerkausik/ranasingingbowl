<a class="navbar-brand logo" href="{{ route('home') }}" title="home"><img src="{{ URL::asset('assets/images/logo.png') }}"
        alt="" /></a>
<h2>New Franchise Request from Rana Singing Bowl</h2>
<p><strong>Name:</strong> {{ $data['name'] }}</p>
<p><strong>Email:</strong> {{ $data['email'] }}</p>
<p><strong>Phone:</strong> {{ $data['phone'] }}</p>
<p><strong>Date of Birth:</strong> {{ $data['dob'] }}</p>
<p><strong>Address:</strong> {{ $data['address'] }}</p>
<p><strong>Occupation:</strong> {{ $data['occupation'] }}</p>
<p><strong>Company Name:</strong> {{ $data['business_name'] }}</p>
<p><strong>Years of Experience:</strong> {{ $data['experience'] }}</p>
<p><strong>Preferred Location:</strong> {{ $data['location'] }}</p>
<p><strong>Investment Budget:</strong> {{ $data['investment'] }}</p>
<p><strong>Reason for Choosing Our Franchise:</strong> {{ $data['reason'] }}</p>
<p><strong>Capital:</strong> {{ $data['capital'] }}</p>
<p><strong>Source of Funds:</strong> {{ $data['source_of_funds'] }}</p>
<p><strong>How Did You Hear About Us:</strong> {{ $data['hear_about_us'] }}</p>
<p><strong>Expected Start Date:</strong> {{ $data['expected_start_date'] }}</p>
<p><strong>Comments:</strong> {{ $data['comments'] }}</p>
