    new Swiper(".card-slider", {
      slidesPerView: 1.25,
      spaceBetween: 20,
      loop: false,
      autoplay: false,
      grabCursor: true,  
      rtl: true,
      breakpoints: {
        640: {
          slidesPerView: 2.25,
        },
        1024: {
          slidesPerView: 3.25,
        }
      }
    });

    

    document.querySelectorAll('.secound-sec-timer-count-number').forEach(function (el) {
      const deadline = parseInt(el.getAttribute('data-deadline')) * 1000;
  
      function updateTimer() {
        const now = new Date().getTime();
        let distance = deadline - now;
  
        if (distance < 0) {
          el.textContent = '0:0:0:0';
          el.disabled = true;
          return;
        }
  
        let d = Math.floor(distance / (1000 * 60 * 60 * 24));
        let h = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        let m = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        let s = Math.floor((distance % (1000 * 60)) / 1000);
  
        el.textContent = `${d}:${h}:${m}:${s}`;
        setTimeout(updateTimer, 1000);
      }
  
      updateTimer();
    });


function copyToClipboard(text) {
  if (text != "") {
    if (!navigator.clipboard) {
      const textarea = document.createElement("textarea");
      textarea.value = text;
      document.body.appendChild(textarea);
      textarea.select();
      document.execCommand("copy");
      document.body.removeChild(textarea);
      alert("Copied: " + text);
    } else {
      navigator.clipboard.writeText(text).then(() => {
        alert("Copied: " + text);
      });
    }
  }else {
    alert('Coupon not found');
  }
} 