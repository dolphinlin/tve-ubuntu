(function() {
  var app;

  Vue.http.headers.common['X-CSRF-TOKEN'] = $("#token").attr("value");

  app = new Vue({
    el: '#app',
    data: {
      fs: [],
      formdatas: [],
      filterby: 1,
      formdata: {
        title: '',
        name: '',
        filter: '',
        url: ''
      },
      ff: {
        id: 1,
        title: ''
      }
    },
    filters: {
      subclass: function(data, fl) {
        var that;
        that = this;
        if (fl === void 0) {
          console.log('enter normal');
          return data.filter(function(f) {
            if (f.filter === that.filterby) {
              return f;
            }
          });
        } else {
          return data.filter(function(f) {
            if (f.filter === fl) {
              return f;
            }
          });
        }
      },
      count: function(arr) {
        console.log(arr.length);
        return arr.length;
      }
    },
    ready: function() {
      var that;
      that = this;
      $.ajax({
        method: 'GET',
        url: '/api/formdl/filters',
        success: function(res) {
          that.fs = res;
          return console.log('get success');
        }
      });
      return $.ajax({
        method: 'GET',
        url: '/api/formdl/all',
        success: function(res) {
          return that.formdatas = res;
        }
      });
    },
    methods: {
      changeData: function(id) {
        var that;
        that = this;
        return that.filterby = id;
      },
      getFormdata: function(id) {
        var that;
        that = this;
        return $.ajax({
          method: 'GET',
          url: '/api/formdata/' + id,
          success: function(res) {
            that.formdata = res;
            $('#ShowForm').modal({
              keyboard: false
            });
            ({
              show: true
            });
            return console.log('get success');
          }
        });
      },
      getFDFilter: function(id) {
        var that;
        that = this;
        return $.ajax({
          method: 'GET',
          url: '/api/formfilter/' + id,
          success: function(res) {
            that.ff = res;
            $('#ShowForm').modal({
              keyboard: false
            });
            ({
              show: true
            });
            return console.log('get success');
          }
        });
      },
      deleteFDFilter: function(token) {
        var that;
        that = this;
        console.log(token);
        return $.ajax({
          method: 'post',
          url: '/api/formfilter/' + that.ff.id,
          data: {
            _method: 'delete',
            _token: token
          },
          success: function(msg) {
            return location.reload();
          }
        });
      },
      deleteFD: function() {
        var that;
        that = this;
        return that.$http["delete"]('/api/formfilter/' + that.ff.id).then((function(_this) {
          return function(response) {
            console.log('success');
            return that.$http.get('/api/formdl/filters').then(function(res) {
              that.fs = res.data;
              that.ff.id = 1;
              return console.log(res);
            }, function(res) {
              return alter('Get Error');
            });
          };
        })(this), (function(_this) {
          return function(response) {
            console.log('error');
            return alter('Delete Error');
          };
        })(this));
      }
    }
  });

}).call(this);

//# sourceMappingURL=formdata.js.map
