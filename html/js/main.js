const photosContainer = document.querySelector('[data-photos]')
if (photosContainer) {
  let photos
  let photoUrl
  let thumbnailUrl
  fetch("/data/photos.json")
    .then(response => response.json())
    .then(data => {
      photos = data
      let query = photosContainer.dataset.photos
      let string = "html/photos/" + query
      let start = string.length
      for (let i=0; i<photos.length; i=i+1) {
        if (photos[i].match(query) && !photos[i].match("thumbnails")) {
          photoUrl = photos[i].substring(4, photos[i].length)
          thumbnailUrl = "/photos/" + query + "/thumbnails/" + photos[i].substring(start, photos[i].length)
          string = '<a class="thumbnail-link" href="#'+photoUrl+'" data-photo="'+photoUrl+'" name="'+photoUrl+'">'
            +'<img class="thumbnail-image" src="'+thumbnailUrl+'" alt="" loading="lazy">'
            +'</a>'
          photosContainer.innerHTML += string
        }
      }

      const photo = document.querySelectorAll('[data-photo')
      for (let i=0; i<photo.length; i=i+1) {
        photo[i].addEventListener('click',function(){
          let image = document.querySelector('.js-site-media img')
          image.src = this.dataset.photo
        })
      }
    });
}



//- FOR DEVELOPMENT ONLY
if (window.location.href.indexOf('.local') > -1) {
  console.log("readyState: " + document.readyState)
  console.log('Website is running locally')
  let script = document.createElement('script');
  script.src = '/js/live.js';
  document.write(script.outerHTML);
}
