<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>404 Page Not Found</title>
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }
    body {
      background: linear-gradient(120deg, #0f2027, #203a43, #2c5364);
      color: #fff;
      font-family: 'Segoe UI', sans-serif;
      height: 100vh;
      overflow: hidden;
      display: flex;
      align-items: center;
      justify-content: center;
      flex-direction: column;
    }

    h1 {
      font-size: 12rem;
      animation: glow 2s ease-in-out infinite alternate;
    }

    h2 {
      font-size: 2rem;
      margin-bottom: 20px;
    }

    p {
      font-size: 1.1rem;
      margin-bottom: 30px;
    }

    .btn {
      text-decoration: none;
      padding: 12px 25px;
      background: #fff;
      color: #2c5364;
      border-radius: 30px;
      font-weight: bold;
      transition: 0.3s ease;
    }

    .btn:hover {
      background: #ff416c;
      color: #fff;
      transform: scale(1.05);
    }

    .astronaut {
      position: absolute;
      width: 100px;
      animation: float 4s ease-in-out infinite;
      bottom: 10%;
      right: 10%;
    }

    @keyframes float {
      0% { transform: translateY(0); }
      50% { transform: translateY(-20px); }
      100% { transform: translateY(0); }
    }

    @keyframes glow {
      from { text-shadow: 0 0 10px #fff, 0 0 20px #ff00cc; }
      to { text-shadow: 0 0 20px #fff, 0 0 40px #00ccff; }
    }

    @media (max-width: 600px) {
      h1 {
        font-size: 6rem;
      }
      h2 {
        font-size: 1.5rem;
      }
      .astronaut {
        width: 70px;
      }
    }
  </style>
</head>
<body>
  <h1>404</h1>
  <h2>Oops! Page Not Found</h2>
  <p>The page you are looking for might have been removed or doesn't exist.</p>
  <a href="/admin/dashboard" class="btn">Go to Dashboard</a>

</body>
</html>
