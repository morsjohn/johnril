<?php
include 'db.php';

$name = $_POST['name'];
$username = $_POST['username'];
$password = $_POST['password'];

$stmt = $conn->prepare("INSERT INTO users (name, username, password) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $name, $username, $password);

if ($stmt->execute()) {
    // Success
    echo '
    <!DOCTYPE html>
    <html lang="en">
    <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Document</title>
        <script src="vec3.js"></script>
      <style>
        @font-face {
      font-family: "myfont";
      src: url("modern\ M.ttf");
    }
        body {
        padding: 0;
        margin: 0;
       
    }
    
    .container{
                display: flex;
                align-items: center;
                justify-content: center;
                height: 700px;
                text-align: center;
                z-index: 999999999;
                background-color: rgb(3, 4, 7);
                font-family: "myfont";
                color: rgba(40, 176, 255, 0.897);
                
            }
            #l{
              margin: 0;
               
               
            }
            
            @keyframes bounce {
          0%, 100% { transform: translateY(0); }
          50% { transform: translateY(-20px); }
        }
    .loader img{
        height: 30px;
        animation: bounce 1s infinite;
    }
    #canvas {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: url(512724.png) no-repeat;
    }
    .centered-div {
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      width: 700px;
      height: 250px;
      z-index: 1;
      text-align: center;
      backdrop-filter: blur(2px);
      font-family: "myfont";
      display: none;
    }
    .centered-div1 {
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      width: 700px;
      height: 250px;
      z-index: 1;
      text-align: center;
      backdrop-filter: blur(2px);
      font-family: "myfont";
      display: none;
      z-index:200;
    }
    .centered-div P{
      margin-top:140px;
      font-size: 20px;
      color: #fff;
      filter: drop-shadow( 10px 10px 10px rgba(59, 157, 255, 0.696));
      
    }
    .centered-div1 P{
      margin-top:140px;
      font-size: 20px;
      color: #fff;
      filter: drop-shadow( 10px 10px 10px rgba(59, 157, 255, 0.696));
      
    }
    button{
      width: 100px;
      height: 45px;
      background-color: transparent;
      border: 1px solid #fff;
      color: #fff;
      font-weight: bold;
      box-shadow: rgba(34, 34, 34, 0.25) 0px 54px 55px, rgba(126, 125, 125, 0.12) 0px -12px 30px, rgba(123, 122, 122, 0.12) 0px 4px 6px, rgba(99, 98, 98, 0.17) 0px 12px 13px, rgba(106, 103, 103, 0.09) 0px -3px 5px;
    
    
    }
    </style>
    <body>
    <!-- <div class="container">-->
           
           <div class="loader">
               <div id="canvas"></div>
            <!--   <p id="l">LOADING...</p>-->
            <div class="centered-div">
               <img src="light.png" style="height: 140px;width:200px;position: absolute;top: 10%;left:36%;margin-bottom:30px;animation: blink .01s infinite;">
               <p style="margin-top: 130px;">Registration Successful</p>
               <a href="index.php"><button>Login</button></a>
               
             </div>
             <div class="centered-div1">
               <img src="light.png" style="height: 140px;width:200px;position: absolute;top: 10%;left:36%;margin-bottom:30px;animation: blink .01s infinite;">
               <p style="margin-top: 130px;">Welcome to Kalawakan</p>
               
               
             </div>
           </div>
   <!--    </div>-->
      
 <script>
  
   var canvas = document.createElement("canvas");
var width = canvas.width = window.innerWidth * 0.75;
var height = canvas.height = window.innerHeight * 0.75;
document.getElementById("canvas").appendChild(canvas);
var gl = canvas.getContext("webgl");

var mouse = {x: 0, y: 0};

var numMetaballs = 30;
var metaballs = [];

for (var i = 0; i < numMetaballs; i++) {
 var radius = Math.random() * 60 + 10;
 metaballs.push({
   x: Math.random() * (width - 2 * radius) + radius,
   y: Math.random() * (height - 2 * radius) + radius,
   vx: (Math.random() - 0.5) * 3,
   vy: (Math.random() - 0.5) * 3,
   r: radius * 0.75
 });
}

var vertexShaderSrc = `
attribute vec2 position;

void main() {
// map the position to the range [-1, 1]
vec2 zeroToOne = position / vec2(` + width + `, ` + height + `);
vec2 zeroToTwo = zeroToOne * 2.0;
vec2 clipSpace = zeroToTwo - 1.0;

gl_Position = vec4(clipSpace * vec2(1, -1), 0, 1);
}
`;

