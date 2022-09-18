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
	tableWrapperClass: 'shadow overflow-hidden sm:rounded-lg',
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
	<div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
		<div :class="defaultCss.tableWrapperClass">
			<table :class="defaultCss.tableClass">
				<thead :class="defaultCss.tableHeaderClass">
				<tr>
					<th :class="[defaultCss.tableHeaderCellClass, defaultCss.tableHeaderClassSortable]">
						ID<span :class="defaultCss.sortNeutralClass"></span>
					</th>
					<th :class="defaultCss.tableHeaderCellClass">
						Name
					</th>
					<th :class="defaultCss.tableHeaderCellClass">
						Email
					</th>
					<th :class="defaultCss.tableHeaderCellClass">
						Nickname
					</th>
					<th :class="defaultCss.tableHeaderCellClass">
						Birthdate
					</th>
				</tr>
				</thead>
				<tbody :class="defaultCss.tableBodyClass">
				<tr :class="defaultCss.tableRowClass">
					<td :class="defaultCss.tableDataClass">
						1
					</td>
					<td :class="defaultCss.tableDataClass">
						Devyn Toy DDS
					</td>
					<td :class="defaultCss.tableDataClass">
						zzboncak@example.net
					</td>
					<td :class="defaultCss.tableDataClass">
						Kacey
					</td>
					<td :class="defaultCss.tableDataClass">
						2013-05-20
					</td>
				</tr>
				<tr :class="defaultCss.tableRowClass">
					<td :class="defaultCss.tableDataClass">
						2
					</td>
					<td :class="defaultCss.tableDataClass">
						Mrs. Earline Kessler
					</td>
					<td :class="defaultCss.tableDataClass">
						aabonjak@example.com
					</td>
					<td :class="defaultCss.tableDataClass">
						Metcha
					</td>
					<td :class="defaultCss.tableDataClass">
						2007-05-20
					</td>
				</tr>
				<tr :class="defaultCss.tableRowClass">
					<td :class="defaultCss.tableDataClass">
						3
					</td>
					<td :class="defaultCss.tableDataClass">
						Vanezz Lee
					</td>
					<td :class="defaultCss.tableDataClass">
						yurimasu@masudk.com
					</td>
					<td :class="defaultCss.tableDataClass">
						Gene
					</td>
					<td :class="defaultCss.tableDataClass">
						2005-08-31
					</td>
				</tr>
				</tbody>
			</table>
		</div>
		<nav class="mt-3 flex justify-between text-sm">
			<div class="py-2 text-gray-200">
				Displaying 1 to 10 of 49 items
			</div>
			<ul class="flex items-center rounded-md bg-gray-50 text-gray-800">
				<li>
					<button class="inline-flex items-center rounded-l-md p-2 focus:outline-none cursor-not-allowed text-gray-300 hover:bg-gray-50"
					>
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
					<button class="relative z-10 inline-flex cursor-not-allowed items-center bg-indigo-50 px-3 py-2 text-indigo-600 outline outline-indigo-500 hover:z-20">
						1
					</button>
				</li>
				<li>
					<button class="items-center px-3 py-2 hover:bg-gray-300 focus:outline-none">
						2
					</button>
				</li>
				<li>
					<button class="items-center px-3 py-2 hover:bg-gray-300 focus:outline-none">
						3
					</button>
				</li>

				<li>
					<button class="inline-flex items-center rounded-r-md p-2 focus:outline-none hover:bg-gray-300">
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
		<nav class="mt-3 flex justify-between text-sm"
			 aria-label="Pagination">
			<div class="py-2 text-gray-200">
				Displaying 1 to 10 of 49 items
			</div>
			<div class="flex flex-1 justify-end">
				<button class="items-center rounded-md bg-gray-50 px-3 py-2 text-gray-800 hover:bg-gray-300">
					Previous
				</button>
				<button class="items-center rounded-md bg-gray-50 px-3 py-2 text-gray-800 hover:bg-gray-300 ml-3">
					Next
				</button>
			</div>
		</nav>
	</div>
</template>