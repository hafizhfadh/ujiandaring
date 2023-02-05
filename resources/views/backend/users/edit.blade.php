@extends('backend.layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        <div class="d-flex justify-content-between mb-3">
            <div class="card-title">Detail Data {{ $user->name }}</div>
        </div>
    </div>
    <div class="card-body">
        <!-- User edit form -->

    </div>
</div>
@endsection

@push('css')

@endpush

@push('js')
<script>

</script>
@endpush
