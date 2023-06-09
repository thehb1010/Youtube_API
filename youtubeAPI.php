<!DOCTYPE html>
<html>
<head>
  <title>YouTube Videos</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Discover inspiration, motivation, and empowerment through our collection of uplifting motivational quotes. Explore a world of positivity and unlock your true potential. Get daily doses of encouragement and fuel your journey towards personal growth and success.">
<!-- Include Bootstrap CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.3/js/bootstrap.min.js" integrity="sha512-1/RvZTcCDEUjY/CypiMz+iqqtaoQfAITmNSJY17Myp4Ms5mdxPS5UV7iOfdZoxcGhzFbOm6sntTKJppjvuhg4g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="includes/script.js"></script>

  <style>
    .video-wrapper {
      margin-bottom: 30px;
    }

    .thumbnail {
      width: 100%;
      height: auto;
      cursor: pointer;
    }

    .video-title {
      margin-top: 10px;
      font-size: 18px;
      font-weight: bold;
    }

    .video-details {
      font-size: 14px;
      color: #777;
    }
  </style>
</head>
<body>
<!-- <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#">YouTube Video Gallery</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Services</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Contact</a>
        </li>
      </ul>
    </div>
  </nav> -->
  <?php include('includes/header.php');?>

  <div class="container">
   <!--  <h2 class="text-center mb-5">YouTube Video Gallery</h2> -->
<!-- card -->
    <div class="card mb-3">
    <img src="bg-img.jpg" height="80px" class="card-img-top" alt="Card Image">
  <div class="card-body text-center text-info">
    <h5 class="card-title" style="font-family: Poiret One">subscribe to my youtube channel</h5>
    <p class="card-text">
      <!-- YouTube Subscribe button code goes here -->
      <script src="https://apis.google.com/js/platform.js"></script>
<div class="g-ytsubscribe" data-channelid="Your_Channel_ID" data-layout="full" data-count="default"></div>
      <!-- <script src="https://apis.google.com/js/platform.js"></script>
      <div class="g-ytsubscribe" data-channel="Your_Channel_ID" data-layout="default" data-count="default"></div> -->
    </p>
  </div>
</div>

