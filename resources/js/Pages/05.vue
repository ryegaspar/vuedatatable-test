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
		name: 'birthDate',
	}
]
</script>

<template>
	<h2 class="font-bold text-xl">modify options</h2>
	<ol>
		<li>silent = true, showLoading = false</li>
	</ol>
	<div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
		<vue-datatable :api-url="apiUrl"
					   :fields="fields"
					   :options="{
						   silent: true,
						   showLoading: false,
						   appendParams: {
							   param1: 'one',
							   param2: 'two'
						   }
					   }"
		/>
	</div>
</template>