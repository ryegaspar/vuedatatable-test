<script setup>
import {
	CheckIcon, ChevronUpDownIcon
} from '@heroicons/vue/20/solid'
import {
	Combobox,
	ComboboxButton,
	ComboboxInput,
	ComboboxOption,
	ComboboxOptions,
	TransitionRoot,
} from '@headlessui/vue'
import {
	computed, ref
} from 'vue'
import ComboboxMulti from '@/Components/ComboboxMulti.vue'

const people = [
	{
		id: 1,
		name: 'Wade Cooper' 
	},
	{
		id: 2,
		name: 'Arlene Mccoy' 
	},
	{
		id: 3,
		name: 'Devon Webb' 
	},
	{
		id: 4,
		name: 'Tom Cook' 
	},
	{
		id: 5,
		name: 'Tanya Fox' 
	},
	{
		id: 6,
		name: 'Hellen Schmidt' 
	},
]

const selectedMulti = ref([])
let selected = ref([ people[0] ])
let query = ref('')

let filteredPeople = computed(() =>
	query.value === ''
		? people
		: people.filter((person) =>
			person.name
				.toLowerCase()
				.replace(/\s+/g, '')
				.includes(query.value.toLowerCase().replace(/\s+/g, ''))
		)
)

function submitForm() {
	console.log('submit form')
}
</script>

<template>
	<div class="fixed top-16 w-72">
		<form @submit.prevent="submitForm">
			<div>
				<div>
					<input type="text"
						   class="mt-2 rounded-lg border border-white text-black"
					>
				</div>
				<div>
					<ComboboxMulti v-model="selectedMulti"
								   :options="people"
					/>
				</div>
				<Combobox v-model="selected"
						  by="id"
						  multiple
				>
					<div class="relative mt-1">
						<div class="relative w-full cursor-default overflow-hidden rounded-lg bg-white text-left shadow-md focus:outline-none focus-visible:ring-2 focus-visible:ring-white focus-visible:ring-opacity-75 focus-visible:ring-offset-2 focus-visible:ring-offset-teal-300 sm:text-sm">
							<span class="text-black">{{ selected.length }}</span>
							<ComboboxInput class="w-full border-none py-2 pl-3 pr-10 text-sm leading-5 text-gray-900 focus:ring-0"
										   :displayValue="(person) => person.name"
										   @change="query = $event.target.value"
							/>
							<ComboboxButton class="absolute inset-y-0 right-0 flex items-center pr-2">
								<ChevronUpDownIcon class="h-5 w-5 text-gray-400"
												   aria-hidden="true"
								/>
							</ComboboxButton>
						</div>
						<TransitionRoot leave="transition ease-in duration-100"
										leaveFrom="opacity-100"
										leaveTo="opacity-0"
										@after-leave="query = ''"
						>
							<ComboboxOptions class="absolute mt-1 max-h-60 w-full overflow-auto rounded-md bg-white py-1 text-base shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none sm:text-sm">
								<div v-if="filteredPeople.length === 0 && query !== ''"
									class="relative cursor-default select-none py-2 px-4 text-gray-700"
								>
									Nothing found.
								</div>

								<ComboboxOption v-for="person in filteredPeople"
												:key="person.id"
												v-slot="{ selected, active }"
												as="template"
												:value="person"
								>
									<li class="relative cursor-default select-none py-2 pl-10 pr-4"
										:class="{
										'bg-teal-600 text-white': active,
										'text-gray-900': !active,
										}"
									>
										<span class="block truncate"
											  :class="{ 'font-medium': selected, 'font-normal': !selected }"
										>
											{{ person.name }}
										</span>
										<span v-if="selected"
											  class="absolute inset-y-0 left-0 flex items-center pl-3"
											  :class="{ 'text-white': active, 'text-teal-600': !active }"
										>
											<CheckIcon class="h-5 w-5"
													   aria-hidden="true"
											/>
										</span>
									</li>
								</ComboboxOption>
							</ComboboxOptions>
						</TransitionRoot>
					</div>
				</Combobox>
			</div>
			<div class="">
				<input type="text"
					   class="mt-2 rounded-lg border border-white text-black"
				/>
			</div>
			<div>
				<button type="submit"
						class="mt-1 rounded-lg bg-yellow-500 p-2 text-black"
				>
					Submit
				</button>
			</div>
		</form>
	</div>
</template>