var fragmentShaderSrc = `
precision mediump float;

uniform vec3 metaballs[` + numMetaballs + `];

void main(){
float x = gl_FragCoord.x;
float y = gl_FragCoord.y;

float v = 0.0;
for (int i = 0; i < ` + numMetaballs + `; i++) {
 vec3 mb = metaballs[i];
 float dx = mb.x - x;
 float dy = mb.y - y;
 float r = mb.z;
 v += r*r/(dx*dx + dy*dy);
}

if (v > 1.0) {
 gl_FragColor = vec4(0.0, 0.2, 0.9, 1.0);
} else {
 discard;
}
}
`;

var vertexShader = compileShader(vertexShaderSrc, gl.VERTEX_SHADER);
var fragmentShader = compileShader(fragmentShaderSrc, gl.FRAGMENT_SHADER);

var program = gl.createProgram();
gl.attachShader(program, vertexShader);
gl.attachShader(program, fragmentShader);
gl.linkProgram(program);
gl.useProgram(program);

var positionAttributeLocation = gl.getAttribLocation(program, "position");
gl.enableVertexAttribArray(positionAttributeLocation);

var positionBuffer = gl.createBuffer();
gl.bindBuffer(gl.ARRAY_BUFFER, positionBuffer);

var positions = [
 0, 0,
 width, 0,
 0, height,
 0, height,
 width, 0,
 width, height
];

gl.bufferData(gl.ARRAY_BUFFER, new Float32Array(positions), gl.STATIC_DRAW);

var positionAttributeLocation = gl.getAttribLocation(program, "position");
gl.vertexAttribPointer(positionAttributeLocation, 2, gl.FLOAT, false, 0, 0);

var metaballsUniformLocation = gl.getUniformLocation(program, "metaballs");

function loop() {
 for (var i = 0; i < numMetaballs; i++) {
   var mb = metaballs[i];
   mb.x += mb.vx;
   mb.y += mb.vy;

   if (mb.x - mb.r < 0) {
     mb.x = mb.r + 1;
     mb.vx = Math.abs(mb.vx);
   } else if (mb.x + mb.r > width) {
     mb.x = width - mb.r;
     mb.vx = -Math.abs(mb.vx);
   }

   if (mb.y - mb.r < 0) {
     mb.y = mb.r + 1;
     mb.vy = Math.abs(mb.vy);
   } else if (mb.y + mb.r > height) {
     mb.y = height - mb.r;
     mb.vy = -Math.abs(mb.vy);
   }
 }

 var data = new Float32Array(3 * numMetaballs);
 for (var i = 0; i < numMetaballs; i++) {
   var baseIndex = 3 * i;
   var mb = metaballs[i];
   data[baseIndex + 0] = mb.x;
   data[baseIndex + 1] = mb.y;
   data[baseIndex + 2] = mb.r;
 }

 gl.uniform3fv(metaballsUniformLocation, data);

 gl.drawArrays(gl.TRIANGLES, 0, 6);

 requestAnimationFrame(loop);
}

loop();

function compileShader(shaderSource, shaderType) {
 var shader = gl.createShader(shaderType);
 gl.shaderSource(shader, shaderSource);
 gl.compileShader(shader);

 if (!gl.getShaderParameter(shader, gl.COMPILE_STATUS)) {
   throw "Shader compile failed with: " + gl.getShaderInfoLog(shader);
 }

 return shader;
}

var audio = new Audio("access successful.m4a");
           
  
   var centeredDiv = document.querySelector(".centered-div");
   var centeredDiv1 = document.querySelector(".centered-div1");

   // Set a timeout to simulate the loading process
   setTimeout(function() {
     // Hide the loader and show the centered div
     audio.play();
     centeredDiv1.style.display = "block";
   }, 2000); // Change the time (in milliseconds) as needed
   setTimeout(function() {
     // Hide the loader and show the centered div
    
     centeredDiv1.style.display = "none";
     centeredDiv.style.display = "block";
   }, 5000); // Change the time (in milliseconds) as needed
 </script>
</body> 
</html>
    ';
} else {
    // Failure
    echo '
        <script>
        var audio = new Audio("Account Creation fai.m4a");
        audio.play();
      </script>
      <body style="text-align:center;background-color:black">
      <img src="wave.gif" alt="Error" style="width: 200px;margin-top: 20%;">
      </body>
      <script>
        setTimeout(function() {
          window.location.href = "users.php";
        }, 2500); // Delay the redirect by 2 seconds to allow time for the sound to play
      </script>
    ';
    // Note: redirected to users.php, but users.php is the user table? Or maybe index.php? 
    // In server.js line 686 it says 'users'.
    // `app.get('/users')` renders 'users.ejs'.
    // I should create users.php too.
}
?>
