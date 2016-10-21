   <div class="modal-container hidden" id="modal-comment">
    <div class="row">
        <div class="desktop-12">
            <div class="modal modal-comment">
                <div class="row clearfix">
                    <div class="comment-container">
                        <div class="desktop-8 collapse">
                            <div id="comment-image"></div>
                        </div>
                        <div class="desktop-4 collapse">
                            <div class="interaction">
                                                                    <div class="interaction-item" id="like-post"><i class="fa fa-thumbs-up" aria-hidden="true"></i>Like
                                                                            </div>
                                <div class="interaction-item"><i class="fa fa-share-alt" aria-hidden="true"></i>Share
                                </div>
                                                            </div>
                            <div id="comments-container" class="comments">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div><div class="container">
    <div class="row clearfix">
        <div class="desktop-12">
            <div class="nav-spacer"></div>
        </div>
    </div>
    <div class="row clearfix">
        <div class="desktop-12">
            <div class="standard-tile">
                    <div id="overlays-container"></div>
                    <div class="row clearfix">
                        <div class="desktop-2"><div class="overlay-item overlay-selected" data-overlay="/img/beards/beard-1.png" onclick="overlay(this)"><img src="/img/beards/beard-1-thumb.png"></div></div>
                        <div class="desktop-2"><div class="overlay-item" data-overlay="/img/beards/beard-2.png" onclick="overlay(this)"><img src="/img/beards/beard-2-thumb.png"></div></div>
                        <div class="desktop-2"><div class="overlay-item" data-overlay="/img/beards/beard-3.png" onclick="overlay(this)"><img src="/img/beards/beard-3-thumb.png"></div></div>
                        <div class="desktop-2"><div class="overlay-item" data-overlay="/img/beards/beard-4.png" onclick="overlay(this)"><img src="/img/beards/beard-4-thumb.png"></div></div>
                        <div class="desktop-2"><div class="overlay-item" data-overlay="/img/beards/beard-5.png" onclick="overlay(this)"><img src="/img/beards/beard-5-thumb.png"></div></div>
                </div>
            </div>
        </div>
    </div>
    <div class="row clearfix" onload="">
        <div class="desktop-8">
            <div class="standard-tile" id="webcam-tile">
                <div id="preview-overlay"><img src="/img/beards/beard-1.png"></div>
                <video id="video" autoplay="true" style="display:none;"></video>
                <canvas id="webcam-canvas" style="width:100%;" width="800" height="500"></canvas>
                <div class="webcam-button" id="webcam-snap" onclick="ft_save_image()"><i class="fa fa-camera" aria-hidden="true"></i></div>
            </div>
        </div>
        <div class="desktop-4">
            <div class="standard-tile" id="webcam-temp">
                <div id="user-images-container">
                <div id="user_images">
                <img id="59" src="/usr/26/tmp/img-2016-10-18-045121.png" onclick="show_modal(&quot;modal-comment&quot;); comment_image(this); ft_get_comments(this);"><img id="60" src="/usr/26/tmp/img-2016-10-18-045123.png" onclick="show_modal(&quot;modal-comment&quot;); comment_image(this); ft_get_comments(this);"><img id="61" src="/usr/26/tmp/img-2016-10-18-045124.png" onclick="show_modal(&quot;modal-comment&quot;); comment_image(this); ft_get_comments(this);"><img id="62" src="/usr/26/tmp/img-2016-10-18-045127.png" onclick="show_modal(&quot;modal-comment&quot;); comment_image(this); ft_get_comments(this);">                </div>
                </div>
            </div>
        </div>
    </div>
</div>