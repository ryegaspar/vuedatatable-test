<script setup>
const defaultCss = {
	loadingWrapperClass: 'flex animate-pulse',
	loadingDataClass: 'inline-block h-4 rounded-md bg-gray-500 text-xs text-gray-500',
	loadingEnterActiveClass: 'duration-200 ease-out',
	loadingEnterFromClass: 'transform opacity-0',
	loadingEnterToClass: 'opacity-100',
	loadingLeaveActiveClass: 'duration-200 ease-in',
	loadingLeaveFromClass: 'opacity-100',
	loadingLeaveToClass: 'transform opacity-0',
	tableWrapperClass: 'shadow overflow-hidden sm:rounded-lg sm:-mx-6 md:mx-0 md:rounded-lg -mx-4',
	tableClass: 'min-w-full divide-y divide-gray-300',
	tableHeaderClass: 'bg-gray-800 text-gray-100',
	tableHeaderCellClass: 'px-4 py-3.5 text-left text-xs uppercase tracking-wider text-sm font-black',
	tableHeaderClassSortable: 'hover:cursor-pointer',
	tableBodyClass: 'text-gray-800',
	tableRowClass: 'bg-gray-50 even:bg-gray-300',
	tableRowNoDataClass: 'text-center font-bold text-red-400',
	tableDataClass: 'p-3 text-sm',
	sortAscendingClass: 'vuedatatable-sort-ascending',
	sortDescendingClass: 'vuedatatable-sort-descending',
	sortNeutralClass: 'vuedatatable-sort-neutral',
}
// sortIconClass: 'fill-cyan-600', ** UNUSED **
// sortableIcon: '',
// handleIcon: 'grey sidebar icon',
// tableBodyClass: ''
// detailRowClass: 'vdatatable-detail-row',

</script>

<template>
	<div>
		<div class="-mx-6 overflow-hidden text-sm shadow sm:-mx-6 md:mx-0 md:rounded-lg"><!-- tableWrapperClass -->
			<table class="min-w-full divide-y divide-gray-300"><!-- tableClass-->
				<thead class="bg-gray-800 text-gray-100"><!-- tableHeaderClass -->
				<tr>
					<!-- tableHeaderCellClass, tableHeaderClassSortable -->
					<th class="px-4 py-3.5 text-left uppercase hover:cursor-pointer">
						ID<span class="vuedatatable-sort-neutral"></span><!-- sortNeutralClass -->
					</th>
					<!-- tableHeaderCellClass -->
					<th class="px-4 py-3.5 text-left uppercase">
						Name
					</th>
					<!-- tableHeaderCellClass -->
					<th class="px-4 py-3.5 text-left uppercase">
						Email
					</th>
					<!-- tableHeaderCellClass -->
					<th class="px-4 py-3.5 text-left uppercase">
						Nickname
					</th>
					<!-- tableHeaderCellClass -->
					<th class="px-4 py-3.5 text-left uppercase">
						Birthdate
					</th>
				</tr>
				</thead>
				<tbody class="text-gray-800"><!-- tableBodyClass -->
				<tr class="bg-gray-50 even:bg-gray-300"><!-- tableRowClass -->
					<td class="p-3 text-sm"><!-- tableDataClass -->
						1
					</td>
					<td class="p-3 text-sm"><!-- tableDataClass -->
						Devyn Toy DDS
					</td>
					<td class="p-3 text-sm"><!-- tableDataClass -->
						zzboncak@example.net
					</td>
					<td class="p-3 text-sm"><!-- tableDataClass -->
						Kacey
					</td>
					<td class="p-3 text-sm"><!-- tableDataClass -->
						2013-05-20
					</td>
				</tr>
				<tr class="bg-gray-50 even:bg-gray-300"><!-- tableRowClass -->
					<td class="p-3 text-sm"><!-- tableDataClass -->
						2
					</td>
					<td class="p-3 text-sm"><!-- tableDataClass -->
						Mrs. Earline Kessler
					</td>
					<td class="p-3 text-sm"><!-- tableDataClass -->
						aabonjak@example.com
					</td>
					<td class="p-3 text-sm"><!-- tableDataClass -->
						Metcha
					</td>
					<td class="p-3 text-sm"><!-- tableDataClass -->
						2007-05-20
					</td>
				</tr>
				<tr class="bg-gray-50 even:bg-gray-300"><!-- tableRowClass -->
					<td class="p-3 text-sm"><!-- tableDataClass -->
						3
					</td>
					<td class="p-3 text-sm"><!-- tableDataClass -->
						Vanezz Lee
					</td>
					<td class="p-3 text-sm"><!-- tableDataClass -->
						yurimasu@masudk.com
					</td>
					<td class="p-3 text-sm"><!-- tableDataClass -->
						Gene
					</td>
					<td class="p-3 text-sm"><!-- tableDataClass -->
						2005-08-31
					</td>
				</tr>
				</tbody>
			</table>
		</div>
		<nav class="-mx-4 mt-3 flex text-sm sm:mx-0 sm:justify-between">
			<div class="hidden py-2 text-gray-200 sm:flex">
				Displaying 1 to 10 of 49 items
			</div>
			<ul class="mx-auto flex justify-between space-x-2 rounded-md bg-gray-50 text-gray-800 sm:mx-0 sm:w-auto">
				<li>
					<button class="cursor-not-allowed items-center rounded-l-md p-2 text-gray-300 hover:bg-gray-50 focus:outline-none">
						<svg class="h-5 w-5"
							 xmlns="http://www.w3.org/2000/svg"
							 viewBox="0 0 20 20"
							 fill="currentColor"
							 aria-hidden="true"
						>
							<path fill-rule="evenodd"
								  d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
								  clip-rule="evenodd"
							/>
						</svg>
					</button>
				</li>
				<li>
					<button class="items-center px-3 py-2 hover:bg-gray-300 focus:outline-none sm:px-3">
						1
					</button>
				</li>

				<li>
					<button class="relative z-10 cursor-not-allowed items-center bg-indigo-50 px-3 py-2 text-indigo-600 outline outline-indigo-500 hover:z-20">
						2
					</button>
				</li>
				<li>
					<button class="items-center px-3 py-2 hover:bg-gray-300 focus:outline-none">
						3
					</button>
				</li>
				<li>
					<button class="items-center px-3 py-2 hover:bg-gray-300 focus:outline-none">
						4
					</button>
				</li>
				<li>
					<button class="items-center px-3 py-2 hover:bg-gray-300 focus:outline-none">
						43
					</button>
				</li>
				<li>
					<button class="items-center rounded-r-md p-2 hover:bg-gray-300 focus:outline-none">
						<svg class="h-5 w-5"
							 xmlns="http://www.w3.org/2000/svg"
							 viewBox="0 0 20 20"
							 fill="currentColor"
							 aria-hidden="true"
						>

							<path fill-rule="evenodd"
								  d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
								  clip-rule="evenodd"
							/>
						</svg>
					</button>
				</li>
			</ul>
		</nav>
		<nav class="-mx-4 mt-3 flex justify-between text-sm sm:mx-0"
			 aria-label="Pagination"
		>
			<div class="hidden py-2 text-gray-200 sm:flex">
				Displaying 1 to 10 of 49 items
			</div>
			<div class="flex flex-1 justify-between sm:justify-end">
				<button class="items-center rounded-md bg-gray-50 px-3 py-2 text-gray-800 hover:bg-gray-300">
					Previous
				</button>
				<button class="ml-3 items-center rounded-md bg-gray-50 px-3 py-2 text-gray-800 hover:bg-gray-300">
					Next
				</button>
			</div>
		</nav>
	</div>
</template>