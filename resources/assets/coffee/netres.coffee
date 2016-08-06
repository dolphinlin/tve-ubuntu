app = new Vue(
  el: '#app'
  data:
    fs: []
    netreses: []
    filterby: 1
    netres:
      name: ''
      url: ''
      filter: 0
  filters:
    subclass: (data, fl) ->
      that = this
      console.log fl
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
      url: '/api/netres/filters'
      success: (res) ->
        that.fs = res
        console.log 'get success'
    )
    $.ajax(
      method: 'GET'
      url: '/api/netres/all'
      success: (res) ->
        that.netreses = res
    )
  methods:
    changeData: (id) ->
      that = this
      that.filterby = id
      console.log id
    getNetres: (id) ->
      that = this
      $.ajax(
        method: 'GET'
        url: '/api/netres/' + id
        success: (res) ->
          that.netres = res
          $('#ShowForm').modal
            keyboard: false,
        		show: true
          console.log 'get success'
      )

)
