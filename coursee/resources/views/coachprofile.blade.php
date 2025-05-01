@extends('layouts.app')

@section('content')
<main class="main">
    <div class="page-title">
        <div class="heading">
            <div class="container">
                <div class="row d-flex justify-content-center text-center">
                    <div class="col-lg-8">
                        <h1 class="display-5 fw-bold mb-3">{{ $user->name }}'s Profile</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="section profile">
        <div class="container">
            <div class="row gy-4">
                <div class="col-lg-4">
                    <div class="profile-card text-center p-4 rounded-4 shadow">
                        <div class="profile-image mb-4">
                            @if($user->image)
                                <img src="{{ asset($user->image) }}" class="img-fluid rounded-circle border-4 border-white shadow" alt="{{ $user->name }}">
                            @else
                                <img src="{{ asset('images/default-profile.jpg') }}" class="img-fluid rounded-circle border-4 border-white shadow" alt="Default profile">
                            @endif
                        </div>
                        <h3 class="fw-bold mb-2">{{ $user->name }} {{ $user->lastname }}</h3>
                        
                        @if(Auth::id() == $user->id)
                            <a href="{{ route('coach.edit', $user->id) }}" class="btn btn-sm btn-outline-primary mt-3">
                                <i class="fas fa-edit"></i> Edit Profile
                            </a>
                        @endif
                    </div>
                </div>

                <div class="col-lg-8">
                    <div class="profile-content p-4 rounded-4 shadow">
                        <!-- Profile content here -->
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection