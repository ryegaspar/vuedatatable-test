<script setup>
const defaultCss = {
	// loading
	loadingWrapperClass: 'flex animate-pulse',
	loadingDataClass: 'inline-block h-4 rounded-md bg-gray-500 text-xs text-gray-500',

	mainWrapperClass: 'inline-block sm:flex sm:flex-col',

	// table
	tableWrapperClass: '-mx-6 rounded-lg text-sm shadow md:mx-0 md:overflow-hidden',
	tableClass: 'min-w-full',

	// table header
	tableHeaderClass: 'bg-slate-800 text-gray-100 ring-1 ring-inset ring-white/10',
	tableHeaderCellClass: 'px-4 py-3.5 uppercase',
	tableHeaderClassSortable: 'hover:cursor-pointer',

	// body, row, data
	tableBodyClass: 'text-gray-800',
	tableRowClass: 'bg-gray-50 even:bg-slate-300',
	tableRowNoDataClass: 'text-center font-bold text-red-400',
	tableDataClass: 'p-3 align-top',

	// sort
	sortAscendingClass: 'vuedatatable-sort-ascending',
	sortDescendingClass: 'vuedatatable-sort-descending',
	sortNeutralClass: 'vuedatatable-sort-neutral',

	paginationInfo: 'hidden py-2 text-gray-200 sm:flex',

	// pagination normal
	paginationNormalWrapper: '-mx-4 mt-3 flex text-sm text-gray-800 sm:justify-between md:mx-0',
	paginationNormalPagingWrapper: 'mx-auto flex rounded-md bg-gray-50 sm:mx-0 sm:w-auto',
	paginationNormalArrowLeft: 'items-center rounded-l-md p-2 hover:bg-gray-300 focus:outline-none',
	paginationNormalArrowLeftCurrent: 'cursor-not-allowed items-center rounded-l-md p-2 text-gray-400 hover:bg-gray-50 focus:outline-none',
	paginationNormalPages: 'items-center px-3 py-2 hover:bg-gray-300 focus:outline-none',
	paginationNormalPagesCurrent: 'relative z-10 cursor-not-allowed items-center bg-indigo-50 px-3 py-2 text-indigo-600 outline outline-indigo-500',
	paginationNormalArrowRight: 'items-center rounded-r-md p-2 hover:bg-gray-300 focus:outline-none',
	paginationNormalArrowRightCurrent: 'cursor-not-allowed items-center rounded-r-md p-2 text-gray-400 hover:bg-gray-50 focus:outline-none',

	// pagination compact
	paginationCompactWrapper: '-mx-4 mt-3 flex text-sm md:mx-0',
	paginationCompactPagingWrapper: 'flex flex-1 justify-between sm:justify-end',
	paginationCompactArrowLeft: 'items-center rounded-md bg-gray-50 px-3 py-2 text-gray-800 hover:bg-gray-300',
	paginationCompactArrowLeftCurrent: 'cursor-not-allowed items-center rounded-md bg-gray-50 px-3 py-2 text-gray-400 hover:bg-gray-50',
	paginationCompactArrowRight: 'ml-3 items-center rounded-md bg-gray-50 px-3 py-2 text-gray-800 hover:bg-gray-300',
	paginationCompactArrowRightCurrent: 'ml-3 cursor-not-allowed items-center rounded-md bg-gray-50 px-3 py-2 text-gray-400 hover:bg-gray-50'
}
// sortIconClass: 'fill-cyan-600', ** UNUSED **
// sortableIcon: '',
// handleIcon: 'grey sidebar icon',
// tableBodyClass: ''
// detailRowClass: 'vdatatable-detail-row',

</script>

