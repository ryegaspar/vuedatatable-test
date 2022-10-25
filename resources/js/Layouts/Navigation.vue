<script setup>
import { Link } from '@inertiajs/inertia-vue3'

let pages = [
	{
		link: '01',
		title: 'Simple'
	},
	{
		link: '02',
		title: 'with Sorted Headers'
	},
	{
		link: '03',
		title: 'custom options'
	},
	{
		link: '04',
		title: 'loading animation'
	},
	{
		link: '05',
		title: 'not a vuedatatable'
	},
	{
		link: '06',
		title: 'experimental'
	},
	{
		link: '07',
		title: 'Others'
	}
]

</script>

<template>
	<div id="app"
		 class="font-sans leading-tight text-gray-200 antialiased"
	>
		<div class="flex h-screen flex-col">
			<div class="relative bg-indigo-800 px-6 py-4"></div>
			<div class="flex flex-1 bg-slate-900">
				<div class="hidden max-h-screen w-64 flex-none flex-col overflow-hidden border-r-2 lg:flex lg:max-w-xs">
					<ol class="list-reset mt-4 overflow-y-auto">
						<li v-for="(page, index) in pages"
							:key="index"
						>
							<Link :href="route(page.link)"
								  class="flex items-baseline justify-between p-2 no-underline hover:bg-blue-300"
								  :class="{'bg-slate-700': $page.component === page.link}"
							>
								<div class="relative mr-4 flex items-baseline text-sm">
									<span class="pl-2">{{ page.title }}</span>
								</div>
							</Link>
						</li>
					</ol>
				</div>

				<div class="max-h-screen grow overflow-y-auto bg-slate-900 px-6 py-12 lg:block">
					<slot></slot>
				</div>
			</div>
		</div>
	</div>
</template>