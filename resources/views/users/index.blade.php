@extends('layouts.app')
@section('title', 'Show Users')

@section('content')
    <table id="userstable" class="display" style="width:100%">
        <thead>
            <tr>
                <th>{{ __('users.ID')}}</th>
                <th>{{ __('users.Name')}}</th>
                 <!-- Add other columns as needed -->
            </tr>
        </thead>
    </table>
@endsection

@push('js')
<script>
    $(document).ready(function() {
        $('#userstable').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('users.index') }}",
            columns: [{
                    data: 'id',
                    name: 'id'
                },
                {
                    data: 'name',
                    name: 'users_translations.name'
                }
            ]

        });
    });
</script>
@endpush
