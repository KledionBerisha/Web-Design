<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="dashboardAdmin.css">
</head>
<body>
    <header class="navbar">
        <div class="logo">
            <h1>Hello Admin</h1>
        </div>
        <nav>
            <ul>
                <li><a href="homepage.php">Homepage</a></li>
            </ul>
        </nav>
    </header>
    <div class="dashboard-container">
        <aside class="sidebar">
            <ul>
                <li><a href="#" id="Users">Users</a></li>
                <li><a href="#"id="Messages">Messages</a></li>
            </ul>
        </aside>
        <main class="main-content" id="content">
            <h2>Welcome to Admin Dashboard</h2>
        </main>
    </div>
<script>
    document.addEventListener("DOMContentLoaded", function(){
    const sidebar=document.querySelector(".sidebar ul");
    const content=document.getElementById("content");

    sidebar.addEventListener("click", function(event){
      if(event.target.tagName==="A"){
        event.preventDefault();
        const page=event.target.id;
        let url="";

        if(page==="Users"){
          url="usersTable.php";
        }else if(page==="Messages"){
          url="messagesTable.php";
        }

        if(url){
          fetch(url)
          .then((response)=>{
            if(!response.ok){
              throw new Error('Failed to fetch: ${response.statusText}');
            }
            return response.text();
          })
          .then((data)=>{
            content.innerHTML=data;
          })
          .catch((error) => {
            content.innerHTML = `<p style="color: red;">Error loading content: ${error.message}</p>`;
            console.error("Error loading content:", error);
        });
        }
      }
    });
});
</script>
</body>
</html>
