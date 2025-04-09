

@extends('layouts.app')

@section('title', 'About Me - Professional Portfolio')

@section('style')
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa;
        }
        .about-section {
            padding: 50px 0;
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.1);
        }
        .about-header {
            color: #007bff;
            font-size: 2.5rem;
            text-align: center;
            margin-bottom: 30px;
        }
        .about-content {
            font-size: 1.1rem;
            color: #495057;
        }
        .about-img {
            border-radius: 50%;
            width: 200px;
            height: 200px;
            object-fit: cover;
            margin: 20px auto;
        }
        .highlight {
            color: #007bff;
            font-weight: bold;
        }
        @media (max-width: 768px) {
            .about-header {
                font-size: 2rem;
            }
            .about-content {
                font-size: 1rem;
            }
        }
    </style>
@endsection


@section('content')
<section class="about-section container">
    <div class="row">
        <div class="col-md-4 d-flex justify-content-center">
            <img src="{{ asset('images/me.jpg') }}" alt="Ahasan Ullah" class="about-img">
        </div>
        <div class="col-md-8">
            <h2 class="about-header">About Me</h2>
            <p class="about-content">
                I am <span class="highlight">Md Ahasan Ullah</span>, a <span class="highlight">PHP Laravel Developer</span>. My deep passion for web development has led me to pursue a career in it. I am proficient in creating <span class="highlight">dynamic and scalable web applications</span> using the Laravel Framework.
            </p>
            <h4>🎓 Education & Skills:</h4>
            <ul class="about-content">
                <li>Education: **JKKNIU**, Computer Science and Engineering (CSE) - **B.Sc.**</li>
                <li>Technologies: PHP, Laravel, MySQL, JavaScript, Bootstrap, HTML, CSS</li>
                <li>Additional Skills: REST API, Ajax, jQuery, Git/GitHub</li>
            </ul>
            <h4>💼 Professional Experience:</h4>
            <ul class="about-content">
                <li>**FaceApp** (Social Media Platform)</li>
                <li>**Real-time Chatting Application**</li>
                <li>**Online MCQ Exam Platform**</li>
                <li>**Task Management System**</li>
            </ul>
            <h4>🎯 Future Goals:</h4>
            <p class="about-content">
                My goal is to establish myself as a **Full-Stack Web Developer**, and to create high-quality web applications using Laravel and other cutting-edge technologies.
            </p>
        </div>
    </div>
</section>


@endsection


@section('script')
   
@endsection






