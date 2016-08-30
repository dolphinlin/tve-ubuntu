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
    pages:
      current_page: 1
      last_page: 1
      next_page_url: ''
      prev_page_url: ''

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
      url: '/api/album?page=1'
      success: (res) ->
        that.pages = res
        that.albums = res.data
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
    getPage: (n) ->
      that = this
      $.ajax(
        method: 'GET'
        url: '/api/album?page=' + n
        success: (res) ->
          that.pages = res
          that.albums = res.data
      )
)
