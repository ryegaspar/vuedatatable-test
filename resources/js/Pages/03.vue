<script setup>
let apiUrl = '/users'
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
		title: 'Birthdate'
	}
]
let sortOrder = {
	field: 'email',
	direction: 'desc'
}

let fields2 = [
	{
		name: 'id',
		title: 'ID',
	},
	{
		name: 'name',
		title: 'Name',
	},
	{
		name: 'email',
		title: 'Email',
	},
	{
		name: 'nickname',
		title: 'Nickname',
	},
]

</script>

<template>
	<h2 class="text-xl font-bold">custom options</h2>
	<ol>
		<li>hide sort icons</li>
		<li>append params = someParam: true</li>
		<li>hide loading</li>
		<li>no pagination when no data</li>
	</ol>
	<div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
		<vue-datatable :api-url="apiUrl"
					   :fields="fields"
					   :sortOrder="sortOrder"
					   :options="{showLoading: false, showSortIcons: false, silent: true}"
					   :appendParams="{someParam: true, someParam2: '2'}"
		/>
	</div>
	<div class="mt-5 inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
		<vue-datatable api-url=""
					   :fields="fields2"
		/>
	</div>
</template>