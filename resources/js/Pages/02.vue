<script setup>
let apiUrl = '/users'
let fields = [
	{
		name: 'id',
		title: 'ID',
		titleClass: '',
		titleSortClass: 'ml-2 inline-block align-middle',
		sortField: 'id'
	},
	{
		name: 'name',
		title: 'Name',
		titleSortClass: 'ml-2 inline-block align-middle',
		sortField: 'name',
	},
	{
		name: 'email',
		title: 'Email',
		titleSortClass: 'inline-block float-right',
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
	<h2 class="text-xl font-bold">with sorted headers</h2>
	<ol>
		<li>sortable headers</li>
		<li>sort icons</li>
	</ol>
	<div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
		<vue-datatable :api-url="apiUrl"
					   :fields="fields"
					   :sortOrder="sortOrder"
		/>
	</div>

	<div class="mt-2 inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
		<vue-datatable :api-url="apiUrl"
					   :fields="fields"
					   :sortOrder="sortOrder"
					   :options="{showSortIcons: false}"
		/>
	</div>
</template>