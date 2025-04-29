<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Maafin Aku Ya</title>
  <link rel="stylesheet" href="nay.css">
  <link href="https://fonts.googleapis.com/css2?family=Pacifico&family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
  <div class="container">
    <div class="card" id="card">
      <div class="hearts-bg" id="heartsBg"></div>
      <div class="polaroid-frame">
        <!-- Using a placeholder image - replace with your actual image -->
        <img src="img/nay.jpg" alt="Foto Pacarku" class="pacar-img">
      </div>
      <h1>Maafin Aku Ya <i class="fas fa-heart" id="heartIcon"></i></h1>
      <p class="reason">
        Aku sadar aku udah salah dan nyakitin kamu. Bukan maksudku buat kamu sedih.  
        Aku cuma manusia biasa yang kadang khilaf. Tapi rasa sayangku ke kamu itu tulus dan besar banget <span class="heart">❤️</span>
      </p>
      <p class="closing">Aku janji bakal jadi lebih baik untuk kita.</p>
      <button id="apologyBtn">Maafin Aku</button>
    </div>
  </div>

  <script>
    // Create floating hearts background
    function createHearts() {
      const heartsBg = document.getElementById('heartsBg');
      const heartCount = 15;
      
      for (let i = 0; i < heartCount; i++) {
        const heart = document.createElement('div');
        heart.className = 'heart-particle';
        heart.innerHTML = '❤️';
        heart.style.left = Math.random() * 100 + '%';
        heart.style.top = Math.random() * 100 + '%';
        heart.style.animationDelay = Math.random() * 10 + 's';
        heart.style.animationDuration = 5 + Math.random() * 10 + 's';
        heart.style.fontSize = 10 + Math.random() * 20 + 'px';
        heartsBg.appendChild(heart);
      }
    }

    // Create random message bubbles
    function createMessageBubble() {
      const messages = [
        "I love you!",
        "You're amazing!",
        "Forgive me?",
        "I'm sorry!",
        "You're my world!",
        "❤️❤️❤️"
      ];
      
      const bubble = document.createElement('div');
      bubble.className = 'message-bubble';
      bubble.textContent = messages[Math.floor(Math.random() * messages.length)];
      bubble.style.left = Math.random() * 80 + 10 + '%';
      bubble.style.top = Math.random() * 60 + 20 + '%';
      bubble.style.animationDelay = Math.random() * 2 + 's';
      document.getElementById('card').appendChild(bubble);
      
      setTimeout(() => {
        bubble.remove();
      }, 4000);
    }

    // 3D tilt effect
    function setupTiltEffect() {
      const card = document.getElementById('card');
      
      card.addEventListener('mousemove', (e) => {
        const xAxis = (window.innerWidth / 2 - e.pageX) / 25;
        const yAxis = (window.innerHeight / 2 - e.pageY) / 25;
        card.style.transform = `rotateY(${xAxis}deg) rotateX(${yAxis}deg)`;
      });
      
      card.addEventListener('mouseenter', () => {
        card.style.transition = 'none';
      });
      
      card.addEventListener('mouseleave', () => {
        card.style.transition = 'transform 0.5s ease';
        card.style.transform = 'rotateY(0deg) rotateX(0deg)';
      });
    }

    // Heart beat animation
    function setupHeartBeat() {
      const heart = document.getElementById('heartIcon');
      setInterval(() => {
        heart.style.animation = 'heartBeat 1.3s ease';
        setTimeout(() => {
          heart.style.animation = '';
        }, 1300);
      }, 3000);
    }

    // Confetti effect
    function showThankYou() {
      const card = document.getElementById('card');
      card.innerHTML = `
        <div style="animation: fadeIn 0.8s ease-in-out">
          <i class="fas fa-heart" style="font-size: 3em; color: #ff5e78; margin-bottom: 20px; animation: heartBeat 1s infinite"></i>
          <h1 style="color: #ff5e78;">Makasih Ya!</h1>
          <p class="reason">Aku janji gak akan buat kamu kecewa lagi. Aku sayang banget sama kamu <span class="heart">❤️</span></p>
          <button onclick="location.reload()">Kembali</button>
        </div>
      `;
      
      // Create confetti
      const colors = ['#ff5e78', '#ff9a9e', '#ffccd2', '#ffffff'];
      for (let i = 0; i < 100; i++) {
        const confetti = document.createElement('div');
        confetti.style.position = 'fixed';
        confetti.style.width = '10px';
        confetti.style.height = '10px';
        confetti.style.backgroundColor = colors[Math.floor(Math.random() * colors.length)];
        confetti.style.borderRadius = '50%';
        confetti.style.left = Math.random() * 100 + 'vw';
        confetti.style.top = '-10px';
        confetti.style.zIndex = '9999';
        confetti.style.transform = `rotate(${Math.random() * 360}deg)`;
        
        const animationDuration = Math.random() * 3 + 2;
        confetti.style.animation = `fall ${animationDuration}s linear forwards`;
        
        document.body.appendChild(confetti);
        
        setTimeout(() => {
          confetti.remove();
        }, animationDuration * 1000);
      }
      
      // Add falling animation
      const style = document.createElement('style');
      style.innerHTML = `
        @keyframes fall {
          to {
            transform: translateY(100vh) rotate(360deg);
            opacity: 0;
          }
        }
      `;
      document.head.appendChild(style);
    }

    // Initialize all effects
    document.addEventListener('DOMContentLoaded', () => {
      createHearts();
      setupTiltEffect();
      setupHeartBeat();
      
      // Create message bubbles periodically
      setInterval(createMessageBubble, 3000);
      
      // Button click event
      document.getElementById('apologyBtn').addEventListener('click', showThankYou);
    });
  </script>
</body>
</html>