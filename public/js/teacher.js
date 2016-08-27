(function() {
  var admin;

  admin = new Vue({
    el: '#app',
    data: {
      teachers: [],
      teacher: [],
      selected: 1,
      errors: ''
    },
    ready: function() {
      var that;
      that = this;
      $.ajax({
        method: 'GET',
        url: '/api/teacher/all',
        success: function(res) {
          that.teachers = res;
          return console.log('get success');
        },
        error: function(res) {
          return that.errors = res.responseJSON.errors;
        }
      });
      return $.ajax({
        method: 'GET',
        url: '/api/teacher/' + that.selected,
        success: function(res) {
          that.teacher = res;
          console.log(res);
          return console.log('get teacher success');
        },
        error: function(res) {
          return alter('Data load error');
        }
      });
    },
    methods: {
      changePanel: function(id, e) {
        var that;
        e.preventDefault();
        that = this;
        that.selected = id;
        return $.ajax({
          method: 'GET',
          url: '/api/teacher/' + that.selected,
          success: function(res) {
            that.teacher = res;
            console.log(res);
            return console.log('get teacher success');
          },
          error: function(res) {
            return alter('Data load error');
          }
        });
      },
      getTcContent: function(href, e) {
        var that;
        e.preventDefault();
        that = this;
        return $.get(href, function(data) {
          console.log(data);
          that.techer = data;
          return $('#ShowDialog').modal({
            keyboard: false,
            show: true
          });
        });
      }
    }
  });

}).call(this);

//# sourceMappingURL=teacher.js.map
