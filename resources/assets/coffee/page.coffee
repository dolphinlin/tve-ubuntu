Vue.http.headers.common['X-CSRF-TOKEN'] = $("#token").attr("value")

app = new Vue(
  el: '#app'
  data:
    calendar: Object
    carousel: []
  ready: ->
    that = this
    console.log 'ready read'
    that.$http.get('/api/pageinfo/calendar').then(
      (res) =>
        that.calendar = res.data
        console.log that.calendar
      (res) =>
        alter('Get Error')
    )
)
