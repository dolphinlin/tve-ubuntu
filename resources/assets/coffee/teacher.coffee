admin = new Vue(
	el: '#app'
	data:
		teachers: []
		teacher: []
		selected: 1
		errors: ''
	ready: ->
		that = this
		$.ajax(
			method: 'GET'
			url: '/api/teacher/all'
			success: (res) ->
				that.teachers = res
				console.log('get success')
			error: (res) ->
				that.errors = res.responseJSON.errors
			)
		$.ajax(
			method: 'GET'
			url: '/teacher/' + that.selected
			success: (res) ->
				that.teacher = res
				console.log(res)
				console.log('get teacher success')
			error: (res) ->
				alter('Data load error')
			)
	methods:
		changePanel: (id, e)->
			e.preventDefault()
			that = this
			that.selected = id
			$.ajax(
				method: 'GET'
				url: '/teacher/' + that.selected
				success: (res) ->
					that.teacher = res
					console.log(res)
					console.log('get teacher success')
				error: (res) ->
					alter('Data load error')
				)
		getTcContent: (href, e) ->
			e.preventDefault()
			that = this
			$.get(href, (data) ->
				console.log(data)
				that.techer = data
				$('#ShowDialog').modal
					keyboard: false,
					show: true
			)
)
