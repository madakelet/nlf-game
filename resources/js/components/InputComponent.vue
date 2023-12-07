<template>
    <div>
        <label class="form-label" v-if="hasLabel">{{ label }}</label>
        <input
            class="form-control"
            :type="type"
            :placeholder="placeholder"
            :value="modelValue"
            @input="updateModelValue"
        />
    </div>
</template>
<script>
import { ref, watchEffect } from 'vue';
export default {
    name: "InputComponent",
    props: {
        label: {
            type: String,
            required: false,
            default: "",
        },
        type: {
            type: String,
            required: false,
            default: "text",
        },
        placeholder: {
            type: String,
            required: false,
            default: "",
        },
        hasLabel: {
            type: Boolean,
            required: false,
            default: true,
        },
        modelValue: {
            required: true,
        },
    },
    setup(props, { emit }) {
        const inputValue = ref(props.modelValue);

        watchEffect(() => {
            inputValue.value = props.modelValue;
        });

        const updateModelValue = (event) => {
            inputValue.value = event.target.value;
            emit("update:modelValue", inputValue.value);
        };

        return {
            inputValue,
            updateModelValue,
        };
    },
};
</script>
