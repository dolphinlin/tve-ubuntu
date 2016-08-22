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
      },
      type: ''
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
            return d.getFullYear() + '-' + (d.getMonth() + 1) + '-' + d.getDate();
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
        var that;
        that = this;
        that.filterby = id;
        if (id === 1) {
          that.type = 'doctor';
        } else if (id === 2) {
          that.type = 'master';
        } else if (id === 3) {
          that.type = 'nightclass';
        } else {
          that.type = 'exam';
        }
        return $.ajax({
          method: 'GET',
          url: '/api/enroll/' + that.type,
          success: function(res) {
            that.pages = res;
            that.enrolls = res.data;
            return console.log('get success');
          }
        });
      },
      getEnrolldata: function(id) {
        var that;
        that = this;
        return $.ajax({
          method: 'GET',
          url: '/api/enroll/' + id,
          success: function(res) {
            that.enroll = res;
            $('#ShowForm').modal({
              keyboard: false
            });
            ({
              show: true
            });
            return console.log('get success');
          }
        });
      }
    }
  });

}).call(this);

//# sourceMappingURL=enroll.js.map
