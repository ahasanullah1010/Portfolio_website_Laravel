@extends('layouts.app')

@section('title', 'My-Projects')

@section('style')
    <style>
        body {
            background: linear-gradient(120deg, #f6d365, #fda085);
            font-family: Arial, sans-serif;
        }
        .project-card {
            background: white;
            border-radius: 12px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            transition: transform 0.3s ease-in-out;
        }
        .project-card:hover {
            transform: translateY(-5px);
        }
        .project-img {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }
        .project-content {
            padding: 15px;
        }
    </style>
@endsection


@section('content')
    <div class="container py-5">
        <h2 class="text-center text-white mb-4">My Projects</h2>
        <div id="projectsContainer" class="row g-4"></div>
    </div>
@endsection


@section('script')
<script>
    const apiUrl = "http://127.0.0.1:8000/api/projects";

    function fetchProjects() {
        axios.get(apiUrl)
            .then(response => {
                const projects = response.data;
                let output = "";
                projects.forEach(project => {
                    output += `
                        <div class="col-md-4">
                            <div class="project-card">
                                <img src="http://127.0.0.1:8000/${project.image}" class="project-img" alt="${project.title}">
                                <div class="project-content">
                                    <h5>${project.title}</h5>
                                    <p>${project.description.substring(0, 100)}...</p>
                                    <p><strong>Tech:</strong> ${project.technologies}</p>
                                    <a href="${project.project_url}" class="btn btn-primary btn-sm" target="_blank">Live Demo</a>
                                    <a href="${project.github_url}" class="btn btn-dark btn-sm" target="_blank">GitHub</a>
                                </div>
                            </div>
                        </div>`;
                });
                document.getElementById("projectsContainer").innerHTML = output;
            })
            .catch(error => console.error("Error fetching projects:", error));
    }

    fetchProjects();
</script>
@endsection








