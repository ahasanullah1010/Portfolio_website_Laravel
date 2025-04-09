@extends('layouts.app')

@section('title', 'Add-Skill')

@section('style')
    <style>
        body {
            background: linear-gradient(120deg, #ff758c, #ff7eb3);
            color: white;
            font-family: Arial, sans-serif;
        }
        .form-container {
            max-width: 500px;
            margin: 50px auto;
            padding: 20px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }
        .btn-custom {
            background: #ff477e;
            border: none;
            padding: 10px 20px;
            font-size: 1.2rem;
            transition: all 0.3s ease;
        }
        .btn-custom:hover {
            background: #ff2e6d;
            transform: scale(1.1);
        }
    </style>
@endsection


@section('content')
    <div class="container">
        <div class="form-container">
            <h2 class="text-center">Add a New Skill</h2>
            <form id="skillForm">
                <div class="mb-3">
                    <label for="skill_name" class="form-label">Skill Name</label>
                    <input type="text" id="skill_name" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="proficiency" class="form-label">Proficiency (%)</label>
                    <input type="number" id="proficiency" class="form-control" min="1" max="100" required>
                </div>
                <button type="submit" class="btn btn-custom w-100">Save Skill</button>
            </form>
            <p id="message" class="text-center mt-3"></p>
        </div>
    </div>
@endsection


@section('script')
    <script>
        document.getElementById("skillForm").addEventListener("submit", function(event) {
            event.preventDefault();
            let skill_name = document.getElementById("skill_name").value;
            let proficiency = document.getElementById("proficiency").value;
            
            axios.post("/api/skills", {
                skill_name: skill_name,
                proficiency: proficiency,
                user_id: 1  // Change this dynamically based on logged-in user
            })
            .then(response => {
                document.getElementById("message").innerHTML = "<span class='text-success'>Skill added successfully!</span>";
                document.getElementById("skillForm").reset();
            })
            .catch(error => {
                document.getElementById("message").innerHTML = "<span class='text-danger'>Error adding skill!</span>";
            });
        });
    </script>
@endsection