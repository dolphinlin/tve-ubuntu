(function() {
  var app;

  app = new Vue({
    el: '#app',
    data: {
      fs: [],
      netreses: [],
      filterby: 1,
      netres: {
        name: '',
        url: '',
        filter: 0
      }
    },
    filters: {
      subclass: function(data, fl) {
        var that;
        that = this;
        console.log(fl);
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
        url: '/api/netres/filters',
        success: function(res) {
          that.fs = res;
          return console.log('get success');
        }
      });
      return $.ajax({
        method: 'GET',
        url: '/api/netres/all',
        success: function(res) {
          return that.netreses = res;
        }
      });
    },
    methods: {
      changeData: function(id) {
        var that;
        that = this;
        that.filterby = id;
        return console.log(id);
      },
      getNetres: function(id) {
        var that;
        that = this;
        return $.ajax({
          method: 'GET',
          url: '/api/netres/' + id,
          success: function(res) {
            that.netres = res;
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

//# sourceMappingURL=netres.js.map
