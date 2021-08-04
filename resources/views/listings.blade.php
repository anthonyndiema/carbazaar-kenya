@extends('layouts.dashboard')

@section('content')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Create New Car Listing</h1>
    <!--<a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
            class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>-->
</div>

<!-- Content Row -->

<div class="row ml-1">

    <table id='table22' class='table table-bordered table-striped table-responsive-sm'>
        <thead>
            <tr>
                <th>ID</th>
                <th>Car Make/Model</th>
                <th>Manufacture Year</th>
                <th>Condition</th>
                <th>Transmission</th>
                <th>Price</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($listings as $listing)
            <tr id="row{{$listing['id']}}">

                <td>{{$listing['id']}}</td>
                <td>{{$listing['make_model']}}</td>
                <td>{{$listing['make_year']}}</td>
                <td>{{$listing['condition_type']}}</td>
                <td>{{$listing['transmission']}}</td>
                <td>KSH. {{$listing['price']}}</td>
                <td>

                    <div>
                        <a href="/edit?id={{$listing['id']}}"><i class="fas fa-pen"
                                style="color:#fcccc0">&nbsp;&nbsp;</i>
                            <b style="color:#ffcc00">Edit</b>
                        </a>
                    </div>
                    <div>


                        <button onclick="deletelisting({{ $listing['id'] }});" class="text-link"><i class="fas fa-trash"
                                style="color:rgb(240,10,10)">&nbsp;&nbsp;</i><b
                                style="color:rgb(240,10,10)">delete</b></button>

                    </div>
                </td>
            </tr>

            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th>ID</th>
                <th>Car Make/Model</th>
                <th>Manufacture Year</th>
                <th>Condition</th>
                <th>Transmission</th>
                <th>Price</th>
                <th>Actions</th>
            </tr>
        </tfoot>
    </table>
</div>


<!-- Content Row -->

<script>
function deletelisting(id2) {

    $.ajax({
        type: "POST",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: "/delete",
        data: {
            id: id2
        },
        success: function(data) {
            $('table#table22 #row' + id2).remove();
            alert(data + '! Listing deleted Successfully!');
            console.log(data);

        },
        error: function(data) {
            alert('Error deleting Listing!');
            console.log(data);
        }
    });
}
(function($) {

    $(document).ready(function() {
        $('#table22').DataTable();
    });

})(jQuery);
</script>


@endsection