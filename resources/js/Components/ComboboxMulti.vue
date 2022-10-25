<script setup>
import {
	Combobox, ComboboxButton, ComboboxInput,
	ComboboxOption, ComboboxOptions, TransitionRoot
} from '@headlessui/vue'
import {
	computed, ref, watch
} from 'vue'
import { ChevronUpDownIcon } from '@heroicons/vue/20/solid'
import { XCircleIcon } from '@heroicons/vue/24/outline'

const props = defineProps({
	modelValue: Array,
	options: Array 
})

const emit = defineEmits([ 'update:modelValue' ])

const query = ref('')
const selected = ref(props.modelValue)
const comboboxInput = ref(null)

const filteredOptions = computed(() =>
	query.value === ''
		? props.options
		: props.options.filter((department) => {
			return department.name
				.toLowerCase()
				.includes(query.value.toLowerCase())
		})
)

const selectedItems = computed(() => props.options.filter(item => props.modelValue.includes(item.id)))

watch (selected, (newVal, oldVal) => {
	comboboxInput.value.$el.value = ''
	query.value = ''
	emit('update:modelValue', selected.value)
})

function comboAreaClicked(event) {
	if (event.target.tagName === 'DIV')
		event.target.children[0].lastChild.children[0].focus()
	if (event.target.tagName === 'UL')
		event.target.lastChild.children[0].focus()
}

function removeSelection(id) {
	selected.value = selected.value.filter(item => item !== id)
}

function inputKeyDown(event) {
	if (event.key === 'Backspace' &&
		!event.target.value.length &&
		selected.value.length)
	{
		selected.value.splice(-1)
	}
}
</script>

<template>
	modelValue: {{ modelValue }} <br />
	selected: {{ selected }} <br />
	selectedItems: {{ selectedItems }}
	<Combobox v-model="selected"
			  multiple
	>
		<div class="relative mt-1">
			<div class="relative w-full cursor-default rounded-lg bg-white text-left shadow-md focus:outline-none focus-visible:ring-2 focus-visible:ring-white focus-visible:ring-opacity-75 focus-visible:ring-offset-2 focus-visible:ring-offset-teal-300">
				<div class="ml-2 flex text-sm hover:cursor-text"
					 @click.stop="comboAreaClicked"
				>
					<ul class="mr-5 flex flex-wrap py-0.5 text-gray-900">
						<li v-for="item in selectedItems"
							:key="item.id"
							class="mx-1 my-0.5 flex items-center rounded-lg border border-gray-300 px-1"
						>
							<span>{{ item.name }}</span>
							<button class="ml-2 focus:outline-none focus-visible:rounded-full focus-visible:ring-1 focus-visible:ring-yellow-500"
									type="button"
									@click.stop="removeSelection(item.id)"
							>
								<x-circle-icon class="h-5 w-5 hover:stroke-gray-500"/>
							</button>
						</li>
						<li class="mx-1 my-0.5 border-gray-300">
							<ComboboxInput ref="comboboxInput"
										   class="w-10 border-0 p-0 focus:ring-0"
										   :displayValue="(option) => option.name"
										   @change="query = $event.target.value"
										   @keydown.self="inputKeyDown"
							/>
						</li>
					</ul>
				</div>
				<ComboboxButton class="absolute inset-y-0 right-0 z-10 flex items-center pr-2">
					<ChevronUpDownIcon class="h-5 w-5 text-gray-400"
									   aria-hidden="true"
					/>
				</ComboboxButton>
			</div>
			<TransitionRoot enter="transition ease-out duration-200"
							enter-from="opacity-0 -translate-y-3"
							enter-to="opacity-100 translate-y-0"
							leave="transition ease-in duration-200"
							leaveFrom="opacity-100 translate-y-0"
							leaveTo="opacity-0 -translate-y-3"
							@after-leave="query = ''"
			>
				<ComboboxOptions class="absolute z-10 mt-1 max-h-48 w-full overflow-y-scroll rounded-md bg-white py-1 text-base shadow-lg ring-1 ring-black/5 focus:outline-none sm:text-sm">
					<div v-if="filteredOptions.length === 0 && query !== ''"
						 class="relative cursor-default select-none py-2 px-4 text-gray-700"
					>
						Nothing found.
					</div>
					<ComboboxOption v-for="item in filteredOptions"
									:key="item.id"
									v-slot="{ selected, active }"
									as="template"
									:value="item.id"
					>
						<li class="relative cursor-default select-none py-2 pl-10 pr-4"
							:class="{
										'bg-teal-600 text-white': active,
										'text-gray-900': !active,
							}"
						>
							<span class="block truncate">
								{{ item.name }}
							</span>
						</li>
					</ComboboxOption>
				</ComboboxOptions>
			</TransitionRoot>
		</div>
	</Combobox>
</template>
