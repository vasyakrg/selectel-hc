@extends('layouts.template.template')

@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            @include('layouts.tickets.list')
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
