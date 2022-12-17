document.addEventListener('DOMContentLoaded', () => {
    let videoContainer = document.querySelector('.background-video-fix video');
    videoContainer.style.opacity = "0";
    detectPowerSavingMode();
    detectFrameRate();
    detectPowerSavingMode().then((result) => {
        if (result == true) {
            videoContainer.style.opacity = "0";
            triggerVideoPlay()
        } else {
            videoContainer.style.opacity = "1";
        }
    });
    function triggerVideoPlay() {
        jQuery('body').on('click touchstart', function () {
            let videoContainer = document.querySelector('.background-video-fix video');
            if (videoContainer.playing) {
                
            }
            else {
                videoContainer.play();
                videoContainer.style.opacity = "1";
            }
        });
    }    
});