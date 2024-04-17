document.addEventListener("DOMContentLoaded", function() {
    const animeName = new URLSearchParams(window.location.search).get('name');
    if (animeName) {
        fetch('videos.json')
            .then(response => response.json())
            .then(data => {
                const animeVideos = data.videos.filter(video => video.anime === animeName);
                if (animeVideos.length > 0) {
                    const videoPlayer = document.getElementById('videoPlayer');
                    animeVideos.forEach(video => {
                        // Create video element
                        const videoElement = document.createElement('video');
                        videoElement.src = video.url;
                        videoElement.controls = true;
                        videoElement.classList.add('video-player');
                        // Create title element
                        const titleElement = document.createElement('h3');
                        titleElement.textContent = video.title;
                        // Append video and title to player
                        videoPlayer.appendChild(titleElement);
                        videoPlayer.appendChild(videoElement);
                    });
                } else {
                    console.error('No episodes found for the anime.');
                }
            })
            .catch(error => console.error('Error fetching JSON:', error));
    }
});

