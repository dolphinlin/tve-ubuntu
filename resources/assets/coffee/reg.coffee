Vue.http.headers.common['X-CSRF-TOKEN'] = $("#token").attr("value")

app = new Vue(
  el: '#app'
  data:
    fs: []
    regs: []
    filterby: 1
    reg:
      id: 0
      name: ''
      day: ''
      filter: 0
      url: ''
    ff:
      id: 1
      title: ''
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
    console.log 'qq123'
    $.ajax(
      method: 'GET'
      url: '/api/reg/filters'
      success: (res) ->
        that.fs = res
        console.log 'get success'
    )
    $.ajax(
      method: 'GET'
      url: '/api/reg/all'
      success: (res) ->
        that.regs = res
    )
  methods:
    changeData: (id) ->
      that = this
      that.filterby = id
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
