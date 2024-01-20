@extends('layouts.app')
@push('CSRFtoken')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endpush
@section('title', 'Create Invoice')
@section('content')
    <div class="jumbotron">
        <div class="container ">

            <div class="col-md-4">
                <input type="text" class="datepicker date" name="date" id="date">

            </div>

            <div class="col-md-4">
                <label>Select customer name</label>
                <select id="username" class="username form-control">

                </select>
            </div>
            <div class="col-md-4">
                <label>Select items</label>
                <select id="multipleitems" class="multipleitems form-control" multiple>

                </select>
            </div>
        </div>
        <div class="container ">
            <div class="col-md-6">
                <table class="table itemsTable" id="itemsTable">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Price</th>
                            <th scope="col">Total</th>
                        </tr>
                    </thead>
                </table>
            </div>
            <div class="col-md-6">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td><span id="finaltotal"></span></td>
                        </tr>


                    </tbody>
                </table>
            </div>
        </div>
        <div class="container">
            <button class="btn btn-info" id="submitButton" type="button">Submit</button>

        </div>
    </div>
@endsection


@push('js')
    <script>
        $(document).ready(function() {
            $('.datepicker').datepicker({
                format: 'yyyy-mm-dd'
            });
        });


        $(document).ready(function() {
            $('.username').select2({
                placeholder: "Select a customer name",
                allowClear: true,
                ajax: {
                    url: "{{ route('invoices.users') }}",
                    processResults: function(data) {
                        return {
                            results: $.map(data, function(item) {
                                // Map each translation to an object with an id and name
                                var results = $.map(item.translations, function(translation) {
                                    return {
                                        id: item.id,
                                        text: translation.name
                                    };
                                });

                                // Return the array of results
                                return results;
                            })
                        };
                    }

                }
            });

            $('.multipleitems').select2({
                placeholder: "Select one or more item",
                allowClear: true,
                ajax: {
                    url: "{{ route('invoices.items') }}",
                    processResults: function(data) {
                        return {
                            results: $.map(data, function(item) {
                                // Map each translation to an object with an id and name
                                var results = $.map(item.translations, function(translation) {
                                    return {
                                        id: item.id,
                                        text: translation.name,
                                        price: item.price,
                                    };
                                });

                                // Return the array of results
                                return results;
                            })
                        };
                    }

                }
            });
        });

        // Initialize the DataTable
        let table = $('#itemsTable').DataTable({
            paging: false,
            searching: false
        });
        // Set up AJAX defaults
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        // Listen for changes on the Select2 element
        // Keep track of the IDs of the rows that are currently in the table
        let currentRowIds = [];

        $('#multipleitems').on('change', function(e) {

            let selectedItems = $(this).val(); // Get all currently selected IDs


            // Send an AJAX request to the server with the selected items
            $.ajax({
                url: "{{ route('invoices.items.selected') }}",
                method: 'POST',
                data: {
                    ids: selectedItems
                },
                success: function(response) {
                    // Clear the DataTable
                    // table.clear().draw();
                    // Check if the response is empty


                    if (response.length === 0) {
                        // Handle the empty response here
                        return;
                    }
                    // Load the new data into the DataTable
                    response.forEach(function(item) {
                        if (currentRowIds.includes(item.id)) {
                            return;
                        }

                        let quantityInput =
                            `<input type="number" class="quantity" min="1" value="1"  data-id='${item.id}' data-price='${item.price}'>`;
                        let subtotalSpan =
                            `<span class='subtotal' data-id='${item.id}' data-price='${item.price}'>` +
                            item.price + "</span>";
                        table.row.add([
                            item.id,
                            item.translations[0]['name'],
                            quantityInput,
                            item.price,
                            subtotalSpan
                        ]).draw();

                        // Add the ID of the row to the list of current row IDs
                        currentRowIds.push(item.id);
                        updateFinalTotal();
                    });


                }
            });
        }).on('select2:unselect', function(e) {
            // Remove the corresponding row from the DataTable
            let unselectedId = e.params.data.id;
            table.rows().every(function(rowIdx, tableLoop, rowLoop) {
                let data = this.data();

                if (data[0] == unselectedId) {

                    table.row(rowIdx).remove().draw();

                }
                let unselectedIdNum = Number(unselectedId);

                const index = currentRowIds.findIndex(id => id === unselectedIdNum);

                if (index > -1) {
                    currentRowIds.splice(index, 1);
                }
                updateFinalTotal();
            });
        });;

        $(document).ready(function() {
            // Attach an event listener to the parent element of the table
            $('#itemsTable').on('change', '.quantity', function() {
                // Calculate the new subtotal
                let quantity = parseInt($(this).val());
                let price = parseFloat($(this).closest('tr').find('.subtotal').data('price'));
                let subtotal = (quantity * price).toFixed(2);

                // Update the subtotal span
                $(this).closest('tr').find('.subtotal').text(subtotal);
                // Then update the final total
                updateFinalTotal();
            });
        });

        function updateFinalTotal() {
            let total = 0;
            $('.subtotal').each(function() {
                let subtotal = parseFloat($(this).text());
                if (!isNaN(subtotal)) {
                    total += subtotal;
                }
            });
            $('#finaltotal').text(total.toFixed(2));
        }

        function collectData() {
            let data = [];

            // Check if the table is empty
            if (table.data().length == 0) {
                // Table is empty, return an empty array
                return data;
            }

            // Iterate over each row in the DataTable using the 'rows()' method
            table.rows().every(function() {
                let rowData = this.data();
                console.log(rowData); // Log the row data to debug

                let id = rowData[0]; // Assuming the ID is in the first column of the row

                // Create a temporary DOM element to hold the HTML string
                let tempDiv = document.createElement('div');
                tempDiv.innerHTML = rowData[2]; // Assuming the quantity is in the third column of the row

                // Extract the value attribute from the input field
                let quantityString = tempDiv.querySelector('.quantity').value;
                console.log(quantityString); // Log the quantity string to debug

                let quantity = parseInt(quantityString); // Parse the quantity string to an integer
                console.log(quantity); // Log the parsed quantity to debug
                let quantityInput = $(this).find('.quantity');

                // Push the ID and quantity as an object to the 'data' array
                data.push({
                    id: id,
                    quantity: quantity
                });

                return true; // Continue iteration to the next row
            });

            return data; // Return the collected data array
        }




        $('#submitButton').click(function() {
            let data = collectData();
            // Check if date is not set or null
            if (!$('.date').val()) {
                swal({
                    title: "Oops!",
                    text: "Date is required.",
                    icon: "error",
                    button: "OK",
                });
                return false;
            }
            // Check if username is not set or null
            if (!$('.username').val()) {

                swal({
                    title: "Oops!",
                    text: "Username is required.",
                    icon: "error",
                    button: "OK",
                });
                return false;
            }


            // Check if data is empty
            if (!data || !data.length) {

                swal({
                    title: "Oops!",
                    text: "Item is required.",
                    icon: "error",
                    button: "OK",
                });
                return false;
            }


            $.ajax({
                url: "{{ route('invoices.store') }}",
                method: 'POST',
                data: {
                    data: JSON.stringify(data),
                    'userid': $('.username').val(),
                    'date': $('.date').val()
                },
                success: function(response) {
                    let sw = swal({
                        title: "Success!",
                        text: "Data stored successfully!",
                        icon: "success",
                        button: "OK",
                    });
                    sw.then((result) => {
                        if (result == true) {
                            window.location.reload();
                        }
                    }).catch((error) => {
                        console.error(error);
                    });


                },
                error: function(response) {
                    let errors = response.responseJSON;
                    let errorString = '';

                    $.each(errors, function(key, value) {
                        errorString += value + '\n';
                    });
                    swal({
                        title: "Error!",
                        text: errorString,
                        icon: "error",
                        button: "OK",
                    });
                }
            });
        });
        // Attach an event listener to the parent element of the table
        // Attach an event listener to the parent element of the table
        $('#itemsTable').on('change', '.quantity', function() {
            // Get the current row
            let row = $(this).closest('tr');

            // Get the current value of the quantity input field
            let quantity = $(this).val();
            let itemid = $(this).attr('data-id');
            let price = parseFloat($(this).attr('data-price'));

            // Create a new quantity input field with the updated value
            let quantityInput =
                `<input type="number" class="quantity" min="1" value="${quantity}" data-id="${itemid}" data-price="${price}">`;

            // Update the cell in the DataTable
            table.cell(row, 2).data(quantityInput).draw();

            // Calculate the new subtotal based on the updated quantity
            let subtotal = (price * quantity).toFixed(2);

            // Create a new subtotal span with the updated subtotal
            let subtotalSpan =
                `<span class='subtotal' data-id='${itemid}' data-price='${price}'>${subtotal}</span>`;

            // Update the subtotal cell in the DataTable
            table.cell(row, 4).data(subtotalSpan).draw();

            // Then update the final total
            updateFinalTotal();
        });
    </script>
@endpush
