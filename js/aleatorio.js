  document.addEventListener('DOMContentLoaded', function () {
                    var videos = [
                        "../img/Videos/video2.mp4",
                        "../img/Videos/video3.mp4",
                        "../img/Videos/video1.mp4",
                    ];

                    var videoElement = document.getElementById('background-video');
                    var randomVideo = videos[Math.floor(Math.random() * videos.length)];
                    videoElement.innerHTML = '<source src="' + randomVideo + '" type="video/mp4">';
                });
               