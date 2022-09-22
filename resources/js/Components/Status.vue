<script setup>
defineProps({
	rowData: {
		type: Object,
		required: true
	},
	rowIndex: { type: Number }
})
</script>

<template>
	<span :class="{'font-bold text-red-600' : rowData.status === 0, 'font-bold text-green-700' : rowData.status === 1}">
		{{ rowData.status ? 'active' : 'inactive'}}
	</span>
</template>