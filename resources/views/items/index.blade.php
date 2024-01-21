@extends('layouts.app')
@section('title', 'Show Items')

@section('content')
    <table id="itemstable" class="display" style="width:100%">
        <thead>
            <tr>
                <th>{{ __('items.ID') }}</th>
                <th>{{ __('items.Name') }}</th>
               
                <!-- Add other columns as needed -->
            </tr>
        </thead>
    </table>
@endsection
@push('js')
    <script>
        $(document).ready(function() {
            $('#itemstable').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('items.index') }}",
                columns: [{
                        data: 'id',
                        name: 'id'
                    },
                    {
                        data: 'name',
                        name: 'item_translations.name'
                    }
                ]

            });
        });
    </script>
@endpush
