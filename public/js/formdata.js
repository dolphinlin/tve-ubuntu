(function() {
  var app;

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
      }
    },
    filters: {
      subclass: function(data, fl) {
        var that;
        that = this;
        if (fl === '') {
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
      }
    }
  });

}).call(this);

//# sourceMappingURL=formdata.js.map
