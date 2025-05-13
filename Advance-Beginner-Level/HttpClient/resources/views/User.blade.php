<div>
    <h1>User Data</h1>

    <ul>
        <div>
            <h3>User Details </h3>
            <li><b>Name : </b> {{ $data->name }}</li>
            <li><b>User Name : </b> {{ $data->username }}</li>
            <li><b>phone : </b>{{ $data->phone }}</li>
            <li><b>Email : </b> {{ $data->email }}</li>
            <li><b>street : </b>{{ $data->address->street }}</li>
            <li><b>City : </b>{{ $data->address->city }}</li>
            <li><b>Zipcode : </b>{{ $data->address->zipcode }}</li>
        </div>

        <hr>
        <div>
            <h3>Company Details</h3>
            <li><b>Website : </b>{{ $data->website }}</li>
            <li><b>Company Name  : </b>{{ $data->company->name }}</li>
            <li><b>Catch Phrase : </b>{{ $data->company->catchPhrase }}</li>
        </div>

    </ul>
</div>
