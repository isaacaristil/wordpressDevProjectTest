<?php
$fields = get_query_var('fields', false);

if (!empty($fields['video_presentation_chapters'])) {
    $video_list = [];
    ?>
    <div class="video-presentation">
        <div class="video-presentation__video">
            <div class="embed-responsive embed-responsive-4by3">
                <?php
                foreach ($fields['video_presentation_chapters'] as $k => $chapter) {
                    ?><video class="embed-responsive-item js-video" style="opacity: <?= $k == 0 ? 1 : 0 ?>" src="<?= $chapter['video_presentation_video']['url'] ?>" data-index="<?= $k ?>" <?= $k == 0 ? 'autoplay' : '' ?>></video><?php
                }
                ?>
            </div>
        </div>
        <div class="video-presentation__contents">
            <?php
            foreach ($fields['video_presentation_chapters'] as $k => $chapter) {
                $video_list[$k] = $chapter['video_presentation_video']['url'];
                ?>
                <div class="video-presentation__content js-content<?= $k == 0 ? ' video-presentation__content--active':'' ?>" id="chapter_<?= $k ?>" data-src-video="<?= $chapter['video_presentation_video']['url'] ?>">
                    <?php
                    if (!empty($chapter['video_presentation_title'])) {
                        ?><div class="video-presentation__title"><?= $chapter['video_presentation_title'] ?></div><?php
                    }
                    if (!empty($chapter['video_presentation_text'])) {
                        ?><div class="video-presentation__text"><?= $chapter['video_presentation_text'] ?></div><?php
                    }
                    if (!empty($chapter['video_presentation_points'])) {
                        ?>
                        <div class="video-presentations__points">
                            <div class="row">
                                <div class="col-xs-6">
                                <?php
                                foreach ($chapter['video_presentation_points'] as $k => $point) {
                                    if ($k % 4 == 0 && $k !== 0) {
                                        echo '</div><div class="col-xs-6">';
                                    }

                                    if (!empty ($point['video_presentation_point'])) {
                                        ?>
                                        <div class="point">
                                            <div class="point__number"><div><?= $k + 1 ?></div></div>
                                            <div class="point__label"><?= $point['video_presentation_point'] ?></div>
                                        </div>
                                        <?php
                                    }
                                }
                                ?>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                    ?>
                </div>
                <?php
            }
            ?>
        </div>
    </div>
    <div class="controls">
        <div class="controls__progress">
            <?php
            foreach ($fields['video_presentation_chapters'] as $k => $chapter) {
                ?>
                <div class="progress js-progress<?= $k == 0 ? ' progress--active' : '' ?>">
                    <div class="progress__bubble js-bubble"></div>
                    <div class="progress__bar">
                        <div class="progress__status"></div>
                    </div>
                </div>
                <?php
            }
            ?>
        </div>
        <div class="controls__play js-play-toggle pause"></div>
    </div>
    <?php

    add_action('wp_footer', function() use ($video_list) {
        ?>
        <script>
            var videoList = <?= json_encode($video_list) ?>;
            var videoPlayers = document.querySelectorAll('.js-video');
            var playBtn = document.querySelector('.js-play-toggle');
            var progressBars = document.querySelectorAll('.js-progress');
            var bubbleBtns = document.querySelectorAll('.js-bubble');
            var videoContents = document.querySelectorAll('.js-content');
            var currentlyPlaying = 0;

            /**
             * Videos management
             */
            for (var i = 0; i < videoPlayers.length; i++) {
                // video ended event
                videoPlayers[i].addEventListener('ended', function () {
                    // did we reached the end of the playlist ?
                    if (currentlyPlaying + 1 == videoPlayers.length) {
                        playBtn.classList.remove('play');
                        playBtn.classList.add('pause');
                        return false;
                    }
                    // hide the player
                    videoPlayers[currentlyPlaying].style.opacity = 0;
                    // hide content
                    videoContents[currentlyPlaying].classList.remove('video-presentation__content--active');

                    currentlyPlaying++;

                    // show the next player
                    videoPlayers[currentlyPlaying].style.opacity = 1;
                    videoPlayers[currentlyPlaying].play();

                    // show the next content
                    videoContents[currentlyPlaying].classList.add('video-presentation__content--active');

                    // activate the progress bar
                    progressBars[currentlyPlaying].classList.add('progress--active');
                });

                // progress bar
                videoPlayers[i].addEventListener('timeupdate', function (e) {
                    if(!isNaN(this.currentTime)) {
                        // percentage of video loaded
                        var proportion = (this.currentTime / this.duration) * 100;
                        progressBars[currentlyPlaying].querySelector('.progress__status').style.width = proportion+"%";
                    }
                });
            }

            /**
             * Play / Pause button
             */
            playBtn.addEventListener('click', function () {
                if (videoPlayers[currentlyPlaying].paused === false) {
                    playBtn.classList.remove('play');
                    playBtn.classList.add('pause');
                    videoPlayers[currentlyPlaying].pause();
                } else {
                    if (currentlyPlaying + 1 == videoPlayers.length && videoPlayers[currentlyPlaying].currentTime == videoPlayers[currentlyPlaying].duration) {
                        // reset
                        resetVideoPresentation();
                        // next time we'll hit play, it will start from the beginning
                        currentlyPlaying = 0;
                    }

                    playBtn.classList.remove('pause');
                    playBtn.classList.add('play');
                    videoPlayers[currentlyPlaying].play();
                }
            });

            /**
             * Bubbles management
             * Allows to jump to a chapter
             */
            for (var i = 0; i < bubbleBtns.length; i++) {
                bubbleBtns[i].addEventListener('click', function () {
                    videoPlayers[currentlyPlaying].pause();

                    // reset
                    resetVideoPresentation();

                    // get the position of the bubble
                    nodes = Array.prototype.slice.call(bubbleBtns);
                    currentlyPlaying = nodes.indexOf(this);

                    playBtn.classList.remove('pause');
                    playBtn.classList.add('play');
                    videoPlayers[currentlyPlaying].style.opacity = 1;
                    videoPlayers[currentlyPlaying].play();
                    progressBars[currentlyPlaying].classList.add('progress--active');

                    // show the next content
                    videoContents[currentlyPlaying].classList.add('video-presentation__content--active');
                })
            }

            /**
             * Remove all active classes, reset progress, etc.
             * 
             * Happens when clicking on a bubble or when the player is playing the first video again
             */
            function resetVideoPresentation() {
                for (var k = 0; k < videoPlayers.length; k++) {
                    videoPlayers[k].style.opacity = 0;
                    progressBars[k].querySelector('.progress__status').style.width = 0;
                    progressBars[k].classList.remove('progress--active');
                    videoContents[currentlyPlaying].classList.remove('video-presentation__content--active');
                }
            }

            /**
             * On init, if the video is not playing, then the browser might not support
             * autoplay. We simply need to toggle the switch on pause.
             */
            setTimeout(function () {
                if (videoPlayers[0].currentTime < .5 ) {
                    videoPlayers[0].play();
                }
            }, 4000);
        </script>
      <?php
    });
    
}
