app = new Vue(
  el: '#app'
  data:
    fs: []
    formdatas: []
    filterby: 1
    formdata:
      title: ''
      name: ''
      filter: ''
      url: ''
  filters:
    subclass: (data, fl) ->
      that = this
      if (fl == '')
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
      url: '/api/formdl/filters'
      success: (res) ->
        that.fs = res
        console.log 'get success'
    )
    $.ajax(
      method: 'GET'
      url: '/api/formdl/all'
      success: (res) ->
        that.formdatas = res
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

)
