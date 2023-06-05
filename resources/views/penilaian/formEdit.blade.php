@extends('layouts.app')

@section('title', 'Form Penilaian')

@section('content')
    @livewire('penilaianformedit', ['penilaian' => $penilaian])
@endsection
