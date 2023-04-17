<template>
    <div>
        <button @click="fetch">Pobierz</button>

        {{ response }}
    </div>
</template>

<script>
import axios from "axios";
export default {
    name: "App",
    data() {
        return {
            response: null,
        }
    },
    methods: {
        fetch() {
            axios
                .get('/api/test')
                .then((response) => {
                    console.log(response);
                })
        }
    }
}
</script>

