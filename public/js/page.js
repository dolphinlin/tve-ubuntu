(function() {
  var app;

  Vue.http.headers.common['X-CSRF-TOKEN'] = $("#token").attr("value");

  app = new Vue({
    el: '#app2',
    data: {
      calendar: Object
    },
    ready: function() {
      var that;
      that = this;
      console.log('ready read');
      return that.$http.get('/api/pageinfo/calendar').then((function(_this) {
        return function(res) {
          that.calendar = res.data;
          return console.log(that.calendar);
        };
      })(this), (function(_this) {
        return function(res) {
          return alter('Get Error');
        };
      })(this));
    }
  });

}).call(this);

//# sourceMappingURL=page.js.map
