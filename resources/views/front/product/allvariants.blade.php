@extends('front.layout.app')
@section('content')
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-fullscreen search-modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="search-form col-md-6 offset-md-3">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search products…"
                                aria-label="Recipient's username" aria-describedby="basic-addon2">
                            <span class="input-group-text" id="basic-addon2"><button type="submit" class="btn "><i
                                        class="fa-solid fa-lg fa-magnifying-glass"></i></button></span>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <section class="page-banner-outr" style="background: url('{{ URL::asset($category->image) }}')">
        <div class="overlay">
            <div class="page-banner-caption-outr">
                <div class="container text-center" data-aos="fade-up">
                    <h1>{{ $category->title }}</h1>
                    <p>{{ $product->title }}</p>
                </div>
            </div>
        </div>
    </section>
    @if (isset($product->varients) && count($product->varients) > 0)
        <section class="variants-sec-outr product-outr">
            <div class="container" data-aos="zoom-in">
                <div class="welcome-heading border-zero text-center bor-none heading-color-one">
                    <h2>All Variants</h2>
                </div>
                <div class="recent-port-slidr-outr variant-slidr-outr">
                    <div class="row">
                        @foreach ($product->varients as $key => $varient)
                            <div class="item col-sm-3 product-box-col mt-5 aos-init aos-animate">
                                <a
                                    href="{{ route('productVariant', [$category->slug, createSlug($product->title), createSlug($varient->title), createSlug($varient->varient_code)]) }}">
                                    <div
                                        class="product-box-outr d-flex justify-content-center align-items-center flex-column variant-box-outr">
                                        <i class="mb-3"><img src="{{ URL::asset($varient->image) }}"
                                                alt="{{ $varient->title }}" /></i>
                                        <h4>{{ $varient->title }}</h4>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
    @endif
