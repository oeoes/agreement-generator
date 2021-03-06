(function (global, $) {
  "use strict";

  var init = function(){
    var plyrist, wavesurfer;
    $(document).on('click', '.btn-play' ,function(e){
      initPlayer();
      var self = $(this).closest('[data-id]'),
          id = self.attr('data-id');
      if(plyrist.getIndex(id) > 0){
        plyrist.play({id: id});
      }else{
        plyrist.play({
          id: id,
          title: self.find('.title').text(),
          uri: self.find('.title').attr('href'),
          author: self.find('.subtitle').text(),
          poster: self.find('.media-content').css('background-image').replace(/^url|[\(\)]/g, ''),
          type: 'audio',
          source: self.attr('data-source')
        });
      }
    });

    function initPlayer(){
      if(plyrist) return;
      plyrist = new Plyrist(
        {
          playlist: '#plyrist', 
          player: 'audio'
        },
        [],
        {
          theme: 0
        }
      );
      plyrist.player.on('play', event => {
        updateDisplay();
      });

      plyrist.player.on('pause', event => {
        updateDisplay();
      });

      plyrist.player.on('timeupdate', event => {
        var item = plyrist.getCurrent();
        var el = $('[data-id="'+item.id+'"]');
        if(plyrist.player.duration > 0 && el.find('#waveform').length){
          wavesurfer && wavesurfer.drawer.progress( plyrist.player.currentTime/(plyrist.player.duration) );
        }
      });
    }

    function initWave(){
      var c = '#waveform';
      if(wavesurfer) wavesurfer.destroy();
      if(!$(c).length) return;
      var ctx = document.createElement('canvas').getContext('2d');
      var linGrad = ctx.createLinearGradient(0, 10, 0, 60);
      linGrad.addColorStop(0.5, 'rgba(68, 139, 255, 0.5)');
      linGrad.addColorStop(0.5, 'rgba(68, 139, 255, 0.15)');
      
      wavesurfer = WaveSurfer.create({
        container: c,
        waveColor: linGrad,
        progressColor: 'rgba(68, 139, 255, 0.5)',
        cursorColor: 'rgba(68, 139, 255, 1)',
        height: 30,
        barWidth: 3
      });

      wavesurfer.load($(c).closest('[data-id]').attr('data-source'));

      wavesurfer.on('seek', function (e) {
        var item = plyrist.getCurrent();
        if( $(c).closest('[data-id]').attr('data-id') == item.id ){
          plyrist.player.currentTime = plyrist.player.duration * e;
        }
      });
    }
    
    initWave();
    
    if($('.plyr-list .plyr-item').length){
      initPlayer();
    }

    $(document).on('pjaxEnd', function(){
      updateDisplay();
      initWave();
    });

    function updateDisplay(){
      $('[data-id]').find('.list-item').removeClass('active')
      $('[data-id]').find('.btn-play').removeClass('active');
      if(!plyrist) return;
      var item = plyrist.getCurrent();
      var el = $('[data-id="'+item.id+'"]');
      if( plyrist.player.paused ){
        el.find('.list-item').removeClass('active');
        el.find('.btn-play').removeClass('active');
      }else{
        el.find('.list-item').addClass('active');
        el.find('.btn-play').addClass('active');
      }
    }

    $(document).on('show.bs.dropdown', '.list-action > div, .media-action', function () {
      $(this).closest('.list-item').addClass('pos-rlt z-index-1');
    });

    $(document).on('hide.bs.dropdown', '.list-action > div, .media-action', function () {
      $(this).closest('.list-item').removeClass('pos-rlt z-index-1');
    });

    $(document).on('click', '.btn-more', function (e) {
      e.preventDefault();
      var $dp = $(this).next('.dropdown-menu');
      $dp.append('<a class="dropdown-item" href="#">Play</a>'+
        '<a class="dropdown-item" href="#">Next to play</a>'+
        '<a class="dropdown-item" href="#">Add to queue</a>'+
        '<a class="dropdown-item" href="#">Add to playlist</a>'+
        '<div class="dropdown-divider"></div>'+
        '<a class="dropdown-item" href="#">Share</a>'
      );
    });


    var player_video = new Plyrist(
      {
        playlist: '#plyrist_video', 
        player: 'video'
      },
      [],
      {
        controls: [
            'play-large', // The large play button in the center
            'rewind', // Rewind by the seek time (default 10 seconds)
            'play', // Play/pause playback
            'fast-forward', // Fast forward by the seek time (default 10 seconds)
            'progress', // The progress bar and scrubber for playback and buffering
            'current-time', // The current time of playback
            'duration', // The full duration of the media
            'mute', // Toggle mute
            'volume', // Volume control
            'captions', // Toggle captions
            'settings', // Settings menu
            'pip', // Picture-in-picture (currently Safari only)
            'airplay', // Airplay (currently Safari only)
            'fullscreen', // Toggle fullscreen
        ],
        autoplay: true,
        hideControls: true,
        fullscreen:{ enabled: true }
      }
    );

  }

  // for ajax to init again
  global.plyr = {init: init};

})(this, jQuery);
