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

</script>

<template>
	<h2 class="font-bold text-xl">custom options</h2>
	<ol>
		<li>hidden sort icons</li>
		<li>append params = someParam: true</li>
	</ol>
	<div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
		<vue-datatable :api-url="apiUrl"
					   :fields="fields"
					   :sortOrder="sortOrder"
					   :options="{showSortIcons: false, appendParams: {someParam: true}}"
		/>
	</div>
</template>