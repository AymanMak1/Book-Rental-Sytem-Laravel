
@extends('layouts.app')

@section('content')

<div class="max-w-screen-xl px-4 pb-8 mx-auto">
        <h1 class="font-extrabold pt-12 text-2xl"> My Profile </h1>
        <div class="pt-6">
            <div class=""> <span class="font-bold">Name: </span> {{$userprofile->name}} </div>
            <div class="pt-6"> <span class="font-bold">Gmail: </span> {{$userprofile->email}} </div>
            <div class="pt-6"> <span class="font-bold">Role: </span>
                @if( $userprofile->is_librarian === 1)
                    {{"Librarian"}}
                @else
                    {{"Reader"}}
                @endif
            </div>
        </div>
</div>
@endsection
