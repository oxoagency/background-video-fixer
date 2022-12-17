// When the window was loaded
window.addEventListener('DOMContentLoaded', () => {

    // When Elementor was loaded
    window.addEventListener('elementor/frontend/init', () => {

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
            let videoPlayer = document.querySelector('.background-video-fix video');
            jQuery('body').on('click touchstart', function () {
                if (videoPlayer.playing) {

                } else {
                    videoPlayer.play();
                    videoPlayer.style.opacity = "1";
                }
            });
        }

    });

});