<!-- end card -->
    <div id="gallery" class="row"></div>
  </div>

 <!-- Include Bootstrap JS and jQuery -->
 <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.js" integrity="sha512-8Z5++K1rB3U+USaLKG6oO8uWWBhdYsM3hmdirnOEWp8h2B1aOikj5zBzlXs8QOrvY9OxEnD2QDkbSKKpfqcIWw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  
  <script>
    function loadYouTubeAPI(callback) {
      var tag = document.createElement('script');
      tag.src = 'https://www.youtube.com/iframe_api';
      var firstScriptTag = document.getElementsByTagName('script')[0];
      firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);
      tag.onload = callback;
    }

    function displayVideos(videoData) {
      var gallery = document.getElementById('gallery');
      videoData.forEach(function(video) {
        var videoWrapper = document.createElement('div');
        //videoWrapper.className = 'col-md-3 mb-3 video-wrapper';
        videoWrapper.className = 'col-md-4 col-sm-6 col-lg-3 mb-4 video-wrapper'; //this ensures repsonsiveness on different screen sizes

        var thumbnail = document.createElement('img');
        thumbnail.src = video.thumbnail;
        thumbnail.className = 'img-fluid img-thumbnail thumbnail';
        thumbnail.style.cursor = 'pointer';
        thumbnail.addEventListener('click', function() {
          openVideo(video.videoId);
        });

        var title = document.createElement('h4');
        title.textContent = video.title;
        title.className = 'video-title';

        var details = document.createElement('div');
        details.className = 'video-details';
        details.innerHTML = '<span class="view-count">' + video.viewCount + ' views</span><span class="duration"> | Duration: ' + video.duration + '</span>';

        videoWrapper.appendChild(thumbnail);
        videoWrapper.appendChild(title);
        videoWrapper.appendChild(details);
        gallery.appendChild(videoWrapper);
      });
    }

    function openVideo(videoId) {
      var modal = '<div class="modal" tabindex="-1" role="dialog">';
      modal += '<div class="modal-dialog modal-lg" role="document">';
      modal += '<div class="modal-content">';
      modal += '<div class="modal-body">';
      modal += '<div class="embed-responsive embed-responsive-16by9">';
      modal += '<iframe class="embed-responsive-item" src="https://www.youtube.com/embed/' + videoId + '" allowfullscreen></iframe>';
      modal += '</div>';
      modal += '</div>';
      modal += '</div>';
      modal += '</div>';
      modal += '</div>';

      $('body').append(modal);
      $('.modal').modal('show');
      $('.modal').on('hidden.bs.modal', function() {
        $(this).remove();
      });
    }

    function fetchPage(url, callback) {
      $.getJSON(url, function(response) {
        callback(response);
      }).fail(function(jqXHR, textStatus, errorThrown) {
        console.log('Error fetching page: ' + errorThrown);
      });
    }

    function fetchVideos(apiKey, channelId, callback) {
      var url = 'https://www.googleapis.com/youtube/v3/search?key=' + apiKey + '&channelId=' + channelId + '&part=snippet&order=date&maxResults=10000';
      $.get(url, function(response) {
        var videoData = [];
        var videoIds = response.items.map(function(item) {
          return item.id.videoId;
        });
        var videoDetailsUrl = 'https://www.googleapis.com/youtube/v3/videos?key=' + apiKey + '&id=' + videoIds.join(',') + '&part=snippet,statistics,contentDetails';

        $.get(videoDetailsUrl, function(details) {
          details.items.forEach(function(item) {
            var videoId = item.id;
            var title = item.snippet.title;
            var thumbnail = item.snippet.thumbnails.medium.url;
            var viewCount = item.statistics.viewCount;
            var duration = parseISO8601Duration(item.contentDetails.duration);

            var video = {
              videoId: videoId,
              title: title,
              thumbnail: thumbnail,
              viewCount: viewCount,
              duration: duration
            };
            videoData.push(video);
          });
          // Store videoData in a cookie
           document.cookie = 'videoData=' + JSON.stringify(videoData) + '; path=/';
          callback(videoData);
        });
      });
    }

    function parseISO8601Duration(duration) {
      try {
        var isoDuration = moment.duration(duration);
        var hours = Math.floor(isoDuration.asHours());
        var minutes = Math.floor(isoDuration.asMinutes()) % 60;
        var seconds = Math.floor(isoDuration.asSeconds()) % 60;

        var formattedDuration = '';
        if (hours > 0) {
          formattedDuration += hours + ':';
        }
        formattedDuration += (minutes < 10 ? '0' : '') + minutes + ':';
        formattedDuration += (seconds < 10 ? '0' : '') + seconds;

        return formattedDuration;
      } catch (error) {
        console.error('Error parsing duration:', error);
        return 'Unknown';
      }
    }

    // function init() {
    //   //var apiKey = 'Your_API_Key'; // Replace with your YouTube Data API key
    //   var apiKey = 'Your_API_Key';
    //   var channelId = 'Your_Channel_ID'; // Replace with your YouTube channel ID

    //   loadYouTubeAPI(function() {
    //     fetchVideos(apiKey, channelId, function(videoData) {
    //       displayVideos(videoData);
    //     });
    //   });
    // }
    function init() {
  // ...keys
  var apiKey = 'Your_API_Key';
    var channelId = 'Your_Channel_ID'; // Replace with your YouTube channel ID

  // Check if videoData exists in the cookie
  var cookieData = getCookie('videoData');
  if (cookieData) {
    var videoData = JSON.parse(cookieData);
    displayVideos(videoData);
  } else {
    fetchVideos(apiKey, channelId, function(videoData) {
      displayVideos(videoData);
    });
  }
}

// Function to retrieve the value of a cookie
function getCookie(name) {
  var cookieArr = document.cookie.split(';');
  for (var i = 0; i < cookieArr.length; i++) {
    var cookiePair = cookieArr[i].split('=');
    if (cookiePair[0].trim() === name) {
      return decodeURIComponent(cookiePair[1]);
    }
  }
  return null;
}




    $(document).ready(function() {
      init();
    });
  </script>
      <!-- Footer -->
 <?php include('includes/footer.php');?>
</body>
</html>
