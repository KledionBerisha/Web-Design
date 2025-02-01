const comments=[
  {
      name: "Liam Mitchell",
      role: "Full Stack Engineer",
      comment: "I have used Asana, Click Up, Monday and Notion, and of all the tools, <strong>DailySync</strong> is the best for me right now.  And that's because of two main things. One is the integration between calendar and tasks being super seamless and other is because of the freaking keyboard shortcuts. There's a keyboard shortcut for everything, and I love that. So that makes it very easy to use. Thank you so much, <strong>DailySync</strong> team, for making this incredible piece of software.",
      stars: "★★★★☆"
  },
  {
      name: "Sophia Bennet",
      role: "Professional Writer",
      comment:"<strong>DailySync</strong> is the only app that broke my long #habit of handwriting #tasks and #deadlines! Now I have all of my tasks and calendar management in <strong>DailySync</strong>." ,
      stars: "★★★★★"
  },
  {
      name: "Emma Carter",
      role: "Associate Director",
      comment:"DailySync is <strong>Get Things Done on steroids</strong>. I can easily manage my to-do items and schedule them. I love that I can see my calendar and my to-do items on one screen so I can also evaluate how many calls I can add to my day based on the items in my backlog. It also integrates with Gmail perfectly, so I can save items and send them to my inbox instead of relying on Gmail reminders. Well done.",
      stars: "★★★★★",
  }
]
function showTestimonial(index) {
  const { name, comment, stars } = comments[index];
  document.getElementById("name").textContent = name;
  document.getElementById("comment").innerHTML = comment;
  document.getElementById("stars").textContent = stars;
}
function generateProfiles(){
  const profileContainer = document.getElementById("profiles");

  comments.forEach((comments,index)=>{
      const profileDiv=document.createElement("div");
      profileDiv.classList.add("profile");
      profileDiv.setAttribute("onclick",`showTestimonial(${index})`);

      const profileName=document.createElement("h4");
      profileName.textContent=comments.name;
      
      const profileRole = document.createElement("p");
      profileRole.textContent = comments.role;
      
      profileDiv.appendChild(profileName);
      profileDiv.appendChild(profileRole);

      profileContainer.appendChild(profileDiv);
  });
}
generateProfiles();
showTestimonial(0);

document.addEventListener("DOMContentLoaded", function () {
  const calendarEl = document.getElementById("calendar");

  const calendar = new calendar.Calendar(calendarEl, {
    initialView: "dayGridMonth",
    headerToolbar: {
      left: "prev,next today",
      center: "title",
      right: "dayGridMonth,timeGridWeek,timeGridDay",
    },
    events: [
      {
        title: "Meeting with Sarah",
        start: "2024-12-12T10:30:00",
      },
      {
        title: "Project Deadline",
        start: "2024-12-15",
      },
      {
        title: "Lunch Break",
        start: "2024-12-20T13:00:00",
      },
    ],
  });

  calendar.render();
});

function updateProgress(progress) {
  const progressBar = document.querySelector(".progress-bar");
  const progressText = document.querySelector(".progress-text");

  progressBar.style.width = `${progress}%`;
  progressText.textContent = `${progress}%`;

  if (progress >= 50) {
    progressText.style.color = "white";
  } else {
    progressText.style.color = "black";
  }
}



document.addEventListener("DOMContentLoaded", function() {
  const userBtn = document.getElementById("user-btn");
  const dropdownMenu = document.getElementById("dropdown-menu");

  if (userBtn && dropdownMenu) {
      dropdownMenu.classList.remove("show");

      userBtn.addEventListener("click", function(event) {
          event.preventDefault();
          dropdownMenu.classList.toggle("show");
      });

      document.addEventListener("click", function(event) {
          if (!userBtn.contains(event.target) && !dropdownMenu.contains(event.target)) {
              dropdownMenu.classList.remove("show");
          }
      });
  }
});

function openPopup() {
fetch('popup.php')
    .then(response => response.text())
    .then(data => {
        document.getElementById('popup-container').innerHTML = data;
        document.getElementById('popup').style.display = 'flex';

        const form = document.getElementById("messageForm");
        if(form){
          form.addEventListener("submit",function(event){
            event.preventDefault();

            const formData = new FormData(form);

            fetch('popup.php',{
              method:'POST',
              body: formData
            })
            .then(response=>response.text())
            .then(result=> {
              
              const meesageDiv = document.createElement("div");
              meesageDiv.id="form-message";
              meesageDiv.textContent=result;

              const existingMessage = document.getElementById("form-message");
              if(existingMessage){
                existingMessage.remove();
              }

              const popupContent=document.querySelector(".popup-content");
              popupContent.appendChild(meesageDiv);

              if(result.includes("successfully")){
                setTimeout(()=>{
                  closePopup();
                },1000);
              }
            })
            .catch(error => {
              console.error('Error:',error);
              alert("An error occurred while submitting the form");
            });
          });
        }
    });
}

function closePopup() {
document.getElementById('popup').style.display = 'none';
}
