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

const apiUrl = '/users'

const fields = [
	{
		name: 'id',
		title: 'ID',
		dataClass: 'hidden xl:table-cell',
		titleClass: 'hidden xl:table-cell'
	},
	{
		name: 'name',
		title: 'Names',
		details: {
			detailFields: [
				{
					email: {
						detailClass: 'xl:hidden',
						columnClass: 'hidden xl:table-cell'
					}
				},
				{
					nickname: {
						detailClass: 'xl:hidden',
						columnClass: 'hidden xl:table-cell'
					}
				},
				{
					birthdate: {
						detailClass: 'lg:hidden',
						columnClass: 'hidden lg:table-cell',
						unknownProperty: 'hidden:sm:table-cell',
					}
				},
				{
					'__component:Status': {
						detailClass: 'md:hidden',
						columnClass: 'hidden md:table-cell',
					}
				},
				{
					'created_at': {
						detailClass: 'sm:hidden',
						columnClass: 'hidden sm:table-cell'
					}
				},
				{
					'__slot:actions': {
						detailClass: 'sm:hidden',
						columnClass: 'hidden sm:table-cell',
					}
				},
				{ fieldDoesNotExists: {} }
			],
		}
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
		dataClass: 'text-xs font-bold text-left lg:text-right',
		callback: function (value) {
			return format(new Date(value), 'MMM dd yyyy')
		}
	},
	{
		name: 'created_at',
		title: 'Created At',
		visible: false
	},
	{
		name: '__slot:actions',
		title: 'Actions',
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

const pages = [
	10, 25, 50, 100
]
const selectedPerPage = ref(pages[0])
const vuedatatable = ref(null)

const statuses = [
	{
		optionKey: 'none',
		optionValue: '' 
	},
	{
		optionKey: 'inactive',
		optionValue: 0 
	},
	{
		optionKey: 'active',
		optionValue: 1 
	}
]

const selectedStatus = ref(statuses[0])
const appendParams = ref({})
const searchParam = ref('')

watch(selectedPerPage, (newVal, oldVal) => {
	nextTick(() => vuedatatable.value.refresh())
})

watch(selectedStatus, (newVal, oldVal) => {
	if (typeof newVal.optionValue === 'number') {
		appendParams.value['filter[status]'] = newVal.optionValue
	} else {
		delete appendParams.value['filter[status]']
	}

	nextTick(() => vuedatatable.value.refresh())
})

function edit(rowData) {
	alert(rowData.name)
}

function deleteUser( rowData ) {
	alert(rowData.nickname)
}

function search() {
	if (searchParam.value) {
		appendParams.value['filter[search]'] = searchParam.value
	} else {
		delete appendParams.value['filter[search]']
	}

	vuedatatable.value.refresh()
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
	<div class="min-w-full py-2 align-middle">
		<div class="flex items-center">
			<!-- per page -->
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
						<ListboxOptions class="absolute z-10 mt-1 max-h-60 w-full rounded-md bg-slate-800 bg-opacity-80 py-1 text-base shadow-lg ring-1 ring-inset ring-white/10 ring-opacity-5 backdrop-blur focus:outline-none sm:text-sm">
							<ListboxOption v-for="(page, index) in pages"
										   v-slot="{ active, selected }"
										   :key="index"
										   :value="page"
										   as="template"
							>
								<li :class="[
										active ? 'bg-indigo-400 bg-opacity-80' : '',
										'relative cursor-default select-none p-2 text-gray-200'
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
			<!-- filter -->
			<Listbox v-model="selectedStatus"
					 class="ml-2"
			>
				<div class="relative mt-1">
					<ListboxButton class="relative w-full cursor-default rounded-lg bg-slate-800 py-2 pl-3 pr-10 text-left shadow-md ring-1 ring-inset ring-white/10 focus:outline-none focus-visible:border-indigo-500 focus-visible:ring-2 focus-visible:ring-white focus-visible:ring-opacity-75 focus-visible:ring-offset-2 focus-visible:ring-offset-orange-300 sm:text-sm">
						<span class="block truncate">{{ selectedStatus.optionKey }}</span>
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
						<ListboxOptions class="absolute z-10 mt-1 max-h-60 w-full rounded-md bg-slate-800 bg-opacity-80 py-1 text-base shadow-lg ring-1 ring-inset ring-white/10 ring-opacity-5 backdrop-blur focus:outline-none sm:text-sm">
							<ListboxOption v-for="(status, index) in statuses"
										   v-slot="{ active, selected }"
										   :key="index"
										   :value="status"
										   as="template"
							>
								<li :class="[
										active ? 'bg-indigo-400 bg-opacity-80' : '',
										'relative cursor-default select-none p-2 text-gray-200'
									]"
								>
									<span :class="[
												selected ? 'font-medium' : 'font-normal','block truncate'
											]"
									>
										{{ status.optionKey }}
									</span>
								</li>
							</ListboxOption>
						</ListboxOptions>
					</transition>
				</div>
			</Listbox>
			<!-- search -->
			<form class="flex items-center space-x-2 py-2 px-3 text-sm"
				  @submit.prevent="search"
			>
				<label for="search">Search:</label>
				<span class="flex rounded-md ring-1 ring-white/10 ring-opacity-5 focus-within:ring-2 focus-within:ring-white focus-within:ring-opacity-75 focus-within:ring-offset-2 focus-within:ring-offset-orange-300"
					  tabindex="1"
				>
					<input id="search"
						   v-model="searchParam"
						   type="text"
						   class="h-8 rounded-l-lg border-0 bg-slate-800 bg-opacity-80 text-gray-200 focus:ring-0"
					/>
					<button type="submit"
							class="rounded-r-lg border-0 border-l border-slate-600 bg-slate-800 bg-opacity-80 px-3 text-gray-200 hover:bg-slate-600"
							tabindex="-1"
					>
						Go
					</button>
				</span>
			</form>
			<!-- end search -->
		</div>
		<vue-datatable ref="vuedatatable"
					   :api-url="apiUrl"
					   :fields="fields"
					   :styles="{tableHeaderClass: 'bg-blue-400'}"
					   :sortOrder="sortOrder"
					   :perPage="selectedPerPage"
					   :appendParams="appendParams"
					   :options="{ httpOptions: {withCredentials: true,}}"
		>
			<template #actions="{rowData}">
				<div class="flex flex-col space-y-0.5 lg:flex-row lg:justify-center lg:space-y-0">
					<button class="rounded-md bg-blue-400 p-1.5 text-gray-900 hover:bg-blue-500 focus:outline-none"
							@click.prevent="edit(rowData)"
					>
						Edit
					</button>
					<button class="rounded-md bg-red-400 p-1 text-gray-900 hover:bg-red-500 focus:outline-none lg:ml-2 lg:p-1.5"
							@click.prevent="deleteUser(rowData)"
					>
						Delete
					</button>
				</div>
			</template>
		</vue-datatable>
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