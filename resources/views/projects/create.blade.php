<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Projects</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <h2 class="text-center">Projects</h2>

    <form id="projectForm" class="mb-4">
        <div class="mb-3">
            <label class="form-label">Title</label>
            <input type="text" class="form-control" id="title" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Description</label>
            <textarea class="form-control" id="description" required></textarea>
        </div>
        <div class="mb-3">
            <label class="form-label">Technologies</label>
            <input type="text" class="form-control" id="technologies" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Project URL</label>
            <input type="url" class="form-control" id="project_url">
        </div>
        <div class="mb-3">
            <label class="form-label">GitHub URL</label>
            <input type="url" class="form-control" id="github_url">
        </div>
        <div class="mb-3">
            <label class="form-label">Image</label>
            <input type="file" class="form-control" id="image">
        </div>
        <button type="submit" class="btn btn-primary">Add Project</button>
    </form>

    {{-- <h3 class="text-center">Project List</h3>
    <div id="projectsList" class="row"></div> --}}
</div>

<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script>
    const apiUrl = "http://127.0.0.1:8000/api/projects"; 
    const token = "YOUR_AUTH_TOKEN"; 

    document.getElementById("projectForm").addEventListener("submit", function (event) {
        event.preventDefault();

        let formData = new FormData();
        formData.append("title", document.getElementById("title").value);
        formData.append("description", document.getElementById("description").value);
        formData.append("technologies", document.getElementById("technologies").value);

        let projectUrl = document.getElementById("project_url").value;
        let githubUrl = document.getElementById("github_url").value;
        
        if (projectUrl) formData.append("project_url", projectUrl);
        if (githubUrl) formData.append("github_url", githubUrl);

        let imageFile = document.getElementById("image").files[0];
        if (imageFile) {  // ✅ চেক করা হচ্ছে ফাইল আছে কিনা
            formData.append("image", imageFile);
        }

        axios.post("http://127.0.0.1:8000/api/projects", formData, {
            headers: { 
                Authorization: `Bearer ${token}`, 
                "Content-Type": "multipart/form-data" 
            }
        })
        .then(response => {
            alert("✅ Project Added Successfully!");
            document.getElementById("projectForm").reset();
        })
        .catch(error => {
            console.error("❌ Error adding project:", error.response?.data || error);
        });
    });


    // document.getElementById("projectForm").addEventListener("submit", function (event) {
    //     event.preventDefault();

    //     let formData = new FormData();
    //     formData.append("title", document.getElementById("title").value);
    //     formData.append("description", document.getElementById("description").value);
    //     formData.append("technologies", document.getElementById("technologies").value);
    //     formData.append("project_url", document.getElementById("project_url").value);
    //     formData.append("github_url", document.getElementById("github_url").value);
    //     formData.append("image", document.getElementById("image").files[0]);

    //     axios.post(apiUrl, formData, { headers: { Authorization: `Bearer ${token}` } })
    //         .then(response => {
    //             alert("Project Added Successfully!");
    //         })
    //         .catch(error => console.error("Error adding project:", error));
    // });

    
</script>
</body>
</html>