@endsection
@section('script')
    <script>
        $(document).ready(function() {
            $('#productEnquiryFrm').on('submit', function(e) {
                $('#errorMsg').html('');
                e.preventDefault();
                var formData = $(this).serialize();
                $('#proccedtologin').show();
                $.ajax({
                    type: 'POST',
                    url: '{{ route('productEnquirySubmit') }}',
                    data: formData,
                    success: function(response) {
                        if (response.status == 'success') {
                            $('#loginmsg').html(response.message);
                            setTimeout(() => {
                                $('#proccedtologin').hide();
                            }, 4000);
                            $('#productEnquiryFrm')[0].reset();
                        } else {
                            $('#errorMsg').html(
                                'There was an error sending your message. Please try again.'
                            );
                            $('#proccedtologin').hide();
                        }
                    },
                    error: function() {
                        $('#errorMsg').html(
                            'There was an error sending your message. Please try again.');
                        $('#proccedtologin').hide();
                    }
                });
            });
        });
    </script>
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/slick/slick.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/slick/slick-theme.css') }}" />
    <script src="{{ URL::asset('assets/slick/slick.min.js') }}"></script>
    <script src="{{ URL::asset('assets/slick/custom-js.js') }}"></script>
    <link data-stencil-stylesheet href="{{ URL::asset('assets/css/audio.css') }}" rel="stylesheet">
    <script defer src="https://use.fontawesome.com/releases/v5.4.2/js/all.js"
        integrity="sha384-wp96dIgDl5BLlOXb4VMinXPNiB32VYBSoXOoiARzSTXY+tsK8yDTYfvdTyqzdGGN" crossorigin="anonymous">
    </script>
    <script defer
        src="https://cdn11.bigcommerce.com/s-9dd0a/stencil/f7c43a30-889d-013d-3ca2-72584e4a32ec/e/7cc4d4f0-af28-013d-28ec-2e572200cb89/js/plyr.js">
    </script>
    <script>
        $(document).ready(function() {
            var songDetails = [];
            var audioText = audioId = "";
            let progress = 0; // Initial progress value
            $(".getvalue").each(function(index) {
                audioText = $(this).text();
                audioId = $(this).data("product");
                const audioPlayer = document.createElement("audio");
                audioPlayer.id = `audio${audioId}`;
                audioPlayer.classList.add('sample-audio--audio');
                audioPlayer.preload = "none";
                // Create a source element and set its attributes
                const source = document.createElement("source");
                source.src = audioText;
                source.type = "audio/mp3";
                // Append source to audio player
                audioPlayer.appendChild(source);
                $(this).after(audioPlayer);
                //initialize plyr player
                songDetails[audioId] = new Plyr(`#audio${audioId}`, {
                    controls: [], //hide plyr audio controls
                });
            })
            var j = 0;
            $(".song-title").each(function(index) {
                var customUrl = $(this).attr("data-custom");
                var lenghtindex = $(this).parent().parent().parent().find(".player").length;
                i = 1
                for (var j = 0; j <= lenghtindex; j++) {
                    if (j >= 1) {
                        //if audio is greater than 1 we add nos. of audios
                        $(this).parent().parent().parent().find(".song-title").eq(j).text("Play Sound" +
                            " " + i);
                        i = i + 1;
                    } else {
                        $(this).parent().parent().parent().find(".song-title").eq(j).text("Play Sound");
                        i = i + 1;
                    }
                }
            });

            function progressBar(playerData) {
                var progressBarId = playerData.player_id;
                var player = playerData.player;
                var playButton = playerData.play_button;
                var pauseButton = playerData.pause_button;
                var progressBar = $(`#progress_${progressBarId}`);
                const currentProgress = setInterval(function() {
                    const currentTime = player.currentTime;
                    const duration = player.duration;
                    if (currentTime && duration) {
                        const progress = (currentTime / duration) * 100;
                        progressBar.val(progress); // Update the progress bar value
                        //if player is ended
                        if (player.ended) {
                            playButton.show();
                            pauseButton.hide();
                            progressBar.val(0);
                            clearInterval(currentProgress); //if the audio is ended clear the interval
                        }
                    }
                }, 500); // Update every 500 milliseconds (adjust as needed)
            }

            function controlPlayer(playerData) {
                var playButton = playerData.play_button;
                var pauseButton = playerData.pause_button;
                var targetId = playerData.player_id;
                var player = playerData.player;
                if (player) {
                    if (player.paused) {
                        playButton.hide();
                        pauseButton.show();
                        player.play();
                        progressBar(playerData)
                    } else if (player.ended) {
                        plyr.stop();
                        pauseButton.hide();
                        playButton.show();
                    } else {
                        player.pause();
                        pauseButton.hide();
                        playButton.show();
                    }
                }
            }
            $(".sample-audio--play-pause").on("click", function() {
                console.log(songDetails)
                var targetId = $(this).attr("data-audio"); //get audio id to play
                console.log(targetId)
                var player = songDetails[targetId];
                const playButton = $(this).find("svg.sample-audio--play");
                const pauseButton = $(this).find("svg.sample-audio--pause");
                const currentPlayerData = {
                    "player_id": targetId,
                    "player": player,
                    "play_button": playButton,
                    "pause_button": pauseButton
                };
                controlPlayer(currentPlayerData);
            })
            // Function to update progress bar
            function updateProgressBar(currentProgressBar, audioPlayer) {
                const audio = audioPlayer[0];
                const progress = (audio.currentTime / audio.duration) * 100;
                $(currentProgressBar).val(progress);
            }
            // Function to scroll progress bar
            function scrollProgressBar(event, currentProgressBar, playerToPlay) {
                const containerWidth = $(currentProgressBar).parent().width();
                const clickX = event.pageX - $(currentProgressBar).parent().offset().left;
                progress = (clickX / containerWidth) * 100;
                const audioPlayer = $(`#audio${playerToPlay}`)
                const newPosition = (clickX / containerWidth) * audioPlayer[0].duration;
                audioPlayer[0].currentTime = newPosition;
                updateProgressBar(currentProgressBar, audioPlayer);
                var player = songDetails[playerToPlay];
                var playPauseButton = $("*[data-audio='" + playerToPlay + "']")
                var playButton = playPauseButton.find(".sample-audio--play").hide();
                var pauseButton = playPauseButton.find(".sample-audio--pause").show();
                var currentPlayerData = {
                    "player_id": playerToPlay,
                    "player": player,
                    "play_button": playButton,
                    "pause_button": pauseButton
                };
                player.play(); // Play the audio from the new position
                progressBar(currentPlayerData);
            }
            // Update progress bar on click
            $('.progress').click(function(event) {
                var currentProgressBar = $(this);
                var playerToPlay = $(this).data('product')
                scrollProgressBar(event, currentProgressBar, playerToPlay);
            });
            // $(".productView-product .sample-audio--toggle.sample-audio--open-close").on('click', function() {
            //   if ($(".productView-product .player:gt(2)").css("display") == 'block') {
            //     $(".productView-product .player:gt(2)").css("display", "none");
            //   } else {
            //     $(".productView-product .player:gt(2)").css("display", "block");
            //   }
            // });
            //for pdp page
            $(".sample-audio--toggle.sample-audio--open-close").each(function() {
                var playerlength = $(this).parent().parent().find(".player").length;
                var player = $(this).parent().parent().find(".player")
                var viewAllButton = $(this).parent().parent().find(".sample-audio.sample-audio--view-all");
                if (playerlength > 2) {
                    viewAllButton.show();
                } else {
                    viewAllButton.hide()
                }
                for (i = 0; i < playerlength; i++) {
                    //if the player length is greater than 2 hide the player and show view all  button
                    if (i >= 2) {
                        for (j = 2; j < playerlength; j++) {
                            $(this).parent().parent().find(".player").eq(j).css("display", "none");
                        }
                    }
                }
                //toogle view all button
                $(this).click(function() {
                    for (j = 2; j < playerlength; j++) {
                        if ($(this).parent().parent().find(".player").eq(j).css("display") ==
                            "block") {
                            $(this).parent().parent().find(".player").eq(j).css("display", "none");
                            $(this).parent().find(".view_all_only").hide()
                            $(this).parent().find(".view_all_default").show()
                        } else {
                            $(this).parent().parent().find(".player").eq(j).css("display", "block");
                            $(this).parent().find(".view_all_only").show()
                            $(this).parent().find(".view_all_default").hide()
                        }
                    }
                });
                //only applicable for home and search page
                if ($('body').hasClass('default-page') || $('body').hasClass('search-page')) {
                    if (playerlength <= 2) {
                        $(this).parent().css("display", "none");
                    }
                }
            });
            $(".productView-product .sample-audio--toggle.sample-audio--open-close").each(function() {
                // var playerlength = $(this).parent().parent().find(".player").length;
                var player = $(this).parent().parent().find(".sample-audio[data-product-audio]");
                //if the player length is greater than 2 hide the player and show view all  button
                if (player.length > 2) {
                    $(".sample-audio.sample-audio--view-all").show();
                } else {
                    $(".sample-audio.sample-audio--view-all").hide()
                }
                if (player.length >= 2) {
                    for (let i = 2; i < player.length; i++) {
                        player.eq(i).css("display", "none");
                    }
                }
                //toogle view all button
                $(this).click(function() {
                    // console.log($(this))
                    for (let i = 2; i < player.length; i++) {
                        if (player.eq(i).css("display") == "block") {
                            $(this).parent().find(".view_all_only").hide()
                            $(this).parent().find(".view_all_default").show()
                            player.eq(i).css("display", "none");
                        } else {
                            $(this).parent().find(".view_all_only").show()
                            $(this).parent().find(".view_all_default").hide()
                            player.eq(i).css("display", "block");
                        }
                    }
                });
            });
        });
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const buttons = document.querySelectorAll('.sample-audio--toggle');

            buttons.forEach(button => {
                button.addEventListener('click', function() {
                    const audioIndex = this.getAttribute('data-audio');
                    const audioUrlElement = document.querySelector(
                        `.getvalue[data-product="${audioIndex}"]`);
                    const audioUrl = audioUrlElement ? audioUrlElement.textContent.trim() : null;
                    const progress = document.getElementById(`progress_${audioIndex}`);

                    // Create or retrieve audio element
                    if (!this.audio) {
                        this.audio = new Audio(audioUrl);
                        this.audio.addEventListener('timeupdate', function() {
                            const percent = (this.currentTime / this.duration) * 100;
                            progress.value = percent;
                        });
                        this.audio.addEventListener('ended', () => {
                            button.classList.remove('playing');
                        });
                    }

                    if (this.audio.paused) {
                        this.audio.play();
                        button.classList.add('playing');
                    } else {
                        this.audio.pause();
                        button.classList.remove('playing');
                    }
                });
            });
        });
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const progress = document.getElementById('progress_4');
            const audioUrl = progress.closest('.sample-audio').getAttribute('data-product-audio');
            const audio = new Audio(audioUrl);

            let isDragging = false;

            // Sync the progress bar while audio is playing
            audio.addEventListener('timeupdate', () => {
                const value = (audio.currentTime / audio.duration) * 100;
                progress.value = value;
            });

            // Play/pause toggle
            document.querySelector('[data-audio="4"]').addEventListener('click', () => {
                if (audio.paused) {
                    audio.play();
                } else {
                    audio.pause();
                }
            });

            // Click and drag seek
            const seek = (e) => {
                const rect = progress.getBoundingClientRect();
                const percent = (e.clientX - rect.left) / rect.width;
                const newTime = percent * audio.duration;
                audio.currentTime = newTime;
            };

            progress.addEventListener('mousedown', (e) => {
                isDragging = true;
                seek(e);
            });

            document.addEventListener('mousemove', (e) => {
                if (isDragging) seek(e);
            });

            document.addEventListener('mouseup', () => {
                isDragging = false;
            });

            // Click-only seek
            progress.addEventListener('click', (e) => seek(e));
        });
    </script>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/elevatezoom/3.0.8/jquery.elevatezoom.min.js"></script>
    <script>
        $(document).ready(function() {
            const sync1 = $("#sync1");
            const sync2 = $("#sync2");
            const slidesPerPage = 3;
            let syncedSecondary = true;

            // Main carousel
            sync1.owlCarousel({
                items: 1,
                slideSpeed: 2000,
                nav: false,
                autoplay: false,
                dots: false,
                loop: true,
                responsiveRefreshRate: 200
            }).on("changed.owl.carousel", syncPosition);

            // Thumbnail carousel
            sync2.owlCarousel({
                items: slidesPerPage,
                dots: false,
                nav: true,
                smartSpeed: 200,
                slideSpeed: 500,
                margin: 10,
                slideBy: slidesPerPage,
                navText: [
                    "<i class='fa fa-lg fa-chevron-left'></i>",
                    "<i class='fa fa-lg fa-chevron-right'></i>"
                ],
                responsiveRefreshRate: 100,
                loop: false, // or true if you want infinite thumbnails
                responsive: {
                    0: {
                        items: 2
                    },
                    600: {
                        items: 3
                    },
                    1000: {
                        items: 3
                    }
                }
            });

            // Click thumbnail to sync both carousels
            sync2.on("click", ".owl-item", function(e) {
                e.preventDefault();
                const clickedIndex = $(this).index() - sync2.find('.cloned').length / 2;
                const realIndex = (clickedIndex + sync1.find('.owl-item:not(.cloned)').length) % sync1.find(
                    '.owl-item:not(.cloned)').length;

                // Move main carousel
                sync1.trigger("to.owl.carousel", [realIndex, 300, true]);

                // Also center/move thumbnails properly
                const onscreen = sync2.find('.owl-item.active').length;
                const center = clickedIndex - Math.floor(onscreen / 2);
                sync2.trigger("to.owl.carousel", [center >= 0 ? center : 0, 300, true]);
            });

            // Sync main to thumbnail
            function syncPosition(el) {
                const count = el.item.count;
                let current = el.item.index - Math.floor(el.relatedTarget._clones.length / 2);
                if (current < 0) current = count - 1;
                if (current >= count) current = 0;

                sync2.find(".owl-item").removeClass("current").eq(current).addClass("current");

                const onscreen = sync2.find('.owl-item.active').length;
                const start = sync2.find('.owl-item.active').first().index();
                const end = sync2.find('.owl-item.active').last().index();

                if (current > end) {
                    sync2.trigger("to.owl.carousel", [current - onscreen + 1, 300, true]);
                } else if (current < start) {
                    sync2.trigger("to.owl.carousel", [current, 300, true]);
                } else {
                    sync2.trigger("to.owl.carousel", [current - Math.floor(onscreen / 2), 300, true]);
                }

                setTimeout(setupResponsiveZoom, 100);
            }

            // Destroy zoom before re-initializing
            function destroyZoom() {
                $(".zoom-img").each(function() {
                    if ($(this).data("elevateZoom")) {
                        $.removeData(this, "elevateZoom");
                        $(".zoomContainer", $(this).closest(".item")).remove();
                        $(this).off(".elevateZoom");
                    }
                });
            }

            // Initialize zoom on active item
            function initZoom(type = "window") {
                const $currentItem = $("#sync1 .owl-item.active .zoom-img");

                $currentItem.each(function() {
                    const $img = $(this);
                    $img.elevateZoom({
                        zoomType: type,
                        cursor: "crosshair",
                        zoomWindowFadeIn: 300,
                        zoomWindowFadeOut: 300,
                        responsive: true,
                        zoomWindowWidth: 400,
                        zoomWindowHeight: 400,
                        zoomWindowPosition: 1,
                        zoomContainerAppendTo: $img.closest(".item")
                    });
                });
            }

            // Handle zoom type based on window size
            function setupResponsiveZoom() {
                destroyZoom();
                if (window.innerWidth < 992) {
                    initZoom("inner");
                } else {
                    initZoom("window");
                }
            }

            // Initial zoom setup
            setupResponsiveZoom();
            $(window).on("resize", setupResponsiveZoom);
        });
    </script>
@endsection
