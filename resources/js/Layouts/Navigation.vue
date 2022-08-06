<script setup>
import {ref} from 'vue'
import {Link} from "@inertiajs/inertia-vue3"

let pages = ref(
	[
		{
			link: '01',
			title: 'Basic'
		},
		{
			link: '02',
			title: 'Advance'
		},
	]
)
</script>
<template>
	<div id="app" class="font-sans antialiased text-black leading-tight">
		<div class="flex flex-col h-screen bg-grey-light">
			<div class="bg-navy-darker px-6 py-4 relative"></div>
			<div class="flex flex-1">
				<div class="flex flex-col bg-white flex-none overflow-hidden border-r-2 border-grey-light w-full lg:max-w-xs max-h-screen">
					<ol class="list-reset overflow-y-auto pb-12">
						<li class="bg-white" v-for="page in pages">
							<Link :href="route(page.link)"
									   class="flex justify-between items-baseline no-underline py-4 px-4 hover:bg-blue-300"
							>
								<div class="flex items-baseline text-sm mr-4 relative">
									<span class="pl-8 text-grey-darker">{{ page.title }}</span>
								</div>
							</Link>
						</li>
					</ol>
				</div>

				<div class="flex-grow bg-white overflow-y-auto px-6 py-12 lg:block max-h-screen">
					<slot></slot>
				</div>
			</div>
		</div>
	</div>
</template>