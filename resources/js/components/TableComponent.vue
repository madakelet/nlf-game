<template>
    <table class="table">
        <thead>
            <tr>
                <td v-for="column in columns" :key="column.name">
                    {{ column.name }}
                </td>
                <td v-if="shouldDelete">törlés</td>
            </tr>
        </thead>
        <tbody>
            <tr v-for="row in data" :key="row.id">
                <td v-for="column in columns" :key="column.name">
                    {{ row[column.field] }}
                    <img
                        :src="row['team_logo']"
                        v-if="column.field == 'team'"
                        width="30px"
                    />
                </td>
                <td v-if="shouldDelete">
                    <font-awesome-icon
                        icon="trash"
                        @click="handleDelete(row.id)"
                        color="#E3655B"
                        class="fa-icon"
                    />
                </td>
            </tr>
        </tbody>
    </table>
</template>
<script>
import { ref, toRefs } from "vue";
export default {
    name: "TableComponent",
    props: {
        data: {
            type: Array,
            required: true,
        },
        columns: {
            type: Array,
            required: true,
        },
        shouldDelete: {
            type: Boolean,
            default: false,
        },
        deleteItem: {
            type: Function,
            required: false,
        },
    },
    setup(props) {
        const { deleteItem } = toRefs(props);
        const handleDelete = (id) => {
            if (confirm("Biztosan törölni szeretnéd?")) {
                deleteItem.value(id);
            }
        };
        return {
            handleDelete,
        };
    },
};
</script>
