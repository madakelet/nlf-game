<template>
    <div class="edit-question">
        <div class="row justify-content-end">
            <div class="col-1">
                <font-awesome-icon
                    class="fa-icon"
                    icon="edit"
                    @click="isEditing = !isEditing"
                />
            </div>
            <div class="col-1">
                <font-awesome-icon
                    icon="trash"
                    class="fa-icon"
                    @click="deleteQuestion(question.id)"
                />
            </div>
        </div>
        <div class="row" v-if="isEditing">
            <input-component
                v-model="question.question"
                label="Kérdés"
                placeholder="Enter question"
                class="my-3"
            ></input-component>
        </div>
    </div>
</template>
<script>
import { ref } from "vue";
export default {
    name: "EditQuestionComponent",
    props: {
        question: {
            type: Object,
            required: true,
        },
    },
    setup() {
        const isEditing = ref(false);
        return {
            isEditing,
        };
    },
};
</script>
