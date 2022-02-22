@extends('layouts.admin')

@section('content')

    @livewire('admin.orders-create-edit', ['order' => $order])

@stop


