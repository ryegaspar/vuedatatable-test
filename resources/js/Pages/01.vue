<script setup>
const apiUrl = '/users'
const fields = [
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
		titleClass: 'text-center text-red-600 bg-gray-400'
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
const fields2 = [
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
	{
		name: 'birthdate',
		title: 'Birthdate'
	}
]
const sortOrder = {
	field: 'email',
	direction: 'desc'
}
</script>

<template>
	<h2 class="font-bold text-xl">simple</h2>
	<ol>
		<li>apiUrl</li>
		<li>fields</li>
		<li>fields without title will create a title (Birth Date)</li>
		<li>override tableHeaderClass</li>
	</ol>
	<div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
		<vue-datatable :api-url="apiUrl"
					   :fields="fields"
					   :styles="{tableHeaderClass: 'bg-blue-400'}"
					   :sortOrder="sortOrder"
		/>
	</div>

	<div class="mt-2 py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
		<vue-datatable :api-url="apiUrl"
					   :fields="fields2"
		/>
	</div>
</template>