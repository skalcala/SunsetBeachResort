<?php
require('inc/header.php');
require('inc/links.php');
$tx = htmlspecialchars($_GET['tx'] ?? '');
$rid = htmlspecialchars($_GET['rid'] ?? '');
$queued = isset($_GET['queued']) && $_GET['queued'] == '1';
$status_token = isset($_GET['token']) ? htmlspecialchars($_GET['token']) : '';
$room_param = isset($_GET['room_id']) ? htmlspecialchars($_GET['room_id']) : '';
?>
<style>
* {
  box-sizing: border-box;
}
.booking-container {
  min-height: 80vh;
  display: flex;
  align-items: center;
  justify-content: center;
  background: linear-gradient(135deg, #1a365d 0%, #2c5282 100%);
  padding: 20px;
}
.booking-card {
  background: white;
  border-radius: 24px;
  box-shadow: 0 20px 60px rgba(0,0,0,0.3);
  max-width: 600px;
  width: 100%;
  padding: 48px;
  text-align: center;
  animation: slideUp 0.6s ease-out;
}
@keyframes slideUp {
  from {
    opacity: 0;
    transform: translateY(30px);
  }
  to {
    opacity: 1;
    transform: translateY(0);
  }
}
.status-icon-wrapper {
  width: 120px;
  height: 120px;
  margin: 0 auto 24px;
  position: relative;
}
.status-icon {
  width: 100%;
  height: 100%;
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 56px;
  position: relative;
  z-index: 2;
}
.status-icon.queued {
  background: linear-gradient(135deg, #f97316 0%, #fb923c 100%);
  animation: pulse-ring 2s ease-out infinite;
}
.status-icon.confirmed {
  background: linear-gradient(135deg, #11998e 0%, #38ef7d 100%);
  animation: scaleSuccess 0.5s ease-out;
}
.status-icon.cancelled {
  background: linear-gradient(135deg, #eb3349 0%, #f45c43 100%);
  animation: scaleSuccess 0.5s ease-out;
}
@keyframes pulse-ring {
  0% {
    box-shadow: 0 0 0 0 rgba(249, 115, 22, 0.7);
  }
  50% {
    box-shadow: 0 0 0 20px rgba(249, 115, 22, 0);
  }
  100% {
    box-shadow: 0 0 0 20px rgba(249, 115, 22, 0);
  }
}
@keyframes scaleSuccess {
  0% {
    transform: scale(0);
  }
  50% {
    transform: scale(1.1);
  }
  100% {
    transform: scale(1);
  }
}
.spinner {
  width: 48px;
  height: 48px;
  border: 4px solid rgba(255,255,255,0.3);
  border-top-color: white;
  border-radius: 50%;
  animation: spin 1s linear infinite;
}
@keyframes spin {
  to { transform: rotate(360deg); }
}
.checkmark {
  color: white;
}
.booking-title {
  font-size: 32px;
  font-weight: 700;
  color: #2d3748;
  margin-bottom: 12px;
}
.booking-subtitle {
  font-size: 18px;
  color: #718096;
  margin-bottom: 32px;
  font-weight: 400;
}
.queue-status {
  background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
  color: white;
  padding: 20px 32px;
  border-radius: 16px;
  margin: 32px 0;
  font-size: 18px;
  font-weight: 600;
  animation: fadeIn 0.5s ease-out;
}
@keyframes fadeIn {
  from {
    opacity: 0;
    transform: translateY(-10px);
  }
  to {
    opacity: 1;
    transform: translateY(0);
  }
}
.queue-position {
  font-size: 48px;
  font-weight: 800;
  display: block;
  margin-top: 8px;
}
.info-section {
  background: #f7fafc;
  padding: 24px;
  border-radius: 16px;
  margin: 24px 0;
  text-align: left;
}
.info-row {
  display: flex;
  justify-content: space-between;
  padding: 12px 0;
  border-bottom: 1px solid #e2e8f0;
}
.info-row:last-child {
  border-bottom: none;
}
.info-label {
  color: #718096;
  font-weight: 500;
}
.info-value {
  color: #2d3748;
  font-weight: 600;
}
.btn-home {
  background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
  color: white;
  padding: 16px 48px;
  border-radius: 12px;
  text-decoration: none;
  display: inline-block;
  font-weight: 600;
  font-size: 16px;
  transition: transform 0.2s, box-shadow 0.2s;
  border: none;
  margin-top: 24px;
}
.btn-home:hover {
  transform: translateY(-2px);
  box-shadow: 0 10px 25px rgba(102, 126, 234, 0.4);
  color: white;
  text-decoration: none;
}
.success-message {
  background: linear-gradient(135deg, #11998e 0%, #38ef7d 100%);
  color: white;
  padding: 20px 32px;
  border-radius: 16px;
  margin: 32px 0;
  font-size: 18px;
  font-weight: 600;
  animation: fadeIn 0.5s ease-out;
}
.error-message {
  background: linear-gradient(135deg, #eb3349 0%, #f45c43 100%);
  color: white;
  padding: 20px 32px;
  border-radius: 16px;
  margin: 32px 0;
  font-size: 18px;
  font-weight: 600;
  animation: fadeIn 0.5s ease-out;
}
.dots-loader {
  display: inline-flex;
  gap: 8px;
  margin-left: 8px;
}
.dot {
  width: 8px;
  height: 8px;
  border-radius: 50%;
  background: white;
  animation: dotPulse 1.4s ease-in-out infinite;
}
.dot:nth-child(2) {
  animation-delay: 0.2s;
}
.dot:nth-child(3) {
  animation-delay: 0.4s;
}
@keyframes dotPulse {
  0%, 80%, 100% {
    opacity: 0.3;
    transform: scale(0.8);
  }
  40% {
    opacity: 1;
    transform: scale(1);
  }
}
</style>

<div class="booking-container">
  <div class="booking-card">
    <div class="status-icon-wrapper">
      <div id="statusIcon" class="status-icon queued">
        <div class="spinner"></div>
      </div>
    </div>
    
    <h1 class="booking-title">Booking Confirmed!</h1>
    <p class="booking-subtitle">Your reservation has been received</p>
    
    <div id="queueStatus" class="queue-status">
      <div>Please wait, you are being processed</div>
      <div class="dots-loader">
        <div class="dot"></div>
        <div class="dot"></div>
        <div class="dot"></div>
      </div>
      <span id="queuePosition" class="queue-position" style="display:none;"></span>
    </div>
    
    <?php if($tx || $rid): ?>
    <div class="info-section">
      <?php if($rid): ?>
      <div class="info-row">
        <span class="info-label">Reservation ID</span>
        <span class="info-value"><?= $rid ?></span>
      </div>
      <?php endif; ?>
      <?php if($tx): ?>
      <div class="info-row">
        <span class="info-label">Transaction ID</span>
        <span class="info-value"><?= $tx ?></span>
      </div>
      <?php endif; ?>
    </div>
    <?php endif; ?>
    
    <a href="index.php" class="btn-home">Return to Home</a>
  </div>
</div>

<?php require('inc/footer.php'); ?>

<?php if($rid && $queued): ?>
<script>
const rid = <?= json_encode($rid) ?>;
const statusIcon = document.getElementById('statusIcon');
const queueStatus = document.getElementById('queueStatus');
const queuePosition = document.getElementById('queuePosition');
let pollCount = 0;

function updateQueueDisplay(position) {
  if(position !== null && position !== undefined) {
    queuePosition.style.display = 'block';
    if(position === 0 || position === 1) {
      queueStatus.innerHTML = `
        <div>Please wait, you are</div>
        <span class="queue-position">1st in line</span>
      `;
    } else if(position === 2) {
      queueStatus.innerHTML = `
        <div>Please wait, you are</div>
        <span class="queue-position">2nd in line</span>
      `;
    } else if(position === 3) {
      queueStatus.innerHTML = `
        <div>Please wait, you are</div>
        <span class="queue-position">3rd in line</span>
      `;
    } else {
      queueStatus.innerHTML = `
        <div>Please wait, you are</div>
        <span class="queue-position">${position}th in line</span>
      `;
    }
  }
}

function checkStatus(){
  let url = 'reservation_status.php?rid=' + encodeURIComponent(rid);
  if(<?= json_encode($status_token !== '') ?>){ url += '&token=' + encodeURIComponent(<?= json_encode($status_token) ?>); }
  
  fetch(url).then(r=>r.json()).then(json=>{
    pollCount++;
    if(json && json.success){
      const s = (json.status || '').toLowerCase();
      
      if(s === 'confirmed'){
        statusIcon.className = 'status-icon confirmed';
        statusIcon.innerHTML = '<div class="checkmark">✓</div>';
        queueStatus.className = 'success-message';
        queueStatus.innerHTML = '🎉 Your reservation has been approved!<br><span style="font-size: 14px; font-weight: 400; opacity: 0.9;">Redirecting you to home page...</span>';
        
        setTimeout(()=>{ window.location.href = 'index.php'; }, 3000);
        return;
      } else if(s === 'cancelled'){
        statusIcon.className = 'status-icon cancelled';
        statusIcon.innerHTML = '<div class="checkmark">✕</div>';
        queueStatus.className = 'error-message';
        queueStatus.innerHTML = '❌ Your reservation was cancelled by staff';
        return;
      } else {
        // Still queued - fetch position
        if(<?= json_encode($room_param !== '') ?>){
          let posUrl = 'queue_position.php?room_id=' + encodeURIComponent(<?= json_encode($room_param) ?>);
          if(<?= json_encode($status_token !== '') ?>) posUrl += '&token=' + encodeURIComponent(<?= json_encode($status_token) ?>);
          
          fetch(posUrl).then(r=>r.json()).then(pj=>{
            if(pj && pj.success) {
              const ahead = pj.ahead || 0;
              updateQueueDisplay(ahead + 1);
            }
          }).catch(()=>{});
        }
      }
    }
    
    if(pollCount < 60) setTimeout(checkStatus, 5000);
  }).catch(err=>{
    if(pollCount < 60) setTimeout(checkStatus, 5000);
  });
}

// Initial status check
checkStatus();

// Show initial queue position if provided
<?php if(isset($_GET['queue_position'])): ?>
  updateQueueDisplay(<?= (int)$_GET['queue_position'] ?>);
<?php endif; ?>
</script>
<?php endif; ?>