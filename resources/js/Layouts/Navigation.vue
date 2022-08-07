<script setup>
import {Link} from "@inertiajs/inertia-vue3"

let pages = [
	{
		link: '01',
		title: 'Simple'
	},
	{
		link: '02',
		title: 'with Sorted Headers'
	},
]

</script>

<template>
	<div id="app" class="font-sans antialiased text-black leading-tight">
		<div class="flex flex-col h-screen">
			<div class="bg-indigo-800 px-6 py-4 relative"></div>
			<div class="flex flex-1 bg-gray-50">
				<div class="flex flex-col flex-none overflow-hidden border-r-2 w-64 lg:max-w-xs max-h-screen">
					<ol class="list-reset overflow-y-auto mt-4">
						<li v-for="page in pages">
							<Link :href="route(page.link)"
								  class="flex justify-between items-baseline no-underline p-2 hover:bg-blue-300"
								  :class="{'bg-blue-200': $page.component === page.link}"
							>
								<div class="flex items-baseline text-sm mr-4 relative">
									<span class="pl-2 text-gray-800">{{ page.title }}</span>
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