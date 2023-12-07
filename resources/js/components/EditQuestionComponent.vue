<template>
    <div class="edit-question">
        <input-component
            v-model="question.question"
            label="Kérdés"
            placeholder="Enter question"
            class="my-3"
        ></input-component>
        <div>
            {{ question.match.home_team.name }} vs
            {{ question.match.away_team.name }}
        </div>
    </div>
</template>
<script>
export default {
    name: "EditQuestionComponent",
    props: {
        question: {
            type: Object,
            required: true,
        },
    },
    setup() {
        return {};
    },
};
</script>
