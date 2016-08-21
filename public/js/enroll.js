(function() {
  var app;

  Vue.http.headers.common['X-CSRF-TOKEN'] = $("#token").attr("value");

  app = new Vue({
    el: '#app',
    data: {
      enrolls: [],
      filterby: 1,
      pages: {
        total: 0,
        current_page: 1,
        last_page: 0,
        next_page_url: ''
      },
      enroll: {
        id: 0,
        title: '',
        url: '',
        type: 0
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
      dateProcess: function(date, format) {
        var d, that;
        that = this;
        d = new Date(date);
        if (d === null) {
          return null;
        } else {
          if (format === 'date') {
            return (d.getMonth() + 1) + '-' + d.getDate() + '-' + d.getFullYear();
          } else {
            return (d.getMonth() + 1) + '-' + d.getDate();
          }
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
      console.log('qq123');
      return $.ajax({
        method: 'GET',
        url: '/api/enroll/doctor',
        success: function(res) {
          that.pages = res;
          that.enrolls = res.data;
          return console.log('get success');
        }
      });
    },
    methods: {
      changeData: function(id) {
        var that, type;
        that = this;
        that.filterby = id;
        if (id === 1) {
          type = 'doctor';
        } else if (id === 2) {
          type = 'master';
        } else if (id === 3) {
          type = 'nightclass';
        } else {
          type = 'exam';
        }
        return $.ajax({
          method: 'GET',
          url: '/api/enroll/' + type,
          success: function(res) {
            that.pages = res;
            that.enrolls = res.data;
            return console.log('get success');
          }
        });
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

//# sourceMappingURL=enroll.js.map
