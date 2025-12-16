<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> K A L A W A K A N - E learning
    </title>
  <style>
@font-face {
    font-family: "myfont";
    src: url("modern\ M.ttf");
  }
  body{
    background-color: #070110;
  }
  .con{
    height: 160px;
    width: 250px;
    margin-left: 30px;
   margin-right: -40px;
  display: block;
    transform: translate(-50%, -50%);
  animation: floats 3s ease-in-out infinite;
  filter: drop-shadow(0 0 8px #000000a8) drop-shadow(0 0 15px #070707ab);

   }
   .main-content table {
    width: 100%;
    border-collapse: collapse;
  }

  .main-content th {
    padding: 15px;
    text-align: left;
    border-bottom: 2px solid #ddd;
    font-size: 17px;
    font-weight: 100;
    white-space: nowrap;
  }
  .main-content td {
    padding: 9px;
    text-align: left;
    border-bottom: 1px solid #ddd;
    background-color: rgba(0, 128, 255, 0.044);
  }
  .main-content tr:hover{
    background-color: #dddddd22;
  }
  .main-content a{
    color: #fdfeff;
  text-decoration: none;
  position: relative;
  bottom: 6px;
  left: 17px;
   
  }
  .main-content a img{
    position: relative;
    bottom: -6px;
  }
  .main-content th:nth-child(1), .main-content td:nth-child(1) {
    width: 50%;


  }

  .main-content th:nth-child(2), .main-content td:nth-child(2) {
    width: 1%;
    text-align: center;
  }

  .main-content th:nth-child(3), .main-content td:nth-child(3) {
    width: 5%;
    text-align: justify;
  }
  .main-content th:nth-child(3){
text-align: justify;
  }

  .main-content td img{
    height: 25px;
    margin-left: 10px;
  }
  .main-content img{
    height: 25px;
  }



td img{
  position: relative;

}
input{
  color: #f1f1f1;
  height: 45px;
  width: 350px;
  position: relative;
  left: 30%;
  border-radius: 25px;
  border: 2px solid rgb(196, 196, 196);
  text-align: center;
  font-size: 16px;
  background-color: rgba(0, 128, 255, 0.044);
}
input::placeholder{
  text-align: center;
  font-size: 16px;
}
button{
  color: #070110;
  height: 48px;
  width: 48px;
  position: relative;
  left: 31%;
  border-radius: 50%;
  border: 3px solid rgb(3, 147, 249);
  top: 7px;
  border: 2px solid rgb(196, 196, 196);
  background-color: rgba(0, 128, 255, 0.044);
}
button:hover{
  background-color: #ddd;
  transform: scale(1.1);
  transition: .6s;
}

  </style>
 <link rel="icon" type="image/x-icon" href="i.png">
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="cursor.css">
    
</head>
<body>  <audio id="backgroundMusic" autoplay loop volume="0">
  <source src="bg.mp3" type="audio/mpeg" volume="0">
  Your browser does not support the audio element.
</audio>
<audio id="backgroundMusi" autoplay volume="0" >
  <source src="vid.m4a" type="audio/mpeg">
  Your browser does not support the audio element.
</audio>
  <div class="bg"></div>

  <div class="star-field">
  <div class="layer"></div>
  <div class="layer"></div>
  <div class="layer"></div>
  </div>



    <div class="sidebar">
      <div class="logo"></div>
        <div class="side">
            
        <ul>
          <li><a href="dashboard.php"><img src="home.svg">Home</a></li>
          <li ><a href="courses.php"><img src="note.svg">Courses</a></li>
          <li><a href="lessons.php"><img src="p.svg">Resources</a></li>
          <li><a href="solar.php"><img src="planet.svg">Models</a></li>
          <li><a href="act.php"><img src="galaxy-svgrepo-com.svg">Activities</a></li>   
          <li><a href="quiz.php"><img src="pen-.svg">Quiz</a></li>
          
          <li  class="active"><a href="videos.php"><img src="video.svg">Videos</a></li>
          <li><a href="dev.php"><img src="team.svg">Devs</a></li>
      
        </ul></div>
        <img src="light.png" style="height:80px;width:300px;bottom:0;left:-40px;position:absolute;margin-bottom: 13px;">

      </div>

      <nav>
        <div class="logo">
          <img src="bot.png"><div class="tit">
            <p>K A L A W A K A N <br>E - Learning Web</p>
          </div>
        </div>
       <div class="account">
      <p>Account</p><img src="acc.svg" id="open-modal-btn">
       </div>
      </nav>


      <div class="main-content">
        <input type="text" id="search-input" placeholder="Search by title">
        <button onclick="filterDivs()"><img src="search.svg"></button>
        <h1 style="margin-top: 27px;">Educational Videos</h1>
        <p style="margin-top: 10px;">Welcome to our captivating video page dedicated to e-learning about space, where we invite you to embark on an extraordinary journey through the wonders of the cosmos, expanding your knowledge and igniting your curiosity with captivating visuals, expert insights, and a wealth of captivating content.</p>
       
        <div class="cardcontainer">
            <div class="vidcards" data-title="Solar System">
              <video width="288" height="190" controls>
                <source src="solar.mp4" type="video/mp4">
              </video><label>Solar System</label>
            </div>
            <div class="vidcards" data-title="Introduction to Astronomy">
              <video width="288" height="190" controls>
                <source src="intro.mp4" type="video/mp4">
              </video><label>Introduction to Astronomy</label>
            </div>
            <div class="vidcards" data-title="Space Missions">
              <video width="288" height="190" controls>
                <source src="spacemission.mp4" type="video/mp4">
              </video><label>Space Missions</label>
            </div>
            <div class="vidcards" data-title="Space Technology">
              <video width="288" height="190" controls>
                <source src="solar.mp4" type="video/mp4">
              </video><label>Space Technology</label>
            </div>
           
           <div class="vidcards" data-title="Astronaut Interview">
                <video width="288" height="190" controls>
                  <source src="intro.mp4" type="video/mp4">
                </video><label>Astronaut Interview</label>
          </div>
          <div class="vidcards" data-title="Planetary Exploration">
            <video width="288" height="190" controls>
              <source src="spacemission.mp4" type="video/mp4">
            </video><label>Planetary Exploration</label>
         </div>
          <div class="vidcards" data-title="Space Experiment">
            <video width="288" height="190" controls>
              <source src="solar.mp4" type="video/mp4">
            </video><label>Space Experiment</label>
         </div>
         <div class="vidcards" data-title="Space Discovery">
            <video width="288" height="190" controls>
              <source src="intro.mp4" type="video/mp4">
            </video><label>Space Discovery</label>
         </div>
         <div class="vidcards" data-title="Space History">
            <video width="288" height="190" controls>
              <source src="spacemission.mp4" type="video/mp4">
            </video><label>Space History</label>
         </div>
         <div class="vidcards" data-title="Space History">
          <video width="288" height="190" controls>
            <source src="solar.mp4" type="video/mp4">
          </video><label>Space History</label>
       </div>
       <div class="vidcards" data-title="Space History">
        <video width="288" height="190" controls>
          <source src="intro.mp4" type="video/mp4">
        </video><label>Space History</label>
     </div>
     <div class="vidcards" data-title="Space History">
      <video width="288" height="190" controls>
        <source src="spacemission.mp4" type="video/mp4">
      </video><label>Space History</label>
   </div>
      </div>

     

      </div>
      </div>


      

          
          
        </div>
        </div>
        <div id="modal" class="modal">
          <div class="modal-content">
            <span class="close-btn">&times;</span>
            <div class="logout">
              <img src="bot.png"><div class="infos"><p>Username: <?php echo $_SESSION['username']; ?></p></div>
            </div>
            <button id="log">LOG OUT</button> <button id="circ" type="submit" onmouseover="playSound()" > </button>
          </div>
          <img src="light.png" style="height: 170px;width:520px;position: absolute;left:33%;top:51%;margin-bottom:30px;">
        </div>
        <br><br><br><br><br><br><br>




     

        </div>
        
<script>
    document.getElementById('log').addEventListener('click', function() {
  window.location.href = 'logout.php';
});
   var audio = document.getElementById("backgroundMusic");
      audio.volume = 0.1;
      function filterDivs() {
  var searchInput = document.getElementById('search-input').value.toLowerCase();
  var vidCards = document.getElementsByClassName('vidcards');

  for (var i = 0; i < vidCards.length; i++) {
    var videoTitle = vidCards[i].getAttribute('data-title').toLowerCase();
    var cardContainer = vidCards[i];
    
    if (videoTitle.includes(searchInput)) {
      cardContainer.style.display = 'block';
    } else {
      cardContainer.style.display = 'none';
    }
  }
}
</script>

        <script>

    const openModalBtn = document.getElementById('open-modal-btn');
      const modal = document.getElementById('modal');
      const closeBtn = document.querySelector('.close-btn');

      // Open the modal
      openModalBtn.addEventListener('click', () => {
        modal.style.display = 'block';
      });

      // Close the modal when the user clicks on the close button or outside the modal
      closeBtn.addEventListener('click', () => {
        modal.style.display = 'none';
      });

      window.addEventListener('click', (event) => {
        if (event.target == modal) {
          modal.style.display = 'none';
        }
      });



     

   
        </script>
        <script src="cursor.js"></script>
        <script>
          // Get a reference to the background music audio element
        const backgroundMusic = document.getElementById("backgroundMusic");
        
        // Function to play the background music
        function playBackgroundMusic() {
          backgroundMusic.play();
        }
        
        // Add event listeners for user interactions
        document.addEventListener("click", playBackgroundMusic);
        document.addEventListener("keydown", playBackgroundMusic);
         </script>
</body>
</html>
