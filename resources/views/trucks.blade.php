<h1>{{ $title }}</h1>
<p>{{ $description }}</p>
<form method="post" action="./logout">
    @csrf
    <input type="submit" value="Logout">
</form>
<hr>
<form method="post" action="./trucks/create">
    @csrf
    <input type="text" name="model" placeholder="Model">
    <input type="text" name="reg_number" placeholder="Reg. Number">
    <input type="submit" value="Create a record">
</form>
<br>
<table id="trucksTable" width="100%">
    <thead>
        <tr>
            <th>Model</th>
            <th>Reg Number</th>
            <th>Created By</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
    <!--
        @foreach($trucks as $truck)
            <tr>
                <td>{{$truck['model']}}</td>
                <td>{{$truck['reg_number']}}</td>
                <td>{{$truck['user_id']}}</td>
                <td>
                    <form action="./trucks/delete/{{$truck['id']}}" method="post">
                        @csrf
                        @method('delete')
                        <input class="btn btn-danger" type="submit" value="Delete" />
                    </form>
                </td>
            </tr>
        @endforeach
    -->
    </tbody>
</table>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script type="text/javascript">
    $(function () {
        $(function () {
            var table = $('#trucksTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('getTrucks') }}",
                columns: [
                    { data: 'model' },
                    { data: 'reg_number' },
                    { data: 'user_id' },
                    { data: 'deleteButton' },
                ]

            });
        });
    });
</script>
