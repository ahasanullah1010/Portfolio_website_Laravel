@extends('layouts.app')

@section('title', 'Portfolio Home')

@section('style')
    <style>
        body {
        font-family: 'Arial', sans-serif;
        background: linear-gradient(120deg, #ff758c, #ff7eb3);
        color: white;
    }
    .hero-section {
        height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        text-align: center;
        flex-direction: column;
        animation: fadeIn 1.5s ease-in-out;
    }
    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(-20px); }
        to { opacity: 1; transform: translateY(0); }
    }
    .btn-custom {
        background: #ff477e;
        border: none;
        padding: 12px 25px;
        font-size: 1.2rem;
        transition: all 0.3s ease;
    }
    .btn-custom:hover {
        background: #ff2e6d;
        transform: scale(1.1);
    }
    .social-icons a {
        color: white;
        font-size: 24px;
        margin: 10px;
        transition: transform 0.3s;
    }
    .social-icons a:hover {
        transform: scale(1.3);
    }
    footer {
        background-color: #333;
        color: white;
        text-align: center;
        padding: 20px 0;
    }
    </style>
@endsection


@section('content')
<section class="hero-section">
    <h1 class="display-4">Hi, I'm <span style="color: yellow;">Ahasan Ullah</span></h1>
    <p class="lead">A Passionate PHP - Laravel Web Developer & Designer</p>
    <a href="/projects" class="btn btn-custom">View My Work</a>
    <div class="social-icons mt-3">
        <a href="#"><i class="fab fa-github">github</i></a>
        <a href="#"><i class="fab fa-linkedin">linkedin</i></a>
        <a href="#"><i class="fab fa-twitter">twitter</i></a>
    </div>
</section>
@endsection

@section('footer')
<footer class="bg-dark text-center text-white py-4 mt-5">
    <div class="container">
        <p>&copy; 2025 Your Name. All Rights Reserved.</p>
        
    </div>
</footer>
@endsection