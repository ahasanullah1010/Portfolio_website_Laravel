@extends('layouts.app')

@section('title', 'My-Skills')

@section('style')
    <style>
        body {
        background: linear-gradient(120deg, #6a11cb, #2575fc);
        color: white;
        font-family: Arial, sans-serif;
    }
    .skills-container {
        max-width: 800px;
        margin: 50px auto;
        padding: 20px;
        background: rgba(255, 255, 255, 0.1);
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    }
    .progress {
        height: 20px;
        border-radius: 10px;
    }
    .progress-bar {
        font-weight: bold;
        transition: width 1s ease-in-out;
    }
    </style>
@endsection


@section('content')
    <div class="container">
        <div class="skills-container">
            <h2 class="text-center">My Skills</h2>
            <div id="skills-list">
                <p class="text-center">Loading skills...</p>
            </div>
        </div>
    </div>
@endsection


@section('script')
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            axios.get("/api/skills")
                .then(response => {
                    let skills = response.data;
                    let skillsHtml = "";
                    
                    skills.forEach(skill => {
                        skillsHtml += `
                            <div class="mb-3">
                                <p class="mb-1">${skill.skill_name} - ${skill.proficiency}%</p>
                                <div class="progress">
                                    <div class="progress-bar bg-success" role="progressbar" style="width: ${skill.proficiency}%;">
                                        ${skill.proficiency}%
                                    </div>
                                </div>
                            </div>
                        `;
                    });
                    document.getElementById("skills-list").innerHTML = skillsHtml;
                })
                .catch(error => {
                    document.getElementById("skills-list").innerHTML = "<p class='text-center text-danger'>Failed to load skills.</p>";
                });
        });
    </script>
@endsection