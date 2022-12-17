document.addEventListener('DOMContentLoaded', () => {
    let videoContainer = document.querySelector('.background-video-fix video');
    videoContainer.style.opacity = "0";
    detectPowerSavingMode();
    detectFrameRate();
    detectPowerSavingMode().then((result) => {
        if (result == true) {
            videoContainer.style.opacity = "0";
        } else {
            videoContainer.style.opacity = "1";
        }
    });
});