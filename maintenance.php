<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>System Maintenance - K A L A W A K A N</title>
    <style>
        @font-face {
            font-family: "myfont";
            src: url("modern\ M.ttf");
        }
        body {
            margin: 0;
            padding: 0;
            background-image: url('19651.jpg');
            font-family: "myfont";    
            background-blend-mode: multiply;
            background-color: rgba(0, 0, 0, 0.834);  
            background-size: cover;
            height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }
        .maintenance-container {
            text-align: center;
            color: #fff;
            backdrop-filter: blur(10px);
            padding: 40px;
            border-radius: 15px;
            border: 2px solid rgba(255, 255, 255, 0.3);
            box-shadow: rgba(0, 145, 255, 0.408) 0px 5px 15px;
        }
        h1 {
            font-size: 48px;
            margin-bottom: 20px;
            filter: drop-shadow(10px 10px 10px rgba(255, 165, 0, 0.696));
            animation: blink 2s infinite;
        }
        p {
            font-size: 18px;
            margin-bottom: 30px;
            filter: drop-shadow(5px 5px 5px rgba(59, 157, 255, 0.696));
        }
        .maintenance-icon {
            font-size: 80px;
            margin-bottom: 20px;
            animation: spin 3s linear infinite;
        }
        @keyframes blink {
            0%, 50% { opacity: 1; }
            25%, 75% { opacity: 0.5; }
        }
        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
        .back-btn {
            background: rgba(40, 122, 255, 0.3);
            border: 2px solid #fff;
            color: #fff;
            padding: 12px 24px;
            border-radius: 25px;
            text-decoration: none;
            font-family: "myfont";
            font-weight: bold;
            transition: all 0.3s ease;
        }
        .back-btn:hover {
            background: #fff;
            color: #000;
        }
    </style>
    <link rel="stylesheet" href="star.css">
</head>
<body>
    <div class="bg"></div>
    <div class="star-field">
        <div class="layer"></div>
        <div class="layer"></div>
        <div class="layer"></div>
    </div>

    <div class="maintenance-container">
        <div class="maintenance-icon">🔧</div>
        <h1>System Under Maintenance</h1>
        <p>We're currently performing scheduled maintenance to improve your experience.</p>
        <p>Please check back later. We apologize for any inconvenience.</p>
        <a href="index.php" class="back-btn">Back to Home</a>
    </div>
</body>
</html>
