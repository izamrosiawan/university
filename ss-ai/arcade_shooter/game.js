// Arcade Shooter - Versi siap main
// Dibuat sederhana + beberapa fitur: level naik otomatis, power-up, high score lokal.

(() => {
  const canvas = document.getElementById('game');
  const ctx = canvas.getContext('2d');

  const scoreEl = document.getElementById('score');
  const livesEl = document.getElementById('lives');
  const levelEl = document.getElementById('level');
  const hiscoreEl = document.getElementById('hiscore');

  const overlay = document.getElementById('overlay');
  const ovTitle = document.getElementById('ov-title');
  const ovMsg = document.getElementById('ov-msg');
  const btnStart = document.getElementById('btn-start');
  const btnResume = document.getElementById('btn-resume');

  const W = canvas.width;
  const H = canvas.height;

  // Audio sederhana (beberapa beep dibuat via WebAudio)
  const audioCtx = new (window.AudioContext || window.webkitAudioContext)();
  function beep(type="sine", freq=440, dur=0.08, vol=0.2){
    const osc = audioCtx.createOscillator();
    const gain = audioCtx.createGain();
    osc.type = type;
    osc.frequency.value = freq;
    gain.gain.value = vol;
    osc.connect(gain);
    gain.connect(audioCtx.destination);
    osc.start();
    osc.stop(audioCtx.currentTime + dur);
  }

  const rand = (a,b)=>Math.random()*(b-a)+a;

  const KEYS = {};
  window.addEventListener('keydown', e=>{
    KEYS[e.code] = true;
    if(e.code === 'Space') e.preventDefault();
    if(e.code === 'KeyP') togglePause();
  });
  window.addEventListener('keyup', e=> KEYS[e.code] = false);

  canvas.addEventListener('pointerdown', () => {
    if(state.paused) return;
    playerShoot();
  });

  // Game state
  let state;
  const hiscoreKey = 'arcadeShooterHiscoreV1';
  let hiscore = +localStorage.getItem(hiscoreKey) || 0;
  hiscoreEl.textContent = hiscore;

  function newGame(){
    state = {
      running: true,
      paused: false,
      frame: 0,
      score: 0,
      level: 1,
      lives: 3,
      enemies: [],
      bullets: [],
      enemyBullets: [],
      particles: [],
      powerups: [],
      spawnTimer: 0,
      spawnRate: 90,
      difficultyTimer: 0,
      player: {
        x: W/2,
        y: H - 70,
        vx: 0,
        width: 40,
        height: 48,
        speed: 5,
        fireCD: 0,
        fireRate: 12,
        multi: 1,
        multiTimer: 0,
        shield: 0
      }
    };
    overlay.classList.add('hidden');
    btnResume.classList.add('hidden');
    loop();
  }

  function gameOver(){
    state.running = false;
    ovTitle.textContent = 'Game Over';
    let msg = `Skor Kamu: ${state.score}`;
    if(state.score > hiscore){
      hiscore = state.score;
      localStorage.setItem(hiscoreKey, hiscore);
      hiscoreEl.textContent = hiscore;
      msg += '\nREKOR BARU!';
    } else {
      msg += `\nHigh Score: ${hiscore}`;
    }
    ovMsg.textContent = msg;
    btnStart.textContent = 'Main Lagi';
    btnResume.classList.add('hidden');
    overlay.classList.remove('hidden');
  }

  function togglePause(){
    if(!state || !state.running) return;
    state.paused = !state.paused;
    if(state.paused){
      ovTitle.textContent = 'Pause';
      ovMsg.textContent = 'Game dijeda.';
      btnStart.textContent = 'Mulai Ulang';
      btnResume.classList.remove('hidden');
      overlay.classList.remove('hidden');
    } else {
      overlay.classList.add('hidden');
      loop();
    }
  }

  btnStart.addEventListener('click', ()=>{
    // jika game belum mulai atau sudah selesai -> mulai baru
    if(!state || !state.running || state.paused){
      newGame();
    }
  });
  btnResume.addEventListener('click', ()=>{
    if(state && state.paused){
      togglePause();
    }
  });

  function playerShoot(){
    const p = state.player;
    if(p.fireCD > 0) return;
    p.fireCD = p.fireRate;
    const spread = 14;
    for(let i=0;i<p.multi;i++){
      const offset = (i - (p.multi-1)/2) * spread;
      state.bullets.push({
        x: p.x,
        y: p.y - p.height/2,
        vy: -9,
        vx: offset * 0.05,
        r: 4,
        dmg: 1,
        color: '#4ade80'
      });
    }
    beep('square', 660, 0.06, 0.12);
  }

  function spawnEnemy(){
    const level = state.level;
    const typeChance = Math.random();
    let type = 'basic';
    if(typeChance > 0.8) type = 'zigzag';
    if(typeChance > 0.93) type = 'tank';

    const base = {
      x: rand(40, W-40),
      y: -40,
      vx: 0,
      vy: rand(1.2, 2.2) + level*0.05,
      r: type === 'tank' ? 26 : (type === 'zigzag' ? 18 : 16),
      hp: type === 'tank' ? 6+level : (type === 'zigzag'? 3+Math.floor(level/2) : 2+Math.floor(level/3)),
      type,
      fire: 0
    };
    state.enemies.push(base);
  }

  function spawnPowerup(x,y){
    const options = [];
    options.push('score');
    options.push('multi');
    options.push('shield');
    const kind = options[Math.floor(Math.random()*options.length)];
    state.powerups.push({
      x,y,
      vy:2.2,
      r:12,
      kind,
      ttl: 900
    });
  }

  function addParticles(x,y,color,count=8,spread=2){
    for(let i=0;i<count;i++){
      state.particles.push({
        x,y,
        vx: rand(-spread, spread),
        vy: rand(-spread, spread)-1,
        life: rand(18,34),
        color
      });
    }
  }

  function collideCircle(a,b){
    const dx = a.x - b.x;
    const dy = a.y - b.y;
    const r = (a.r || a.width/2) + (b.r || b.width/2);
    return dx*dx + dy*dy <= r*r;
  }

  function logic(){
    const s = state;
    const p = s.player;
    s.frame++;

    // Input
    p.vx = 0;
    if(KEYS.ArrowLeft || KEYS.KeyA) p.vx = -p.speed;
    if(KEYS.ArrowRight || KEYS.KeyD) p.vx = p.speed;
    p.x += p.vx;
    if(p.x < 30) p.x = 30;
    if(p.x > W-30) p.x = W-30;

    if(KEYS.Space || KEYS.KeyJ) playerShoot();

    // cooldown & timers
    if(p.fireCD>0) p.fireCD--;
    if(p.multiTimer>0){
      p.multiTimer--;
      if(p.multiTimer===0){
        p.multi = 1;
      }
    }
    if(p.shield>0) p.shield--;

    // spawn enemy
    s.spawnTimer--;
    if(s.spawnTimer<=0){
      spawnEnemy();
      s.spawnTimer = Math.max(12, s.spawnRate - s.level*2);
    }

    // difficulty escalate
    s.difficultyTimer++;
    if(s.difficultyTimer % 900 === 0){
      s.level++;
      s.spawnRate = Math.max(40, s.spawnRate - 4);
      beep('sine', 220 + s.level*20, 0.2, 0.15);
    }

    // update enemies
    for(let i=s.enemies.length-1;i>=0;i--){
      const e = s.enemies[i];
      if(e.type === 'zigzag'){
        e.x += Math.sin((s.frame + i*20)/25)*2.4;
      }
      e.y += e.vy;
      if(e.type === 'tank'){
        if(e.fire <= 0 && Math.random()<0.01){
          // menembak
          s.enemyBullets.push({
            x:e.x, y:e.y + e.r,
            vx: rand(-0.7,0.7),
            vy: rand(2.5,3.3),
            r:5,
            color:'#f87171',
            dmg: 1
          });
          e.fire = 80 - s.level*2;
          beep('sawtooth', 180, 0.1, 0.08);
        } else e.fire--;
      } else if (e.type === 'zigzag'){
        if(Math.random()<0.002){
          s.enemyBullets.push({
            x:e.x, y:e.y + e.r,
            vx: rand(-0.4,0.4),
            vy: rand(2.8,3.6),
            r:4,
            color:'#fb923c',
            dmg:1
          });
          beep('triangle', 320, 0.06, 0.07);
        }
      }
      if(e.y - e.r > H+80){
        s.enemies.splice(i,1);
        // penalti kecil
        s.lives--;
        updateHUD();
        if(s.lives<=0) gameOver();
      }
    }

    // bullets
    for(let i=s.bullets.length-1;i>=0;i--){
      const b = s.bullets[i];
      b.y += b.vy;
      b.x += b.vx;
      if(b.y < -20) { s.bullets.splice(i,1); continue; }
      // cek tabrak enemy
      for(let j=s.enemies.length-1;j>=0;j--){
        const e = s.enemies[j];
        if(collideCircle(b,e)){
          e.hp -= b.dmg;
            addParticles(b.x,b.y,'#4ade80',4,1.2);
          s.bullets.splice(i,1);
          if(e.hp<=0){
            // kill
            addParticles(e.x,e.y,'#38bdf8',14,3);
            if(Math.random()<0.14) spawnPowerup(e.x,e.y);
            s.enemies.splice(j,1);
            s.score += 10 + s.level*2;
            beep('square', 520+Math.random()*120, 0.09, 0.12);
            updateHUD();
          } else {
            beep('square', 400, 0.04, 0.06);
          }
          break;
        }
      }
    }

    // enemy bullets
    for(let i=s.enemyBullets.length-1;i>=0;i--){
      const b = s.enemyBullets[i];
      b.x += b.vx;
      b.y += b.vy;
      if(b.y > H+40) { s.enemyBullets.splice(i,1); continue; }
      if(collideCircle(b, {x:p.x, y:p.y, r:20})){
        s.enemyBullets.splice(i,1);
        if(p.shield>0){
          addParticles(p.x,p.y,'#38bdf8',8,2.6);
          beep('sine', 560, 0.07, 0.1);
        } else {
          s.lives--;
          addParticles(p.x,p.y,'#f87171',18,3.2);
          beep('sawtooth', 160, 0.2, 0.18);
          if(s.lives<=0){
            updateHUD();
            gameOver();
            return;
          }
        }
        updateHUD();
      }
    }

    // powerups
    for(let i=s.powerups.length-1;i>=0;i--){
      const pw = s.powerups[i];
      pw.y += pw.vy;
      pw.ttl--;
      if(pw.ttl<=0 || pw.y > H+40){
        s.powerups.splice(i,1);
        continue;
      }
      if(collideCircle(pw, {x:p.x,y:p.y,r:28})){
        if(pw.kind === 'score'){
          s.score += 100 + s.level*10;
          addParticles(pw.x,pw.y,'#fde047',14,3);
          beep('triangle', 720, 0.14, 0.18);
        } else if(pw.kind === 'multi'){
          s.player.multi = Math.min(5, s.player.multi+1);
          s.player.multiTimer = 1200;
          addParticles(pw.x,pw.y,'#a78bfa',16,3);
          beep('sine', 880, 0.18, 0.2);
        } else if(pw.kind === 'shield'){
          s.player.shield = 600;
          addParticles(pw.x,pw.y,'#38bdf8',16,3);
          beep('sine', 500, 0.22, 0.2);
        }
        s.powerups.splice(i,1);
        updateHUD();
      }
    }

    // particles
    for(let i=s.particles.length-1;i>=0;i--){
      const pa = s.particles[i];
      pa.x += pa.vx;
      pa.y += pa.vy;
      pa.vy += 0.04;
      pa.life--;
      if(pa.life<=0) s.particles.splice(i,1);
    }
  }

  function updateHUD(){
    scoreEl.textContent = state.score;
    livesEl.textContent = state.lives;
    levelEl.textContent = state.level;
  }

  function render(){
    ctx.clearRect(0,0,W,H);

    // background stars
    ctx.save();
    ctx.globalAlpha = 0.3;
    ctx.fillStyle = '#1e293b';
    for(let i=0;i<40;i++){
      const y = (state.frame*0.6 + i*200)% (H+200) - 200;
      const x = (i*97 % W);
      ctx.beginPath();
      ctx.arc(x,y, 1+(i%3===0?1.2:0), 0, Math.PI*2);
      ctx.fill();
    }
    ctx.restore();

    const p = state.player;

    // player
    ctx.save();
    ctx.translate(p.x,p.y);
    // shield
    if(p.shield>0){
      const pulse = 0.5 + Math.sin(state.frame/8)*0.5;
      ctx.beginPath();
      ctx.globalAlpha = 0.25 + pulse*0.1;
      ctx.fillStyle = '#38bdf8';
      ctx.arc(0,0, p.width*0.95, 0, Math.PI*2);
      ctx.fill();
      ctx.globalAlpha = 1;
    }
    // body
    ctx.fillStyle = '#4ade80';
    ctx.beginPath();
    ctx.moveTo(0,-p.height/2);
    ctx.lineTo(p.width/2, p.height/2);
    ctx.lineTo(0, p.height/2 - 10);
    ctx.lineTo(-p.width/2, p.height/2);
    ctx.closePath();
    ctx.fill();

    // engine glow
    ctx.beginPath();
    ctx.fillStyle = '#fbbf24';
    ctx.globalAlpha = 0.6 + Math.sin(state.frame/5)*0.2;
    ctx.ellipse(0, p.height/2 - 2, 10, 14, 0, 0, Math.PI*2);
    ctx.fill();
    ctx.globalAlpha = 1;
    ctx.restore();

    // bullets
    for(const b of state.bullets){
      const grd = ctx.createLinearGradient(b.x, b.y-10, b.x, b.y+10);
      grd.addColorStop(0, '#a7f3d0');
      grd.addColorStop(1, b.color);
      ctx.fillStyle = grd;
      ctx.beginPath();
      ctx.arc(b.x,b.y,b.r,0,Math.PI*2);
      ctx.fill();
    }

    // enemy bullets
    for(const b of state.enemyBullets){
      ctx.fillStyle = b.color;
      ctx.beginPath();
      ctx.arc(b.x,b.y,b.r,0,Math.PI*2);
      ctx.fill();
    }

    // enemies
    for(const e of state.enemies){
      ctx.save();
      ctx.translate(e.x,e.y);
      if(e.type === 'tank'){
        ctx.fillStyle = '#f87171';
        ctx.beginPath();
        ctx.arc(0,0,e.r,0,Math.PI*2);
        ctx.fill();
        ctx.strokeStyle = '#ffffff22';
        ctx.lineWidth = 3;
        ctx.stroke();
        // hp bar
        ctx.fillStyle = '#1e293b';
        ctx.fillRect(-22, -e.r-10, 44, 5);
        ctx.fillStyle = '#f87171';
        const hpw = (e.hp / (6+state.level)) * 44;
        ctx.fillRect(-22, -e.r-10, hpw, 5);
      } else if(e.type === 'zigzag'){
        ctx.fillStyle = '#fb923c';
        ctx.beginPath();
        ctx.moveTo(-e.r, -e.r);
        ctx.lineTo(e.r, -e.r/2);
        ctx.lineTo(-e.r, e.r/2);
        ctx.lineTo(e.r, e.r);
        ctx.closePath();
        ctx.fill();
      } else {
        ctx.fillStyle = '#38bdf8';
        ctx.beginPath();
        ctx.arc(0,0,e.r,0,Math.PI*2);
        ctx.fill();
      }
      ctx.restore();
    }

    // powerups
    for(const pw of state.powerups){
      ctx.save();
      ctx.translate(pw.x,pw.y);
      let color = '#fde047';
      if(pw.kind==='multi') color = '#a78bfa';
      if(pw.kind==='shield') color = '#38bdf8';
      ctx.fillStyle = color;
      ctx.beginPath();
      ctx.arc(0,0,pw.r,0,Math.PI*2);
      ctx.fill();
      ctx.fillStyle = '#0f172a';
      ctx.font = 'bold 14px system-ui';
      ctx.textAlign='center';
      ctx.textBaseline='middle';
      let sym = '+';
      if(pw.kind==='multi') sym='×';
      else if(pw.kind==='shield') sym='S';
      ctx.fillText(sym,0,1);
      ctx.restore();
    }

    // particles
    for(const pa of state.particles){
      ctx.globalAlpha = Math.max(0, pa.life/34);
      ctx.fillStyle = pa.color;
      ctx.fillRect(pa.x, pa.y, 3,3);
      ctx.globalAlpha = 1;
    }

    // UI mini indicators
    if(p.multi>1){
      ctx.fillStyle='#a78bfa';
      ctx.font='12px system-ui';
      ctx.textAlign='left';
      ctx.fillText('Multi-shot: x'+p.multi, 8, 16);
    }
    if(p.shield>0){
      ctx.fillStyle='#38bdf8';
      ctx.font='12px system-ui';
      ctx.fillText('Shield: '+Math.ceil(p.shield/60)+'s', 8, 30);
    }
  }

  function loop(){
    if(!state.running || state.paused) return;
    logic();
    render();
    requestAnimationFrame(loop);
  }

  // Auto start
  newGame();
})();