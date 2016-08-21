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
        type = 'doctor'
      else if id == 2
        type = 'master'
      else if id == 3
        type = 'nightclass'
      else
        type = 'exam'
      $.ajax(
        method: 'GET'
        url: '/api/enroll/' + type
        success: (res) ->
          that.pages = res
          that.enrolls = res.data
          console.log 'get success'
      )
    getFormdata: (id) ->
      that = this
      $.ajax(
        method: 'GET'
        url: '/api/formdata/' + id
        success: (res) ->
          that.formdata = res
          $('#ShowForm').modal
            keyboard: false,
        		show: true
          console.log 'get success'
      )
    deleteFDFilter: (token) ->
      that = this
      console.log token
      $.ajax(
        method: 'post'
        url: '/api/formfilter/' + that.ff.id
        data:
          _method: 'delete'
          _token : token
        success: (msg) ->
          location.reload()
      )
    deleteFD: ->
      that = this
      that.$http.delete('/api/formfilter/' + that.ff.id).then(
        (response) =>
            console.log 'success'
            that.$http.get('/api/formdl/filters').then(
              (res) =>
                that.fs = res.data
                that.ff.id = 1
                console.log res
              (res) =>
                alter('Get Error')
            )
        (response) =>
            console.log 'error'
            alter('Delete Error')
        )
)
