// انیمیشن برای اعلان‌ها
document.addEventListener('DOMContentLoaded', function () {
    const notifications = document.querySelectorAll('.notification');
    notifications.forEach((notification, index) => {
        notification.style.animation = `fadeIn 0.5s ease ${index * 0.2}s forwards`;
    });
});

// انیمیشن فید در
@keyframes fadeIn {
    from {
        opacity: 0;
    }
    to {
        opacity: 1;
    }
}
document.addEventListener('DOMContentLoaded', function () {
    // نمایش پاپ‌آپ بعد از 3 ثانیه
    setTimeout(function() {
        var popup = document.querySelector('.notification-popup');
        popup.style.display = 'block'; // نمایش پاپ‌آپ
    }, 3000); // 3 ثانیه تا نمایش

    // بستن پاپ‌آپ با کلیک روی دکمه بستن
    var closeButton = document.querySelector('.notification-popup .close-btn');
    if (closeButton) {
        closeButton.addEventListener('click', function() {
            var popup = document.querySelector('.notification-popup');
            popup.style.display = 'none'; // مخفی کردن پاپ‌آپ
        });
    }
});
