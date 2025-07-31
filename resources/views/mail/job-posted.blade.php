<h2>{{ $job->title}}</h2>
<p>
    congarulations on your new job posting!
</p>
<a href="{{ url('/jobs/'.$job->id) }}">View your Job listing</a>