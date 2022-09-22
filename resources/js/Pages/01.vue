<script setup>
import format from 'date-fns/format'

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
		name: '__component:Status',
		title: 'Status'
	},
	{
		name: 'birthdate',
		title: 'Birthdate',
		titleClass: 'text-right',
		dataClass: 'text-xs font-bold text-right',
		callback: function (value) {
			return format(new Date(value), 'MMM dd yyyy')
		}
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
		dlClass: 'lg:hidden',
		dlFields: [
			'nickname', 'birthdate'
		],
		dlFieldsClass: [
			'lg:hidden', 'sm:hidden'
		]
	},
	{
		name: 'email',
		title: 'Email',
	},
	{
		name: 'nickname',
		title: 'Nickname',
		dataClass: 'hidden lg:table-cell'
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
	<h2 class="text-xl font-bold">simple</h2>
	<ol>
		<li>apiUrl</li>
		<li>fields</li>
		<li>fields without title will create a title (Birth Date)</li>
		<li>override tableHeaderClass</li>
		<li>custom dataclass (birthdate)</li>
	</ol>
	<div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
		<vue-datatable :api-url="apiUrl"
					   :fields="fields"
					   :styles="{tableHeaderClass: 'bg-blue-400'}"
					   :sortOrder="sortOrder"
		/>
	</div>

	<ol>
		<li>compact pagination</li>
	</ol>
	<div class="mt-2 inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
		<vue-datatable :api-url="apiUrl"
					   :fields="fields2"
					   :options="{paginationStyle: 'compact'}"
		/>
	</div>
</template>