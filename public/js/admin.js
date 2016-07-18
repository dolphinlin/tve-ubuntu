(function() {
  var admin;

  admin = new Vue({
    el: '#app',
    data: {
      posts: [],
      filters: [],
      post: {
        id: 0,
        title: '',
        content: '',
        filter: 0,
        date: null
      },
      errors: ''
    },
    ready: function() {
      var that;
      that = this;
      $.ajax({
        method: 'GET',
        url: '/api/post/all',
        success: function(res) {
          that.posts = res;
          return console.log(that.posts);
        },
        error: function(res) {
          return that.errors = res.responseJSON.errors;
        }
      });
      return $.get('/api/filters', function(data) {
        console.log(data);
        return that.filters = data;
      });
    },
    methods: {
      getPost: function() {}
    }
  });

}).call(this);

//# sourceMappingURL=admin.js.map
