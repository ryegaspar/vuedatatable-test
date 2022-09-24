<script setup>
import {
	Listbox,
	ListboxButton,
	ListboxOption,
	ListboxOptions,
} from '@headlessui/vue'
import {
	nextTick,
	ref, watch
} from 'vue'
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
		dataClass: 'font-bold text-xs align-content-center',
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

const pages = [
	10, 25, 50, 100
]
const selectedPerPage = ref(pages[0])
const vuedatatable = ref(null)

watch(selectedPerPage, () => {
	nextTick(() => {
		vuedatatable.value.refresh()
	})
})

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
		<div class="inline-block">
			<Listbox v-model="selectedPerPage">
				<div class="relative mt-1">
					<ListboxButton class="relative w-full cursor-default rounded-lg bg-slate-800 py-2 pl-3 pr-10 text-left shadow-md ring-1 ring-inset ring-white/10 focus:outline-none focus-visible:border-indigo-500 focus-visible:ring-2 focus-visible:ring-white focus-visible:ring-opacity-75 focus-visible:ring-offset-2 focus-visible:ring-offset-orange-300 sm:text-sm">
						<span class="block truncate">{{ selectedPerPage }}</span>
						<span class="pointer-events-none absolute inset-y-0 right-0 flex items-center pr-2">
							<svg class="-mr-1 ml-2 h-5 w-5"
								 viewBox="0 0 20 20"
								 fill="currentColor"
							>
							<path fill-rule="evenodd"
								  d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
								  clip-rule="evenodd"
							/>
						</svg>
						</span>
					</ListboxButton>

					<transition leave-active-class="transition duration-100 ease-in"
								leave-from-class="opacity-100"
								leave-to-class="opacity-0"
					>
						<ListboxOptions class="absolute z-10 mt-1 max-h-60 w-full rounded-md bg-gray-700 bg-opacity-80 py-1 text-base shadow-lg ring-1 ring-black ring-opacity-5 backdrop-blur focus:outline-none sm:text-sm">
							<ListboxOption v-for="(page, index) in pages"
										   v-slot="{ active, selected }"
										   :key="index"
										   :value="page"
										   as="template"
							>
								<li :class="[
										active ? 'bg-amber-100 bg-opacity-80 text-amber-900' : 'text-gray-200',
										'relative cursor-default select-none p-2'
									]"
								>
									<span :class="[
												selected ? 'font-medium' : 'font-normal','block truncate'
											]"
									>
										{{ page }}
									</span>
								</li>
							</ListboxOption>
						</ListboxOptions>
					</transition>
				</div>
			</Listbox>
		</div>
		<vue-datatable ref="vuedatatable"
					   :api-url="apiUrl"
					   :fields="fields"
					   :sortOrder="sortOrder"
					   :perPage="selectedPerPage"
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

		<vue-datatable ref="vuedatatable"
					   :api-url="apiUrl"
					   :fields="fields"
					   :sortOrder="sortOrder"
					   :perPage="selectedPerPage"
					   :options="{showLoading: false}"
					   class="mt-5"
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