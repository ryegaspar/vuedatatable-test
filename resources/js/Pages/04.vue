<script setup>
import format from 'date-fns/format'

let apiUrl = '/users?delay'
let fields = [
	{
		name: 'id',
		title: 'ID',
		sortField: 'id'
	},
	{
		name: 'name',
		title: 'Name',
	},
	{
		name: 'email',
		title: 'Email',
		titleClass: 'text-center',
		sortField: 'email'
	},
	{
		name: 'nickname',
		title: 'Nickname',
	},
	{
		name: 'birthdate',
		title: 'Birthdate',
		callback: function (value) {
			return format(new Date(value), 'MMM dd yyyy')
		}
	}
]
let sortOrder = {
	field: 'email',
	direction: 'desc'
}

</script>

<template>
	<h2 class="text-xl font-bold">custom options</h2>
	<ol>
		<li>table loading animation</li>
	</ol>
	<div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
		<vue-datatable :api-url="apiUrl"
					   :fields="fields"
					   :sortOrder="sortOrder"
		/>
	</div>
</template>