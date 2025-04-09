
@extends('layouts.app')

@section('title', 'Resume - Download')

@section('style')
<style>
    body {
        font-family: 'Arial', sans-serif;
        background-color: #f8f9fa;
    }
    .resume-section {
        text-align: center;
        padding: 60px 20px;
        background: #fff;
        box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.1);
        border-radius: 10px;
        margin: 50px auto;
        max-width: 600px;
    }
    .resume-header {
        font-size: 2rem;
        color: #007bff;
        margin-bottom: 20px;
    }
    .resume-text {
        font-size: 1.1rem;
        color: #495057;
        margin-bottom: 30px;
    }
    .download-btn {
        font-size: 1.2rem;
        padding: 12px 20px;
        border-radius: 8px;
        background: #007bff;
        color: #fff;
        text-decoration: none;
        transition: 0.3s;
    }
    .download-btn:hover {
        background: #0056b3;
    }
</style>
@endsection


@section('content')
<section class="resume-section">
    <h2 class="resume-header">Download My Resume</h2>
    <p class="resume-text">Click the button below to download my latest Resume/CV in PDF format.</p>
    <a href="{{ url('/download-resume') }}" class="download-btn">📄 Download Resume</a>

</section>
@endsection


@section('script')
    
@endsection











{{-- 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resume - Download</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa;
        }
        .resume-section {
            text-align: center;
            padding: 60px 20px;
            background: #fff;
            box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            margin: 50px auto;
            max-width: 600px;
        }
        .resume-header {
            font-size: 2rem;
            color: #007bff;
            margin-bottom: 20px;
        }
        .resume-text {
            font-size: 1.1rem;
            color: #495057;
            margin-bottom: 30px;
        }
        .download-btn {
            font-size: 1.2rem;
            padding: 12px 20px;
            border-radius: 8px;
            background: #007bff;
            color: #fff;
            text-decoration: none;
            transition: 0.3s;
        }
        .download-btn:hover {
            background: #0056b3;
        }
    </style>
</head>
<body>
    <section class="resume-section">
        <h2 class="resume-header">Download My Resume</h2>
        <p class="resume-text">Click the button below to download my latest Resume/CV in PDF format.</p>
        <a href="{{ url('/download-resume') }}" class="download-btn">📄 Download Resume</a>

    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html> --}}
