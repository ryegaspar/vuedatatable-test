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
		name: '__component:Status',
		title: 'Status'
	},
	{
		name: 'birthdate',
		title: 'Birthdate',
		callback: function (value) {
			return format(new Date(value), 'MMM dd yyyy')
		}
	},
	{
		name: '__slot:actions',
		title: 'Actions',
	}
]
let sortOrder = {
	field: 'email',
	direction: 'desc'
}

function edit(rowData) {
	alert(rowData.name)
}

function deleteUser( rowData ) {
	alert(rowData.nickname)
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
		>
			<template #actions="{rowData}">
				<div>
					<button class="rounded-md bg-blue-400 p-1.5 text-gray-900 hover:bg-blue-500 focus:outline-none"
							@click.prevent="edit(rowData)"
					>
						Edit
					</button>
					<button class="ml-2 rounded-md bg-red-400 p-1.5 text-gray-900 hover:bg-red-500 focus:outline-none"
							@click.prevent="deleteUser(rowData)"
					>
						Delete
					</button>
				</div>
			</template>
		</vue-datatable>
	</div>
</template>