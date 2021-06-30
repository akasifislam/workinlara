<div>
    <h1>This header Compoment</h1>
    <h3>{{ $name }}</h3>
    <h4>master</h4>
    <ul>
        @foreach ($masters as $master)
            <li>{{ $master }}</li>
        @endforeach
    </ul>
</div>