<template>
	<div class="inline-block sm:flex sm:flex-col"><!-- mainWrapperClass -->
		<div class="-mx-6 rounded-lg text-sm shadow md:mx-0 md:overflow-hidden"><!-- tableWrapperClass -->
			<table class="min-w-full"><!-- tableClass-->
				<thead class="bg-slate-800 text-gray-100 ring-1 ring-inset ring-white/10"><!-- tableHeaderClass -->
				<tr>
					<!-- *tableHeaderCellClass, *tableHeaderClassSortable -->
					<th class="hidden px-4 py-3.5 uppercase hover:cursor-pointer lg:table-cell">
						ID<span class="vuedatatable-sort-neutral"></span><!-- sortNeutralClass -->
					</th>
					<!-- tableHeaderCellClass -->
					<th class="px-4 py-3.5 uppercase">
						Name
					</th>
					<!-- tableHeaderCellClass -->
					<th class="px-4 py-3.5 uppercase">
						Email
					</th>
					<!-- *tableHeaderCellClass -->
					<th class="hidden px-4 py-3.5 uppercase lg:table-cell">
						Nickname
					</th>
					<!-- *tableHeaderCellClass -->
					<th class="hidden px-4 py-3.5 uppercase sm:table-cell">
						Position
					</th>
					<th class="px-4 py-3.5 uppercase">
						Status
					</th>
					<th class="px-4 py-3.5 uppercase">
						Book
					</th>
					<!-- *tableHeaderCellClass -->
					<th class="hidden px-4 py-3.5 uppercase sm:table-cell">
						Birthdate
					</th>
				</tr>
				</thead>
				<tbody class="text-gray-800"><!-- tableBodyClass -->
				<tr class="bg-gray-50 even:bg-slate-300"><!-- tableRowClass -->
					<td class="hidden p-3 align-top text-sm lg:table-cell"><!-- tableDataClass (p-3 text-sm align-top)-->
						1
					</td>
					<td class="p-3 align-top"><!-- tableDataClass -->
						Devyn Toy DDS
						<dl class="lg:hidden">
							<dt class="sr-only">Nickname</dt>
							<dd>Kacey</dd>
							<dt class="sr-only sm:hidden">Birthdate</dt>
							<dd class="sm:hidden">2013-05-20</dd>
						</dl>
					</td>
					<td class="p-3 align-top"><!-- tableDataClass -->
						zzboncak@example.net
						<dl class="sm:hidden">
							<dt class="sr-only sm:hidden">Position</dt>
							<dd class="sm:hidden">Manager</dd>
						</dl>
					</td>
					<td class="hidden p-3 align-top lg:table-cell"><!-- *tableDataClass -->
						Kacey
					</td>
					<td class="hidden p-3 align-top sm:table-cell"><!-- *tableDataClass -->
						Manager
					</td>
					<td class="p-3 align-top"><!-- *tableDataClass -->
						active
					</td>
					<td class="p-3 align-top"><!-- *tableDataClass -->
						Harry Potter and the prisoner of Azkhaban
					</td>
					<td class="hidden p-3 align-top sm:table-cell"><!-- *tableDataClass -->
						2013-05-20
					</td>
				</tr>
				<tr class="bg-gray-50 even:bg-slate-300"><!-- tableRowClass -->
					<td class="hidden p-3 align-top lg:table-cell"><!-- *tableDataClass -->
						2
					</td>
					<td class="p-3 align-top"><!-- *tableDataClass -->
						Mrs. Earline Kessler
						<dl class="lg:hidden">
							<dt class="sr-only">Nickname</dt>
							<dd>Metcha</dd>
							<dt class="sr-only sm:hidden">Birthdate</dt>
							<dd class="sm:hidden">2007-05-20</dd>
						</dl>
					</td>
					<td class="p-3 align-top"><!-- tableDataClass -->
						aabonjak@example.com
						<dl class="sm:hidden">
							<dt class="sr-only sm:hidden">Position</dt>
							<dd class="sm:hidden">Assistant to the Regional Manager</dd>
						</dl>
					</td>
					<td class="hidden p-3 align-top lg:table-cell"><!-- *tableDataClass -->
						Metcha
					</td>
					<td class="hidden p-3 align-top sm:table-cell"><!-- *tableDataClass -->
						Assistant to the Regional Manager
					</td>
					<td class="p-3 align-top"><!-- *tableDataClass -->
						inactive
					</td>
					<td class="p-3 align-top"><!-- *tableDataClass -->
						Lord of the Rings: Fellowship of the Ring
					</td>
					<td class="hidden p-3 align-top sm:table-cell"><!-- *tableDataClass -->
						2007-05-20
					</td>
				</tr>
				<tr class="bg-gray-50 even:bg-slate-300"><!-- tableRowClass -->
					<td class="hidden p-3 align-top lg:table-cell"><!-- *tableDataClass -->
						3
					</td>
					<td class="p-3 align-top"><!-- tableDataClass -->
						Vanezz Lee
						<dl class="lg:hidden">
							<dt class="sr-only">Nickname</dt>
							<dd>Gene</dd>
							<dt class="sr-only sm:hidden">Birthdate</dt>
							<dd class="sm:hidden">2005-08-31</dd>
						</dl>
					</td>
					<td class="p-3 align-top"><!-- tableDataClass -->
						yurimasu@masudk.com
						<dl class="sm:hidden">
							<dt class="sr-only sm:hidden">Position</dt>
							<dd class="sm:hidden">Dunder Mifflin Salesman</dd>
						</dl>
					</td>
					<td class="hidden p-3 align-top lg:table-cell"><!-- *tableDataClass -->
						Gene
					</td>
					<td class="hidden p-3 align-top sm:table-cell"><!-- *tableDataClass -->
						Dunder Mifflin Salesman
					</td>
					<td class="p-3 align-top"><!-- *tableDataClass -->
						active
					</td>
					<td class="p-3 align-top"><!-- *tableDataClass -->
						The Hobbit: Desolation of Smaug
					</td>
					<td class="hidden p-3 align-top sm:table-cell"><!-- *tableDataClass -->
						2005-08-31
					</td>
				</tr>
				</tbody>
			</table>
		</div>
		<nav class="-mx-4 mt-3 flex text-sm text-gray-800 sm:justify-between md:mx-0"><!-- paginationNormalWrapper -->
			<div class="hidden py-2 text-gray-200 sm:flex"><!-- paginationInfo -->
				Displaying 1 to 10 of 49 items
			</div>
			<ul class="mx-auto flex rounded-md bg-gray-50 sm:mx-0 sm:w-auto"><!-- paginationNormalPagingWrapper -->
				<li>
					<button class="cursor-not-allowed items-center rounded-l-md p-2 text-gray-400 hover:bg-gray-50 focus:outline-none"><!-- paginationNormalArrowLeftCurrent -->
						<svg class="h-5 w-5 fill-current"
							 xmlns="http://www.w3.org/2000/svg"
							 viewBox="0 0 20 20"
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
					<button class="items-center px-3 py-2 hover:bg-gray-300 focus:outline-none sm:px-3"><!-- paginationNormalPages -->
						1
					</button>
				</li>

				<li>
					<button class="cursor-not-allowed items-center bg-indigo-50 px-3 py-2 text-indigo-600 outline outline-indigo-500"><!-- paginationNormalPagesCurrent -->
						2
					</button>
				</li>
				<li>
					<button class="items-center px-3 py-2 hover:bg-gray-300 focus:outline-none"><!-- paginationNormalPages -->
						3
					</button>
				</li>
				<li>
					<button class="items-center px-3 py-2 hover:bg-gray-300 focus:outline-none"><!-- paginationNormalPages -->
						4
					</button>
				</li>
				<li>
					<button class="items-center px-3 py-2 hover:bg-gray-300 focus:outline-none"><!-- paginationNormalPages -->
						43
					</button>
				</li>
				<li>
					<button class="items-center rounded-r-md p-2 hover:bg-gray-300 focus:outline-none"><!-- paginationNormalArrowRight -->
						<span>
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
						</span>
					</button>
				</li>
			</ul>
		</nav>
		<!-- paginationCompactWrapper -->
		<nav class="-mx-4 mt-3 flex text-sm md:mx-0"
			 aria-label="Pagination"
		>
			<div class="hidden py-2 text-gray-200 sm:flex"><!-- paginationInfo -->
				Displaying 1 to 10 of 49 items
			</div>
			<div class="flex flex-1 justify-between sm:justify-end"><!-- paginationCompactPagingWrapper -->
				<button class="items-center rounded-md bg-gray-50 px-3 py-2 text-gray-800 hover:bg-gray-300"><!-- paginationCompactArrowLeft -->
					Previous
				</button>
				<button class="ml-3 cursor-not-allowed items-center rounded-md bg-gray-50 px-3 py-2 text-gray-400 hover:bg-gray-50"><!-- paginationCompactArrowRight -->
					Next
				</button>
			</div>
		</nav>
	</div>
</template>