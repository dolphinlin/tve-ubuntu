(function() {
  var app;

  Vue.http.headers.common['X-CSRF-TOKEN'] = $("#token").attr("value");

  app = new Vue({
    el: '#app2',
    data: {
      calendar: Object,
      carousel: []
    },
    ready: function() {
      var that;
      that = this;
      console.log('ready read');
      that.$http.get('/api/pageinfo/calendar').then((function(_this) {
        return function(res) {
          return that.calendar = res.data;
        };
      })(this), (function(_this) {
        return function(res) {
          return alter('Get Error');
        };
      })(this));
      return that.$http.get('/api/pageinfo/carousel').then((function(_this) {
        return function(res) {
          return that.carousel = res.data;
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
