Vue.http.headers.common['X-CSRF-TOKEN'] = $("#token").attr("value")

app = new Vue(
  el: '#app'
  data:
    enrolls: []
    filterby: 1
    pages:
      total: 0
      current_page: 1
      last_page: 0
      next_page_url: ''
    enroll:
      id: 0
      title: ''
      url: ''
      type: 0
    type: ''
  filters:
    subclass: (data, fl) ->
      that = this
      if (fl == undefined)
        console.log 'enter normal'
        data.filter( (f) ->
          if f.filter == that.filterby
            f
            )
      else
        data.filter( (f) ->
          if f.filter == fl
            f
            )

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
    console.log 'qq123'
    $.ajax(
      method: 'GET'
      url: '/api/enroll/doctor'
      success: (res) ->
        that.pages = res
        that.enrolls = res.data
        console.log 'get success'
    )
  methods:
    changeData: (id) ->
      that = this
      that.filterby = id
      if id == 1
        that.type = 'doctor'
      else if id == 2
        that.type = 'master'
      else if id == 3
        that.type = 'nightclass'
      else
        that.type = 'exam'
      $.ajax(
        method: 'GET'
        url: '/api/enroll/' + that.type
        success: (res) ->
          that.pages = res
          that.enrolls = res.data
          console.log 'get success'
      )
    getEnrolldata: (id) ->
      that = this
      $.ajax(
        method: 'GET'
        url: '/api/enroll/' + id
        success: (res) ->
          that.enroll = res
          $('#ShowForm').modal
            keyboard: false,
        		show: true
          console.log 'get success'
      )
)
