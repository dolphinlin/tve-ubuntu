Vue.http.headers.common['X-CSRF-TOKEN'] = $("#token").attr("value")

app = new Vue(
  el: '#app'
  data:
    teachers: []
    papers: []
    pages: []
    filterby: 1
    paper:
      title: ''
      auth: ''
      number: ''
      year: 0
      teacher: 0
    ff:
      id: 1
      name: ''
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
    count: (arr) ->
      console.log arr.length
      arr.length
  ready: ->
    that = this
    $.ajax(
      method: 'GET'
      url: '/api/paper/allteacher'
      success: (res) ->
        console.log 'qq1233'
        that.teachers = res
        that.ff.id = 1
    )
    that.$http.get('/api/paper/all?page=1').then(
      (res) =>
        console.log res.data
        that.pages = res.data
        that.papers = res.data.data
      (res) =>
        alter('Get Error')
    )
  methods:
    changeData: (id) ->
      that = this
      that.filterby = id
    getTeacher: (id) ->
      that = this
      that.$http.get('/api/papert/' + id).then(
        (res) =>
          console.log res.data
          that.ff = res.data
          $('#ShowForm').modal
            keyboard: false,
        		show: true
        (res) =>
          alter('Get Error')
      )
    deleteTeacher: (token) ->
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
      that.$http.delete('/api/papert/' + that.ff.id).then(
        (response) =>
            console.log 'success'
            that.$http.get('/api/paper/allteacher').then(
              (res) =>
                that.teachers = res.data
                that.ff.id = 1
                console.log res
              (res) =>
                alter('Get Error')
            )
        (response) =>
            console.log 'error'
            alter('Delete Error')
        )
    getPage: (n) ->
      that = this
      $.ajax(
        method: 'GET'
        url: n
        success: (res) ->
          that.pages = res
          that.papers = res.data
      )
)
