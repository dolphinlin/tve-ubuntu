$(document).on("click", "#testBtn", (e) ->
	console.log("click" + e)
	$('#ShowForm').modal
		keyboard: false,
		show: true
	)

app = new Vue(
	el: '#app'
	data:
		filters: []
		posts: []
		acts: []
		pages: []
		post:
			id: 0
			title: ''
			content: ''
			filter: 0
			files: []
		act:
			id: 0
			title: ''
			content: ''
			filter: 999
		errors: ''
		filterby: 0
		ff:
			id: 1
			subclass: ''
		calendar:
			title: ''
			url: ''
	filters:
		subclass: ->
			that = this
			if (that.filterby == 0)
				console.log('All')
				that.posts
			else
				console.log('Filter')
				that.posts.filter((p)->
					console.log
					if (p.filter == that.filterby)
						p
				)
		dateProcess: (date, format) ->
			that = this
			d = new Date(date)
			if	(date == null)
				null
			else
				if (format == 'date')
					(d.getMonth() + 1) + '-' + d.getDate() + '-' + d.getFullYear()
				else if(format == 'md')
					(d.getMonth() + 1) + '-' + d.getDate()
				else if(format == 'y')
					d.getFullYear()
				else
					null
		strLenPoc: (str, n) ->
			s = str + ''
			if (s.length > n)
				s.substring(0,n - 1) + '...'
			else
				s
		count: (arr) ->
			return arr.length

	ready: ->
		that = this
		$.ajax(
			method: 'GET'
			url: '/api/post/all?page=1'
			success: (res) ->
				console.log(res.data)
				that.pages = res
				console.log that.pages
				that.posts = res.data
			)
		$.ajax(
			method: 'GET'
			url: '/api/act/all?page=1'
			success: (res) ->
				that.acts = res.data
			)
		$.ajax(
			method: 'GET'
			url: '/api/pageinfo/calendar'
			success: (res) ->
				that.calendar = res
			)
		that.getFilter()
	methods:
		getFilter: ->
			that = this
			$.ajax(
				method: 'GET'
				url: '/api/filter'
				success: (res) ->
					that.filters = res
					console.log(that.filters)
				error: (res) ->
					that.errors = res.responseJSON.errors
				)
		getPostContent: (href, e) ->
			e.preventDefault()
			that = this
			that.getFilter()
			$.get(href, (data) ->
				console.log(data)
				that.post.id = data.id
				console.log(that.post.id)
				that.post.title = data.title
				that.post.content = data.content
				that.post.filter = data.filter
				$('#ShowDialog').modal
					keyboard: false,
					show: true
					$.get('/api/post/file/' + that.post.id , (data) ->
						console.log(data)
						that.post.files = data
					)
			)
		getActiveContent: (href, e) ->
			e.preventDefault()
			that = this
			that.getFilter()
			$.get(href, (data) ->
				console.log(data)
				that.act = data
				$('#ActiveDialog').modal
					keyboard: false,
					show: true
			)

		setFilter: (f, e) ->
			e.preventDefault()
			that = this
			if(f == 0)
				that.filtercol = ''
			else
				that.filtercol = 'filter'
			that.filterby = f
		getPage: (n) ->
			that = this
			if (n != null)
				$.ajax(
					method: 'GET'
					url: n
					success: (res) ->
						console.log(res.data)
						that.pages = res
						that.posts = that.pages.data
					)
		getFDFilter: (id) ->
      that = this
      $.ajax(
        method: 'GET'
        url: '/api/filter/' + id
        success: (res) ->
          that.ff = res
          $('#ShowForm').modal
            keyboard: false,
        		show: true
          console.log 'get success'
      )
    deleteFDFilter: (token) ->
      that = this
      console.log token
      $.ajax(
        method: 'POST'
        url: '/api/filter/' + that.ff.id
        data:
          _method: 'delete'
          _token : token
        success: (msg) ->
          location.reload()
      )




)
