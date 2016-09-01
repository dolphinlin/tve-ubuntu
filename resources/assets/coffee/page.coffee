Vue.http.headers.common['X-CSRF-TOKEN'] = $("#token").attr("value")

app = new Vue(
  el: '#app2'
  data:
    calendar: Object
  ready: ->
    that = this
    console.log 'ready read'
    that.$http.get('/api/pageinfo/calendar').then(
      (res) =>
        that.calendar = res.data
      (res) =>
        alter('Get Error')
    )
)
app3 = new Vue(
  el: '#app3'
  data:
    carousel: []
  ready: ->
    that = this
    console.log 'ready read'
    that.$http.get('/api/pageinfo/carousel').then(
      (res) =>
        that.carousel = res.data
      (res) =>
        alter('Get Error')
    )
)
