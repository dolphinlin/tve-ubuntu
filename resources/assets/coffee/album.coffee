Vue.http.headers.common['X-CSRF-TOKEN'] = $("#token").attr("value")

app = new Vue(
  el: '#app'
  data:
    albums: []
    album:
      id: 0
      title: ''
      description: ''
      photos: []

  filters:
    dateProcess: (date, format) ->
      that = this
      d = new Date(date)
      if d == null
        null
      else
        if format == 'date'
          d.getFullYear() + '-' + (d.getMonth() + 1) + '-' + d.getDate()
        else
          (d.getMonth() + 1) + '-' + d.getDate()

    count: (arr) ->
      console.log arr.length
      arr.length
  ready: ->
    that = this
    console.log 'ready read'
    $.ajax(
      method: 'GET'
      url: '/api/album'
      success: (res) ->
        that.albums = res
        console.log 'get success'
    )
    $.ajax(
      method: 'GET'
      url: '/api/album/6'
      success: (res) ->
        that.album = res
        console.log 'get success'
    )
  methods:
    getAlbum: (id) ->
      that = this
      $.ajax(
        method: 'GET'
        url: '/api/album/' + id
        success: (res) ->
          that.album = res
          console.log 'get success'
          $(this).lightGallery({
              dynamic: true,
              dynamicEl: res.photos
          })
      )
)
